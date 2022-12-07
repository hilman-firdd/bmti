<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SertifikatController extends Controller
{
    public function index()
    {
        return view('admin.sertifikat.index');
    }

    public function create(Request $request)
    {

        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $data = DB::table('m_sertifikat')->insert([
            'kelompok_keahlian_id' => $request->kelompok_keahlian_id,
            'author' => auth()->user()->name,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName
        ]);
        if ($request->file('gambar')) {
            $image->move(public_path('images/pelatihan/'), $imageName);
        }

        return view('admin.sertifikat.create');
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function upload(Request $request)
    {

        $file = $request->file('file');
        $docFileName = 'sertifikat.rtf';
        $pdfFileName = 'sertifikat.pdf';

        if ($file) {
            // delete exsisting template
            File::delete(public_path('files/templates/sertifikat.docx'));
            File::delete(public_path('files/templates/sertifikat.pdf'));

            // save new template
            $file->move(public_path('files/templates/'), $docFileName);

            // Convert docx to pdf
            $domPdfPath = base_path('vendor/dompdf/dompdf');
            \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
            \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

            //Load word file
            $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('files/templates/sertifikat.rtf'));

            //Save it into PDF
            $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content, 'PDF');
            $PDFWriter->save(public_path('files/templates/sertifikat.pdf'));
        }

        return redirect()->back();
    }

    public function download()
    {

        $file = public_path('files/templates/sertifikat.docx');

        return response()->download($file);
    }
}
