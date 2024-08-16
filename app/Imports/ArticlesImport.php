<?php

namespace App\Imports;

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ArticlesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Article([
            'name' => $row['name'],
            'description' => $row['description'],
            'classic_price' => $row['classic_price'],
            'repass_price' => $row['repass_price'],
            'express_price' => $row['express_price']


        ]);
    }
}
