<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Topik;
use App\Models\TopikQuiz;
use Illuminate\Http\Request;

class TopikQuizController extends Controller
{
    public function index(){
        $data = TopikQuiz::all();
        return view('admin.topikQuiz.index', compact('data'));
    }
    public function create()
    {
        $topik = Topik::all();
        $quiz = Quiz::all();
        return view('admin.topikQuiz.create', compact(['topik', 'quiz']));
    }
    public function store(Request $request)
    {
        $data = TopikQuiz::create([
            'topik_id' => $request->topik_id,
            'quiz_id' => $request->quiz_id
        ]);
        return redirect('/topik-quiz');
    }
    public function edit($id)
    {
        $data = TopikQuiz::find($id);
        $topik = Topik::all();
        $quiz = Quiz::all();
        return view('admin.topikQuiz.edit', compact(['data','topik','quiz']));
    }
    public function update(Request $request, $id)
    {
        $data = TopikQuiz::find($id);
        $data->update([
            'topik_id' => $request->topik_id,
            'quiz_id' => $request->quiz_id
        ]);
       
        return redirect('/topik-quiz');
    }
    public function delete($id)
    {
        $data = TopikQuiz::find($id);
        $data->delete();

        return redirect('/topik-quiz');
    
    }
}