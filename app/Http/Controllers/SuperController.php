<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\FruitsModel;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SuperController extends Controller
{
    public function viewReport(){
        $page = "view-report";
    
        $fruits = DB::table('fruits_detaile_tbl')
            ->join('table_mandor_assignment_tbl', 'table_mandor_assignment_tbl.id', '=', 'fruits_detaile_tbl.assignment_id')
            ->select(
                'fruits_detaile_tbl.*',
                'table_mandor_assignment_tbl.peringkat',
                'table_mandor_assignment_tbl.blok',
                'table_mandor_assignment_tbl.n_lot',
                'table_mandor_assignment_tbl.n_p_tuai'
            )
            ->whereNotNull('fruits_detaile_tbl.tarikh')
            ->orderBy('fruits_detaile_tbl.tarikh', 'desc')
            ->get();
    
        return view('super.reporting', compact('page', 'fruits'));
    }
    
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
