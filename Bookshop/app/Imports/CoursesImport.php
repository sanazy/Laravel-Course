<?php

namespace App\Imports;

use App\Course;
use Maatwebsite\Excel\Concerns\ToModel;

class CoursesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Course([
            'title' => $row['title'],
            'duration' => $row['duration'],
            'price' => $row['price'],
            'author' => $row['author'],
        ]);
    }
}
