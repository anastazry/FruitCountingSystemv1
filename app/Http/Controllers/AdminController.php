<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MandorAssignment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminController extends Controller
{
    public function returnSuperView(){
        $page = "Dashboard";
        return view('super.dashboard-super', compact('page'));
    }
    public function getAssignmentList()
    {
        $assignments = MandorAssignment::all();
    
        foreach ($assignments as $assignment) {
            // Query the fruits table using assignment_id and created_at for today
            $fruitsToday = DB::table('fruits_detaile_tbl')
                ->where('assignment_id', $assignment->id)
                ->whereDate('created_at', Carbon::today())
                ->get(); // Get a collection of results
    
            if ($fruitsToday->isNotEmpty()) {
                // Initialize default values
                $hasDeliveryStatus = false;
                $status = "Pending";
    
                foreach ($fruitsToday as $fruit) {
                    $assignment->fruit_id = $fruit->id; // Handle each fruit's id
    
                    // Check the delivery status
                    if ($fruit->delivery_status == "Dalam Perjalanan") {
                        $assignment->delivery_status = "Dalam Perjalanan";
                        $hasDeliveryStatus = true;
                    } elseif ($fruit->delivery_status == "Pending") {
                        $assignment->delivery_status = "Pending";
                    } else {
                        $assignment->delivery_status = "Selesai";
                    }
    
                    // Check if the tarikh is set for today
                    if ($fruit->tarikh && Carbon::parse($fruit->tarikh)->isToday()) {
                        $status = "Selesai";
                    }else{
                        $status = "Pending";
                    }
                }
    
                // Set the status based on fruits found today
                $assignment->stats = $status;
            } else {
                $assignment->stats = "Pending";
            }
        }
    
        $page = "assignment-list";
        return view('admin.assignment-list', compact('assignments', 'page'));
    }

    public function createQR(){
        $users = User::all();
        $breadcrumb1 = "Manage Users";
        $headings = "Manage Users";
        $page = "generate-assignment";
        return view('admin.create-qr', compact('users','breadcrumb1', 'headings','page'));
    }

    public function getAllUserList(){
        $users = User::all();
        $breadcrumb1 = "Manage Users";
        $headings = "Manage Users";
        $page = "users";
        return view('admin.users-list', compact('users','breadcrumb1', 'headings','page'));
    }
    public function returnRegisterNewUserPage(){
        $page = "new-user";
        return view('admin.create-newuser', compact('page'));
    }
    public function registerUser(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'worker_id' => 'required|string|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'phone_no' => 'required|string|max:20|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|max:255'
            // Add other validation rules as needed
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'worker_id' => $request->worker_id,
            'phone_no' => $request->phone_no,
            'role' => $request->role,
            'username' => $request->username,  // Fix this line
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        // dd ($user);
        $page = "Dashboard";
        return view('dashboard', compact('page'));

        // return redirect()->route('admin.create-newuser')->with('message', 'User registered successfully');
    }

    public function getEditUserAccountForm($id){
        $user = User::find($id);
        return view('admin.edit-user-account', compact('user'));
    }

    public function resetUserPassword($id)  //reset user password
    {
        $user = User::findOrFail($id);

        // Generate a random password
        $newPassword = Str::random(8);

        // Update the user's password
        $user->password = Hash::make($newPassword);
        $user->first_time_status = 1;
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('message', 'Password reset successfully. New password: ' . $newPassword);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();

            // Redirect back with a success message
            return redirect()->back()->with('message', 'User deleted successfully.');
        }

        // Redirect back with an error message if the user is not found
        return redirect()->back()->with('error', 'User not found.');
    }
    public function disableUser($id)
    {
        $user = User::find($id);
        $adminUser = Auth::user();

        if ($user && $adminUser != $user) {
            $user->accessToken = ($user->accessToken == 1) ? 0 : 1;
            $user->save();
            $message = ($user->accessToken == 0) ? 'User disabled successfully.' : 'User enabled successfully.';
            return redirect()->back()->with('message', $message);
        } else if ($adminUser == $user) {
            return redirect()->back()->with('error', 'Error! Cannot disable own account!');
        }

        // Redirect back with an error message if the user is not found.
        return redirect()->back()->with('error', 'User not found.');
    }
    public function assignTaskToMandor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'peringkat' => 'required|string',
            'blok' => 'required|string',
            'n_lot' => 'required|string',
            'n_p_tuai' => 'required|string',
            'mandor_id' => 'required|exists:users,id',
            'k_penuai' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            // Dump the failed validation messages (optional for debugging)
            dd($validator->errors()->all()); // Shows all error messages
            
            // Return back with errors if validation fails
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Get the validated data and add the default 'status' value
        $validatedData = $validator->validated();
        $validatedData['status'] = 'Pending'; // Add 'status' with a value of 'pending'

        // // Use the modified data to create the record
        $mandorAssignment = MandorAssignment::create($validatedData);
        $page = "Dashboard";
        return redirect()->route('dashboard')->with($page);
    }
    public function getUpdateAssignmentDetails($assignment_id)
    {
        // Find the existing MandorAssignment by assignment_id
        $mandorAssignment = MandorAssignment::find($assignment_id);
        $users = User::all();

        // dd($mandorAssignment);
        return view('admin.create-qr', compact('mandorAssignment', 'users'));

    }

    public function updateTaskAssignment(Request $request, $assignment_id)
    {
        // Find the existing MandorAssignment by assignment_id
        $mandorAssignment = MandorAssignment::find($assignment_id);

        // Check if the record exists
        if (!$mandorAssignment) {
            return redirect()->route('dashboard')->with('error', 'Assignment not found.');
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'peringkat' => 'required|string',
            'blok' => 'required|string',
            'n_lot' => 'required|string',
            'n_p_tuai' => 'required|string',
            'mandor_id' => 'required|exists:users,id',
            'k_penuai' => 'required|string',
        ]);

        if ($validator->fails()) {
            // Dump the failed validation messages (optional for debugging)
            dd($validator->errors()->all()); // Shows all error messages
            
            // Return back with errors if validation fails
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get the validated data and update the record
        $validatedData = $validator->validated();
        
        // Update the MandorAssignment record
        $mandorAssignment->update($validatedData);

        return redirect()->route('admin.assign-list')->with('success', 'Assignment updated successfully.');
    }

}
        // Validate and create the assignment
        // dd($request);
        // $data = $request->validate([
        //     'peringkat' => 'required|string',
        //     'blok' => 'required|string',
        //     'n_lot' => 'required|string',
        //     'n_p_tuai' => 'required|string',
        //     'mandor_id' => 'required|exists:users,id',
        //     'k_penuai' => 'required|string',
        //     'status' => 'required|string'
        // ]);
        // dd($data);

        // dd();
