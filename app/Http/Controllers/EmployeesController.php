<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\EmployeeImport;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{
    public function importForm(Request $request)
    {
        $file =  Storage::get('Files/Employees.csv');
        $rows = preg_split('/\n/', $file);
        //dd($rows);
        //Remove empty elements
        $filtered_array = array_filter($rows);
        //dd($filtered_array);
        $data = array_slice($filtered_array, 1);
        //dd($data);
        $parts = (array_chunk($data, 200));
        //dd($parts);
        foreach ($parts as $index => $part) {
            $fileName = resource_path('pending-uploads/' . date('y-m-d-H-i-s') . $index . '.csv');
            file_put_contents($fileName, $part);
        }
        (new Employee())->importDB();
        return view('import-form');
    }
    /* public function import(Request $request)
    {
          $data = request()->validate([
            'file'=>'required|mimes:xls,csv,xlsx'
        ]); 

        Excel::import(new EmployeeImport, request()->file);
        return back()->with('success', 'Your details were imported successfully!!!');
    }  */
    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv'
        ]);
        $file = file($request->file->getRealPath());
        $data = array_slice($file, 1); # remove the fist line of the data
        $parts = (array_chunk($data, 200)); #cut files into parts for php timeout
        foreach ($parts as $index => $part) {
            $fileName = resource_path('pending-uploads/' . date('y-m-d-H-i-s') . $index . '.csv');
            file_put_contents($fileName, $part);
        }
        (new Employee())->importToDB();
        return back()->with('success', 'Your details were imported successfully!!!');
    }
}
