<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\EmployeeImport;
use App\Models\Employee;
use Illuminate\Support\Facades\Session;

class EmployeesController extends Controller
{
    public function importForm()
    {
        return view('import-form');
    }
    /* public function import(Request $request)
    {
          $data = request()->validate([
            'file'=>'required|mimes:xls,csv,xlsx'
        ]); 

        Excel::import(new EmployeeImport, request()->file);
        return back()->with('success', 'Your details were imported successfully!!!');
    } */
    function import(Request $request){
        $this->validate($request,[
           'file'=>'required|mimes:csv,xlsx'
        ]);
        $file=file($request->file->getRealPath());
        $data=array_slice($file,1);# remove the fist line of the data
        $parts=(array_chunk($data,200));#cut files into parts for php timeout
        foreach($parts as $index=> $part){
           $fileName=resource_path('pending-uploads/'.date('y-m-d-H-i-s').$index.'.csv');
           file_put_contents($fileName,$part);
        }
        (new Employee())->importToDB();
        Session::flash('success','Your file has been uploaded successfully.');
        return redirect()->back();
     }
    
}
