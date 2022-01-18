<?php

namespace App\Http\Controllers;

use App\Models\ExamMark;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class ExamMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function input(Request $request)
    {
        $exam = Exam::find($request->exam_id);
        $courses = $exam->courses2();
        $student = Student::find($request->student_id);

        return view('marks.input', compact(['exam','courses','student']));
    }

    public function save(Request $request)
    {
        $this->validate($request,[
            'exam_id' => 'required',
            'student_id' => 'required',
            'course_id' => 'required',
            'marks' => 'nullable',
        ]);
        DB::beginTransaction();
        $student= Student::find($request->student_id);
        $department = $student->department_id;
        $exam= Exam::find($request->exam_id);
        $batch = $exam->batch_id;
        try {
            $exammark = new ExamMark;
            $exammark -> exam_id = $request -> exam_id;
            $exammark -> student_id = $request -> student_id;
            $exammark -> course_id = $request -> course_id;
            $exammark -> department_id = $department;
            $exammark -> batch_id = $batch;
            $exammark -> total_marks = $request -> marks;
            $exammark -> cgpa = $cgpa;
            $exammark -> user_id = auth()->user()->id;
            $exammark -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('exam.edit',$id);
        }
        session()->flash('success', 'The Exam has been updated successfully!!');
        $reponse = array('status' => true);
        return json_encode($reponse);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamMark  $examMark
     * @return \Illuminate\Http\Response
     */
    public function show(ExamMark $examMark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamMark  $examMark
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamMark $examMark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamMark  $examMark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamMark $examMark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamMark  $examMark
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamMark $examMark)
    {
        //
    }
}
