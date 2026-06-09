<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Mandor Test',
                'email' => 'mandor@test.com',
                'worker_id' => 'MDR1001',
                'phone_no' => '0112345671',
                'role' => 'Mandor',
                'username' => 'mandor_test',
                'password' => Hash::make('12341234'),
            ],
            [
                'name' => 'Admin Test',
                'email' => 'admin@test.com',
                'worker_id' => 'ADM1001',
                'phone_no' => '0112345672',
                'role' => 'Admin',
                'username' => 'admin_test',
                'password' => Hash::make('12341234'),
            ],
            [
                'name' => 'Driver Test',
                'email' => 'driver@test.com',
                'worker_id' => 'DRV1001',
                'phone_no' => '0112345673',
                'role' => 'Driver',
                'username' => 'driver_test',
                'password' => Hash::make('12341234'),
            ],
            [
                'name' => 'Super Admin',
                'email' => 'bamplanters@gmail.com',
                'worker_id' => 'SUP1001',
                'phone_no' => '0112345674',
                'role' => 'Super',
                'username' => 'super_admin',
                'password' => Hash::make('12341234'),
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}