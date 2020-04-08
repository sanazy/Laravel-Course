<?php

namespace App\Exports;

use App\Course;
use Maatwebsite\Excel\Concerns\FromCollection;

class CoursesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Course::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Duration',
            'Price',
            'Author',
            'Created At',
            'Updated At',
        ];
    }
}
