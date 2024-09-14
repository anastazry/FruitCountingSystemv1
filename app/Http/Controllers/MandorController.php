<?php

namespace App\Http\Controllers;

use App\Models\FruitsModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MandorAssignment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MandorController extends Controller
{
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
        $metadataMandor = MandorAssignment::find($assignment_id);

        // Check if the user is authenticated
        if (Auth::check()) {
            // User is logged in, show the form
            return view('mandor.update-fruit', ['metadataMandor' => $metadataMandor]);
        } else {
            // User is not logged in, redirect to login with a callback URL
            return Redirect::route('login', ['redirect' => route('login', ['id' => $assignment_id])]);
        }
    
        // Handle authenticated user and display the form
        
        // Return the view with the form
        return view('mandor.update-fruit', compact('metadataMandor'));
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
    
        // Store the file in the folder and get the file path
        $path = $file->store($folderName, 'public'); // Stores in 'storage/app/public'
    
        // You now have the path to the image
        $imagePath = Storage::url($path); // Public URL path to the image
    
        // Create a new Fruit entry
        $fruit = FruitsModel::create([
            'dituai' => $request->dituai,
            'muda' => $request->muda,
            'busuk' => $request->busuk,
            'kosong' => $request->kosong,
            'panjang' => $request->panjang,
            's_lama' => $request->s_lama,
            's_baru' => $request->s_baru,
            'images-path' => $imagePath, // Use the correct column name in your FruitsModel table
            // 'location' => $request->location,
            'mandor_id' => $user_id,
            'assignment_id' => $assignment_id,
        ]);
    
        $fruit->save();
        $metadataMandor= MandorAssignment::find($assignment_id);
        return view('mandor.update-fruit', compact('fruit', 'metadataMandor'));
    }
    
}
