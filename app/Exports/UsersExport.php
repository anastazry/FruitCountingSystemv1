<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Collection;

class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    public function collection()
    {
        return DB::table('fruits_detaile_tbl')
            ->join('table_mandor_assignment_tbl', 'table_mandor_assignment_tbl.id', '=', 'fruits_detaile_tbl.assignment_id')
            ->join('users', 'users.id', '=', 'fruits_detaile_tbl.mandor_id')
            ->select(
                'fruits_detaile_tbl.id',
                'table_mandor_assignment_tbl.peringkat',
                'table_mandor_assignment_tbl.blok',
                'table_mandor_assignment_tbl.n_lot',
                'table_mandor_assignment_tbl.n_p_tuai',
                'fruits_detaile_tbl.mandor_id',
                'users.name as mandor_name',
                'fruits_detaile_tbl.tarikh',
                'fruits_detaile_tbl.muda',
                'fruits_detaile_tbl.busuk',
                'fruits_detaile_tbl.kosong',
                'fruits_detaile_tbl.panjang',
                'fruits_detaile_tbl.s_lama',
                'fruits_detaile_tbl.s_baru'
            )
            ->whereNotNull('fruits_detaile_tbl.tarikh')
            ->orderBy('fruits_detaile_tbl.tarikh', 'desc')
            ->get();
    }

    public function map($data): array
    {
        return [
            $data->id,
            $data->peringkat,
            $data->blok,
            $data->n_lot,
            $data->n_p_tuai,
            $data->mandor_name,
            $data->tarikh,
            $data->muda,
            $data->busuk,
            $data->kosong,
            $data->panjang,
            $data->s_lama,
            $data->s_baru,
        ];
    }

    public function headings(): array
    {
        return [
            'No.',
            'Peringkat',
            'Blok',
            'Lot',
            'No Pentas Tuai',
            'Nama Mandor',
            'Tarikh',
            'Muda',
            'Busuk',
            'Kosong',
            'Panjang',
            'Serangan Lama',
            'Serangan Baru',
        ];
    }
}