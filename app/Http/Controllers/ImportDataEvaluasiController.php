<?php

namespace App\Http\Controllers;

use App\Exports\ImportExport;
use App\Exports\TestimoniExport;
use Illuminate\Http\Request;
use App\Imports\EvaluasiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EvaluasiImportTestimoni;
use App\Imports\TestimoniImport;

class ImportDataEvaluasiController extends Controller
{

    // private $quizId;

    // public function __construct($quizId)
    // {
    //     $this->quizId = $quizId;
    // }

    public function importExcel(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand().$file->getClientOriginalName();

        $file->move('file_import',$nama_file);
        Excel::import(new EvaluasiImport, public_path('/file_import/'.$nama_file));

        return redirect('/evaluator/master-list-data');
    }

    public function exportExcel(){
        return Excel::download(new ImportExport, 'Export.xlsx');
    }

    public function exportTestimoni(){
        return Excel::download(new TestimoniExport, 'Testimoni-Export.xlsx');
    }
    
    public function importExcelTestimoni(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand().$file->getClientOriginalName();

        $file->move('file_import',$nama_file);
        Excel::import(new TestimoniImport, public_path('/file_import/'.$nama_file));

        return redirect('/evaluator/testimoni');
    }
}
