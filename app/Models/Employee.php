<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";
    protected $fillable = ['name', 'email', 'phone', 'salary', 'department'];

    /* public static function getEmployee()
    {
        $records=Employee::select('id', 'name', 'email', 'phone', 'salary', 'department');
        return $records;
    } */
    public function importToDB(){
        $path=resource_path('pending-files/*.csv');
        $g=glob($path);
       
        foreach(array_slice($g,0,1) as $file){
            $data=array_map('str_getcsv',file($file));
            
            foreach($data as $row){
               
                // self::updateOrCreate([

                // ]);
                self::updateOrCreate([
                    'name'=>$row['0'],
                    'emmail'=>$row['1'],
                    'phone'=>$row['2'],
                    'salary'=>$row['3'],
                    'department'=>$row['4']
                ]);
            }
            unlink($file);
        }
        return;
    }
}
