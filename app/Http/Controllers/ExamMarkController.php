<?php

namespace App\Http\Controllers;

use App\Models\ExamMark;
use App\Models\Exam;
use App\Models\ExamGrade;
use App\Models\GradeCategory;
use App\Models\MarkDistributionValue;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;
use DB;
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

        $student= Student::find($request->student_id);
        $department = $student->department_id;
        $exam= Exam::find($request->exam_id);
        $batch = $exam->batch_id;
        $gc = ExamGrade::where('mark_upto', '>=', $request->marks)
                        ->where('mark_from','<=', $request->marks)
                        ->first();

        $cgpa = is_null($gc)? '': $gc->grade_point;
        info($cgpa);

        try {
            \Log::warning($request -> course_id);
            $exammark = new ExamMark;
            $exammark -> exam_id = $request -> exam_id;
            $exammark -> student_id = $student -> id ;
            $exammark -> course_id = $request -> course_id;
            $exammark -> department_id = $department;
            $exammark -> batch_id = $batch;
            $exammark -> total_marks = $request -> marks;
            $exammark -> cgpa = $cgpa;
            $exammark -> user_id = auth()->user()->id;
            $exammark -> save();

        } catch (\Exception $e) {
            $reponse = array('success' => false,
                            'messages' =>$e);
        }
        session()->flash('success', 'The Mark has been updated successfully!!');
        $reponse = array('success' => true);
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
