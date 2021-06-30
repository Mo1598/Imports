<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\EmployeeImport;

class EmployeesController extends Controller
{
    public function importForm()
    {
        return view('import-form');
    }
    public function import(Request $request)
    {
          $data = request()->validate([
            'file'=>'required|mimes:xls,csv,xlsx'
        ]); 

        Excel::import(new EmployeeImport, request()->file);
        return back()->with('success', 'Your details were imported successfully!!!');
    }
    
}
