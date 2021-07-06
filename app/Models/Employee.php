<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $guarded = ['id'];

    public function importToDB()
    {
        $path = resource_path('pending-uploads/*.csv');
        $g = glob($path);

        foreach (array_slice($g, 0, 1) as $file) {
            $data = array_map('str_getcsv', file($file));
            foreach ($data as $row) {
                //dd($data);
                self::updateOrCreate([
                    'sku' => $row['0'],
                    'name' => $row['1'],
                    'price' => $row['2'],
                    'qty' => $row['3'],
                ]);
            }
            unlink($file);
        }
        return;
    }
    public function importDB($data)
    {
        foreach ($data as $row) {
            //dd($data);
            foreach ($row as $key => $value) {
                $dataInRow =    explode(',', $value);
                //dd($dataInRow);
                    self::updateOrCreate(['sku' => $dataInRow['0']],[
                        'sku' => $dataInRow['0'],
                        'name' => $dataInRow['1'],
                        'price' => $dataInRow['2'],
                        'qty' => $dataInRow['3']
                    ]);
            }            
        }
        return;
    }
}
