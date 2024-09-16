<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Collection;

class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Create a collection with the provided data
        return new Collection([
            (object)[
                'no' => 1,
                'peringkat' => 8,
                'blok' => 8,
                'n_platform' => 8,
                'dilaksanakan' => 'Zainal Hakim',
                'tarikh' => '31/7/2024',
                'muda' => 37,
                'busuk' => 42,
                'kosong' => 620,
                'panjang' => 27,
                's_lama' => 43,
                's_baru' => 33
            ],
            (object)[
                'no' => 2,
                'peringkat' => 2,
                'blok' => 2,
                'n_platform' => 2,
                'dilaksanakan' => 'Siti Aisyah',
                'tarikh' => '25/7/2024',
                'muda' => 32,
                'busuk' => 42,
                'kosong' => 560,
                'panjang' => 30,
                's_lama' => 40,
                's_baru' => 25
            ],
            (object)[
                'no' => 3,
                'peringkat' => 3,
                'blok' => 3,
                'n_platform' => 3,
                'dilaksanakan' => 'Ali Ibrahim',
                'tarikh' => '26/7/2024',
                'muda' => 28,
                'busuk' => 39,
                'kosong' => 570,
                'panjang' => 31,
                's_lama' => 37,
                's_baru' => 30
            ],
            (object)[
                'no' => 4,
                'peringkat' => 4,
                'blok' => 4,
                'n_platform' => 4,
                'dilaksanakan' => 'Lina Binti',
                'tarikh' => '27/7/2024',
                'muda' => 35,
                'busuk' => 45,
                'kosong' => 580,
                'panjang' => 29,
                's_lama' => 44,
                's_baru' => 28
            ],
            (object)[
                'no' => 5,
                'peringkat' => 5,
                'blok' => 5,
                'n_platform' => 5,
                'dilaksanakan' => 'Kamal Abu',
                'tarikh' => '28/7/2024',
                'muda' => 33,
                'busuk' => 41,
                'kosong' => 590,
                'panjang' => 32,
                's_lama' => 47,
                's_baru' => 26
            ],
            (object)[
                'no' => 6,
                'peringkat' => 6,
                'blok' => 6,
                'n_platform' => 6,
                'dilaksanakan' => 'Nurul Aida',
                'tarikh' => '29/7/2024',
                'muda' => 30,
                'busuk' => 46,
                'kosong' => 600,
                'panjang' => 33,
                's_lama' => 45,
                's_baru' => 29
            ],
            (object)[
                'no' => 7,
                'peringkat' => 7,
                'blok' => 7,
                'n_platform' => 7,
                'dilaksanakan' => 'Farid Haziq',
                'tarikh' => '30/7/2024',
                'muda' => 29,
                'busuk' => 40,
                'kosong' => 610,
                'panjang' => 28,
                's_lama' => 41,
                's_baru' => 31
            ],
            (object)[
                'no' => 8,
                'peringkat' => 8,
                'blok' => 8,
                'n_platform' => 8,
                'dilaksanakan' => 'Zainal Hakim',
                'tarikh' => '31/7/2024',
                'muda' => 37,
                'busuk' => 42,
                'kosong' => 620,
                'panjang' => 27,
                's_lama' => 43,
                's_baru' => 33
            ],
            (object)[
                'no' => 9,
                'peringkat' => 9,
                'blok' => 9,
                'n_platform' => 9,
                'dilaksanakan' => 'Rina Farhana',
                'tarikh' => '01/8/2024',
                'muda' => 34,
                'busuk' => 44,
                'kosong' => 630,
                'panjang' => 35,
                's_lama' => 42,
                's_baru' => 35
            ],
            (object)[
                'no' => 10,
                'peringkat' => 10,
                'blok' => 10,
                'n_platform' => 10,
                'dilaksanakan' => 'Shamsul Idris',
                'tarikh' => '02/8/2024',
                'muda' => 31,
                'busuk' => 46,
                'kosong' => 640,
                'panjang' => 32,
                's_lama' => 38,
                's_baru' => 37
            ],
            (object)[
                'no' => 11,
                'peringkat' => 11,
                'blok' => 11,
                'n_platform' => 11,
                'dilaksanakan' => 'Laila Hana',
                'tarikh' => '03/8/2024',
                'muda' => 28,
                'busuk' => 43,
                'kosong' => 650,
                'panjang' => 33,
                's_lama' => 39,
                's_baru' => 40
            ],
            (object)[
                'no' => 12,
                'peringkat' => 12,
                'blok' => 12,
                'n_platform' => 12,
                'dilaksanakan' => 'Eka Zulaika',
                'tarikh' => '04/8/2024',
                'muda' => 35,
                'busuk' => 47,
                'kosong' => 660,
                'panjang' => 34,
                's_lama' => 42,
                's_baru' => 42
            ],
            (object)[
                'no' => 13,
                'peringkat' => 13,
                'blok' => 13,
                'n_platform' => 13,
                'dilaksanakan' => 'Aminah Yusuf',
                'tarikh' => '05/8/2024',
                'muda' => 38,
                'busuk' => 50,
                'kosong' => 670,
                'panjang' => 36,
                's_lama' => 39,
                's_baru' => 45
            ],
            (object)[
                'no' => 14,
                'peringkat' => 14,
                'blok' => 14,
                'n_platform' => 14,
                'dilaksanakan' => 'Zulfiqar Ahmad',
                'tarikh' => '06/8/2024',
                'muda' => 29,
                'busuk' => 52,
                'kosong' => 680,
                'panjang' => 37,
                's_lama' => 44,
                's_baru' => 47
            ]
        ]);
    }

    /**
     * @param mixed $data
     * @return array
     */
    public function map($data): array
    {
        return [
            $data->no,
            $data->peringkat,
            $data->blok,
            $data->n_platform,
            $data->dilaksanakan,
            $data->tarikh,
            $data->muda,
            $data->busuk,
            $data->kosong,
            $data->panjang,
            $data->s_lama,
            $data->s_baru,
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No.',
            'Peringkat',
            'Blok',
            'No Platform',
            'Dilaksanakan',
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
