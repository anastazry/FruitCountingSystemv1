<?php

namespace Tests\Feature;

use App\Models\FruitsModel;
use App\Models\MandorAssignment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class WorkflowTest extends TestCase
{
    use RefreshDatabase;

    private function assignment(): MandorAssignment
    {
        return MandorAssignment::create([
            'peringkat' => '1', 'blok' => '2', 'n_lot' => '3',
            'n_p_tuai' => '4', 'k_penuai' => '5',
            'mandor_id' => User::factory()->create(['role' => 'Mandor'])->id,
            'status' => 'Pending',
        ]);
    }

    public function test_business_pages_require_login(): void
    {
        foreach (['/admin/user-list', '/admin/create-newuser', '/admin/assignment-lists', '/super/dashboard', '/user/view-report', '/users/export'] as $url) {
            $this->get($url)->assertRedirect(route('login'));
        }
        $this->post('/admin/register', [])->assertRedirect(route('login'));
        $this->post('/user/insert-fruit-details', [])->assertRedirect(route('login'));
    }

    public function test_admin_pages_render_with_real_assignment(): void
    {
        $admin = User::factory()->create(['role' => 'Admin']);
        $assignment = $this->assignment();
        $this->actingAs($admin);
        foreach (['/admin/user-list', '/admin/create-newuser', '/admin/create-qr', '/admin/assignment-lists', '/admin/update-assignment/'.$assignment->id, '/admin/qr-code'.$assignment->id, '/sales-chart', '/user/view-report', '/super/dashboard'] as $url) {
            $this->get($url)->assertOk();
        }
        $this->get('/admin/user-list')->assertSee($admin->email);
    }

    public function test_workers_cannot_create_privileged_users(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'Mandor']))
            ->post('/admin/register', [])->assertForbidden();
    }

    public function test_invalid_assignment_returns_validation_errors(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'Admin']))
            ->from('/admin/create-qr')->post('/admin/assign-task', [])
            ->assertRedirect('/admin/create-qr')->assertSessionHasErrors('mandor_id');
    }

    public function test_invalid_assignment_update_returns_validation_errors(): void
    {
        $assignment = $this->assignment();
        $this->actingAs(User::factory()->create(['role' => 'Admin']))
            ->from('/admin/update-assignment/'.$assignment->id)
            ->put('/admin/update-assignment-insert/'.$assignment->id, [])
            ->assertRedirect('/admin/update-assignment/'.$assignment->id)
            ->assertSessionHasErrors('mandor_id');
    }

    public function test_missing_assignment_edit_returns_not_found(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'Admin']))
            ->get('/admin/update-assignment/999')->assertNotFound();
    }

    public function test_driver_can_open_qr_and_delivery_records_driver(): void
    {
        $assignment = $this->assignment();
        $driver = User::factory()->create(['role' => 'Driver']);
        $fruit = FruitsModel::create([
            'assignment_id' => $assignment->id, 'mandor_id' => $assignment->mandor_id,
            'tarikh' => today(), 'delivery_status' => 'Pending',
        ]);
        $this->actingAs($driver)->get('/user/update-fruit-details/'.$assignment->id)
            ->assertOk()->assertViewIs('mandor.driver-confirm');
        $this->post('/mandor/driver-selection/yes/'.$assignment->id)->assertOk();
        $this->assertDatabaseHas('fruits_detaile_tbl', [
            'id' => $fruit->id, 'driver_id' => $driver->id, 'delivery_status' => 'Dalam Perjalanan',
        ]);
    }

    public function test_qr_destination_is_preserved_after_login(): void
    {
        $assignment = $this->assignment();
        $url = '/user/update-fruit-details/'.$assignment->id;
        $this->get($url)->assertRedirect(route('login'));
        $user = User::factory()->create(['role' => 'Mandor']);
        $this->post('/login', ['email' => $user->email, 'password' => 'password'])
            ->assertRedirect($url);
    }

    public function test_delivery_cannot_create_an_empty_harvest(): void
    {
        $assignment = $this->assignment();
        $this->actingAs(User::factory()->create(['role' => 'Driver']))
            ->post('/mandor/driver-selection/yes/'.$assignment->id)
            ->assertRedirect(route('driver-confirmation', ['assignment_id' => $assignment->id]));
        $this->assertDatabaseCount('fruits_detaile_tbl', 0);
    }

    public function test_dashboards_use_database_totals(): void
    {
        $assignment = $this->assignment();
        $admin = User::factory()->create(['role' => 'Admin']);
        FruitsModel::create([
            'assignment_id' => $assignment->id, 'mandor_id' => $assignment->mandor_id,
            'tarikh' => today(), 'dituai' => '123', 'muda' => '7',
        ]);
        FruitsModel::create([
            'assignment_id' => $assignment->id, 'mandor_id' => $assignment->mandor_id,
            'tarikh' => today()->subYear(), 'dituai' => '999',
        ]);
        $this->actingAs($admin)->get('/dashboard')->assertOk()
            ->assertViewHas('userCounts', fn ($counts) => $counts->sum() === 2);
        $this->get('/super/dashboard')->assertOk()
            ->assertViewHas('totals', fn ($totals) => $totals['dituai'] == 123 && $totals['muda'] == 7)
            ->assertSee('123')->assertDontSee('89,210');
    }

    public function test_assignment_list_uses_one_harvest_query_for_multiple_assignments(): void
    {
        for ($index = 0; $index < 6; $index++) {
            $assignment = $this->assignment();
            FruitsModel::create([
                'assignment_id' => $assignment->id, 'mandor_id' => $assignment->mandor_id,
                'tarikh' => today(), 'dituai' => '10', 'delivery_status' => 'Pending',
            ]);
        }
        $this->actingAs(User::factory()->create(['role' => 'Admin']));
        DB::enableQueryLog();
        $this->get('/admin/assignment-lists')->assertOk();
        $harvestQueries = collect(DB::getQueryLog())->filter(
            fn ($query) => str_contains($query['query'], 'fruits_detaile_tbl')
        );
        DB::disableQueryLog();
        $this->assertCount(1, $harvestQueries);
    }

    public function test_dashboard_uses_bundled_assets_without_remote_dependencies(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'Admin']))
            ->get('/dashboard')->assertOk()
            ->assertDontSee('preline.co')->assertDontSee('cdnjs.cloudflare.com')
            ->assertDontSee('code.jquery.com')->assertDontSee('js.pusher.com')
            ->assertDontSee('/css/app.css')->assertDontSee('images.unsplash.com');
    }

    public function test_harvest_upload_uses_the_configured_photo_disk(): void
    {
        config(['filesystems.harvest_disk' => 's3']);
        Storage::fake('s3');
        $assignment = $this->assignment();
        $this->actingAs(User::find($assignment->mandor_id))->post('/user/insert-fruit-details', [
            'object' => json_encode(['id' => $assignment->id]),
            'dituai' => '10', 'muda' => '1', 'busuk' => '0', 'kosong' => '0',
            'panjang' => '0', 's_lama' => '0', 's_baru' => '0',
            'gambar' => UploadedFile::fake()->image('harvest.jpg'),
        ])->assertRedirect(route('admin.assign-list'));
        $fruit = FruitsModel::firstOrFail();
        Storage::disk('s3')->assertExists($fruit->image_path);
        $this->assertEquals(10, $fruit->dituai);
    }

    public function test_replacing_a_photo_deletes_it_from_the_same_disk(): void
    {
        config(['filesystems.harvest_disk' => 's3']);
        Storage::fake('s3');
        Storage::disk('s3')->put('images/old.jpg', 'old photo');
        $assignment = $this->assignment();
        $fruit = FruitsModel::create([
            'assignment_id' => $assignment->id, 'mandor_id' => $assignment->mandor_id,
            'image_path' => 'images/old.jpg', 'tarikh' => today(),
        ]);
        $this->actingAs(User::find($assignment->mandor_id))->put('/mandor/edit-current-fruit-details', [
            'fruit_id' => $fruit->id, 'dituai' => '10', 'muda' => '1', 'busuk' => '0',
            'kosong' => '0', 'panjang' => '0', 's_lama' => '0', 's_baru' => '0',
            'gambar' => UploadedFile::fake()->image('replacement.jpg'),
        ])->assertRedirect(route('admin.assign-list'));
        Storage::disk('s3')->assertMissing('images/old.jpg');
        Storage::disk('s3')->assertExists($fruit->fresh()->image_path);
    }
}
