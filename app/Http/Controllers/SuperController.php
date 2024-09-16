<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SuperController extends Controller
{
    public function viewReport(){
        return view('super.reporting');
    }
    
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
