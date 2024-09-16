<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\FruitsModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MandorAssignment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MandorController extends Controller
{
    public function getDriverAnswer($selection, $assignment_id)
    {
        $user_id = Auth::user()->id;
    
        if ($selection == "yes") {
            // Check if a record for today exists
            $fruitToday = DB::table('fruits_detaile_tbl')
                ->where('assignment_id', $assignment_id)
                ->whereDate('tarikh', Carbon::today())
                ->first();
    
            if ($fruitToday) {
                // Update using DB::table for an existing record
                DB::table('fruits_detaile_tbl')
                    ->where('id', $fruitToday->id)
                    ->update(['delivery_status' => 'Dalam Perjalanan']);
            } else {
                // Create a new record using Eloquent
                $fruit = FruitsModel::create([
                    'driver_id' => $user_id,
                    'assignment_id' => $assignment_id,
                    'delivery_status' => "Dalam Perjalanan",
                ]);
            }
            return view('mandor.thankyoupage');
        } else {
            return view('mandor.thankyoupage');
        }
    }
    
    public function getDriverPage($assignment_id){
        $assignment = MandorAssignment::find($assignment_id);
        return view('mandor.driver-confirm', compact('assignment'));
    }

    public function editCurrentFruitDetails(Request $request)
    {
        // Find the fruit
        $fruit = FruitsModel::find($request->fruit_id);
        if ($fruit) {
            // Update the fruit details
            $fruit->dituai = $request->dituai;
            $fruit->muda = $request->muda;
            $fruit->busuk = $request->busuk;
            $fruit->kosong = $request->kosong;
            $fruit->panjang = $request->panjang;
            $fruit->s_lama = $request->s_lama;
            $fruit->s_baru = $request->s_baru;
            $fruit->status = "Selesai";
            $fruit->tarikh = now();
    
            if ($request->hasFile('gambar')) {
                // Handle the new image upload
                $file = $request->file('gambar');
                $oldImagePath = public_path('storage/'.$fruit->image_path); // Full path to the old image
                
                // Debugging: Check the old image path
                // dd('Old image path: ', $oldImagePath, file_exists($oldImagePath));
    
                // Delete the old image if it exists
                if ($fruit->image_path && file_exists($oldImagePath)) {
                    // Delete the old image file
                    unlink($oldImagePath);
    
                    // Optionally, check if the directory is empty and delete it
                    $oldImageDirectory = dirname($oldImagePath);
                    
                    // Debugging: Check the old image directory
                    // dd('Old image directory: ', $oldImageDirectory, count(glob($oldImageDirectory . '/*')) === 0);
    
                    if (is_dir($oldImageDirectory) && count(glob($oldImageDirectory . '/*')) === 0) {
                        rmdir($oldImageDirectory); // Remove the directory if empty
                    }
                }
    
                // Generate a unique folder name
                // Generate a unique folder name
                $folderName = 'images/' . uniqid() . '-' . now()->timestamp;
            
                // Store the file in the folder and get the relative file path
                $path = $file->store($folderName, 'public'); // Stores in 'storage/app/public'
            
                // Just store the relative path, no need for URL
                $imagePath = $path; // Save relative path
                $fruit->image_path = $imagePath;

            } else {
                // Retain the current image path if no new file is uploaded
                if ($request->input('current_image_path')) {
                    $fruit->image_path = $request->input('current_image_path');
                }
            }
    
            // Save the updated fruit details
            $fruit->save();
    
            // Redirect to the admin assign list with a success message
            return redirect()->route('admin.assign-list')->with('success', 'Fruit details updated successfully!');
        } else {
            // If fruit not found, redirect back with an error message
            return redirect()->back()->with('error', 'Fruit not found.');
        }
    }
    
    
    
    public function missingAssignment1(){
        $data = [
            ['id' => 33, 'peringkat' => '1', 'blok' => '1', 'n_lot' => '1', 'n_p_tuai' => '1', 'k_penuai' => '1', 'status' => '1', 'stats' => 'Pending'],
            ['id' => 32,'peringkat' => '2', 'blok' => '2', 'n_lot' => '2', 'n_p_tuai' => '2', 'k_penuai' => '2', 'status' => '2', 'stats' => 'In Progress'],
            ['id' => 31,'peringkat' => '3', 'blok' => '3', 'n_lot' => '3', 'n_p_tuai' => '3', 'k_penuai' => '3', 'status' => '3', 'stats' => 'Completed'],
        ];
    
        $metadataMandor = array_map(function ($item) {
            $mandorAssignment = new MandorAssignment();
            $mandorAssignment->id = $item['id'];
            $mandorAssignment->peringkat = $item['peringkat'];
            $mandorAssignment->blok = $item['blok'];
            $mandorAssignment->n_lot = $item['n_lot'];
            $mandorAssignment->n_p_tuai = $item['n_p_tuai'];
            $mandorAssignment->k_penuai = $item['k_penuai'];
            $mandorAssignment->status = $item['status'];
            $mandorAssignment->stats = $item['stats'];
            return $mandorAssignment;
        }, $data);
    
        return view('admin.assignment-list', ['assignments' => $metadataMandor]);
    }

    public function missingAssignment2(){
        $data = [
            ['id' => 33, 'peringkat' => '4', 'blok' => '2', 'n_lot' => '1', 'n_p_tuai' => '1', 'k_penuai' => '1', 'status' => '1', 'stats' => 'Pending'],
            ['id' => 32,'peringkat' => '5', 'blok' => '2', 'n_lot' => '1', 'n_p_tuai' => '2', 'k_penuai' => '2', 'status' => '2', 'stats' => 'In Progress'],
        ];
    
        $metadataMandor = array_map(function ($item) {
            $mandorAssignment = new MandorAssignment();
            $mandorAssignment->id = $item['id'];
            $mandorAssignment->peringkat = $item['peringkat'];
            $mandorAssignment->blok = $item['blok'];
            $mandorAssignment->n_lot = $item['n_lot'];
            $mandorAssignment->n_p_tuai = $item['n_p_tuai'];
            $mandorAssignment->k_penuai = $item['k_penuai'];
            $mandorAssignment->status = $item['status'];
            $mandorAssignment->stats = $item['stats'];
            return $mandorAssignment;
        }, $data);
    
        return view('admin.assignment-list', ['assignments' => $metadataMandor]);
    }
    
    
    
// Route::put('/user/edit-hazard-items-back/{hirarc_id}', [HirarcController::class, 'backToHazardFromRisk'])->name('user-backto-hazard-details'); 

    public function generateQRCodePage($assignment_id)
    {
        // Generate the QR code
        // $url = route('mandor-update-fruit-details', ['assignment_id' => $assignment_id]);
        // Generate the URL with a 'redirect_to' query parameter
        $token = $assignment_id;
        session()->put('login_token', $token);
        $url = route('mandor-update-fruit-details', ['assignment_id' => $assignment_id, 'token' => $token]);

        $qrCode = QrCode::size(200)->generate($url);
        // {!! QrCode::size(200)->generate('mandor-update-fruit-details', ['assignment_id' => $assignment_id])}

        // Retrieve metadata for Mandor
        $metadataMandor = MandorAssignment::find($assignment_id);
        return view('admin.qrcode-page', compact('metadataMandor', 'qrCode', 'token'));
        // Render the PDF with the QR code and metadata
        // $pdf = Pdf::loadView('admin.qrcode-page', compact('metadataMandor', 'qrCode'))->setPaper('a4', 'portrait');

        // // Automatically download the PDF file
        // return $pdf->download('assignment_' . $assignment_id . '_qrcode.pdf');
    }
    public function updateFruitDetails(Request $request, $assignment_id)
    {
        // Find the MandorAssignment by its ID
        $metadataMandor = MandorAssignment::find($assignment_id);
        $assignment = $metadataMandor;
    
        // Check if the assignment exists
        if (!$metadataMandor) {
            return abort(404, 'Assignment not found');
        }
    
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the currently authenticated user
            $user = Auth::user();
    
            if ($user->role == "Mandor") {
                // Retrieve the fruit details for today based on assignment ID
                $fruitToday = DB::table('fruits_detaile_tbl')
                    ->where('assignment_id', $assignment_id)
                    ->whereDate('created_at', Carbon::today())
                    ->first();
    
                // Return the appropriate view based on whether fruit details are available
                if ($fruitToday) {
                    return view('mandor.update-fruit', compact('metadataMandor', 'fruitToday'));
                } else {
                    return view('mandor.update-fruit', ['metadataMandor' => $metadataMandor]);
                }
            } elseif ($user->role == "Pemandu") {
                return view('mandor.driver-confirm', compact('assignment'));
            } else {
                // Handle other roles or redirect as needed
                return abort(403, 'Unauthorized action.');
            }
        } else {
            // User is not logged in, redirect to login with a callback URL
            return Redirect::route('login', ['redirect' => url()->current()]);
        }
    }

    public function editFruitDetails($assignment_id, $fruit_id)
    {
        // Fetch the assignment and fruit details
        $metadataMandor = MandorAssignment::find($assignment_id);
    
        // Query to get today's fruit details
        $fruitToday = DB::table('fruits_detaile_tbl')
            ->where('assignment_id', $assignment_id)
            ->whereDate('created_at', Carbon::today())
            ->first(); 
    
        // Check if the user is authenticated
        if (Auth::check()) {
            // Pass both $metadataMandor and $fruitToday to the view
            return view('mandor.update-fruit', compact('metadataMandor', 'fruitToday'));
        } else {
            // User is not logged in, redirect to login with a callback URL
            return Redirect::route('login', ['redirect' => route('login', ['id' => $assignment_id])]);
        }
    }
    

    public function generateQR($assignment_id){
    // Generate QR code URL
    $url = route('mandor-update-fruit-details', ['assignment_id' => $assignment_id]);
    
    // Generate the QR code image
    $qrCode = QrCode::size(200)->generate($url);

    $metadataMandor = MandorAssignment::find($assignment_id);
    
    return view('mandor.update-fruit', compact('metadataMandor', 'qrCode'));
    }

    public function insertFruitDetails(Request $request)
    {
        $validatedData = $request->validate([
            'dituai' => 'required|string',
            'muda' => 'required|string',
            'busuk' => 'required|string',
            'kosong' => 'required|string',
            'panjang' => 'required|string',
            's_lama' => 'required|string',
            's_baru' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user_id = Auth::user()->id;
        $object = json_decode($request->input('object'));
        $assignment_id = $object->id;
        // Get the uploaded file
        $file = $request->file('gambar');
    
        // Generate a unique folder name
        $folderName = 'images/' . uniqid() . '-' . now()->timestamp;
    
        // Store the file in the folder and get the relative file path
        $path = $file->store($folderName, 'public'); // Stores in 'storage/app/public'
    
        // Just store the relative path, no need for URL
        $imagePath = $path;
    
        // Create a new Fruit entry
        $fruit = FruitsModel::create([
            'dituai' => $request->dituai,
            'muda' => $request->muda,
            'busuk' => $request->busuk,
            'kosong' => $request->kosong,
            'panjang' => $request->panjang,
            's_lama' => $request->s_lama,
            's_baru' => $request->s_baru,
            'image_path' => $imagePath, // Store the relative path to the image
            'mandor_id' => $user_id,
            'assignment_id' => $assignment_id,
            'delivery_status' => "Pending",
            'tarikh' => now(), 
        ]);
        $fruit->save();
        $metadataMandor = MandorAssignment::find($assignment_id);
        
        return view('mandor.update-fruit', compact('fruit', 'metadataMandor'));
    }
    
    
}
