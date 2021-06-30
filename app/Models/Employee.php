<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";
    protected $fillable = ['name', 'email', 'phone', 'salary', 'department'];

    public static function getEmployee()
    {
        $records=Employee::select('id', 'name', 'email', 'phone', 'salary', 'department');
        return $records;
    }
}
