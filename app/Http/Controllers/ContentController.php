<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(){
        $data = Content::all();

        return view('admin.content.index', compact('data'));
    }
    public function create(){
        return view('admin.content.create');
    }
    public function store(Request $request){
        $data = Content::create([
            'course_content' => $request->course_content,
            'lesson_content' => $request->lesson_content,
        ]);

        return redirect('/content');
    }
    public function edit($id){
        $data = Content::find($id);
        return view('admin.content.edit', compact(['data']));
    }
    public function update(Request $request, $id){
        $data = Content::find($id);
        $data->update([
            'course_content' => $request->course_content,
            'lesson_content' => $request->lesson_content,
        ]);

        return redirect('/content');
    }
    public function delete($id){
        $data = Content::find($id);
        $data->delete();

        return redirect('/content');
    }
}
