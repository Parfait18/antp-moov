<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\ContactImport;
use Maatwebsite\Excel\Facades\Excel;



class ImportController extends Controller
{
    public function importExportView()
    {
       return view('import/import');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function export()
    // {
    //     return Excel::download(new UsersExport, 'users.xlsx');
    // }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new ContactImport,request()->file('file'));
        return back();
    }
}
