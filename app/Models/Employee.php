<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table='employees';
    protected $guarded=[];

    public function importToDB(){
        $path=resource_path('pending-uploads/*.csv');
        $g=glob($path);
       
        foreach(array_slice($g,0,1) as $file){
            $data=array_map('str_getcsv',file($file));
            foreach($data as $row){
                //dd($data);
                self::updateOrCreate([
                    'name'=>$row['0'],
                    'email'=>$row['1'],
                    'phone'=>$row['2'],
                    'salary'=>$row['3'],
                    'department'=>$row['4']
                ]);
            }
            unlink($file);
        }
        return;
    }
    public function importDB(){
        $path=resource_path('pending-uploads/*.csv');
        $g=glob($path);
       
        foreach(array_slice($g,0,1) as $file){
            $data=array_map('str_getcsv',file($file));
            //dd($data);
            foreach($data as $row){
                self::updateOrCreate([
                    'name'=>$row['0'],
                    'email'=>$row['1'],
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
