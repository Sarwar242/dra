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


    public function input(Request $request)
    {
        $exam = Exam::find($request->exam_id);
        $student = Student::find($request->student_id);
        $courses = $exam->courses2()->where('exam_id', $request->exam_id);
        foreach ($courses as $course){
            $exammark = ExamMark::where('student_id',$request->student_id)
                                ->where('exam_id',$request->exam_id)
                                ->where('course_id',$course->id)->first();
            $total_marks='';
            if(!empty($exammark))
                $total_marks=$exammark->total_marks;


            $course->setAttribute('total_marks', $total_marks);
        }

        info($courses);
        return view('marks.input', compact(['exam','courses','student']));
    }

    public function save(Request $request)
    {
        $this->validate($request,[
            'exam_id' => 'required',
            'student_id' => 'required',
            'course_id' => 'required',
            'marks' => 'required',
        ]);

        $student= Student::find($request->student_id);
        $department_id = $student->department_id;
        $exam= Exam::find($request->exam_id);
        $batch_id = $exam->batch_id;
        $course_id =  $request->course_id;
        $gc = ExamGrade::where('mark_upto', '>=', (int)$request->marks)
                        ->where('mark_from','<=', (int)$request->marks)
                        ->first();

        $cgpa = is_null($gc)? '': $gc->grade_point;
        info( $gc);
        $exammark = ExamMark::where('student_id',$request->student_id)
                        ->where('exam_id',$request->exam_id)
                        ->where('course_id',$request->course_id)->first();
        if(empty($exammark)){
            $exammark = new ExamMark;
        }
        try {

            $exammark->student_id = $request->student_id;
            $exammark->exam_id = $request->exam_id;
            $exammark->department_id = $department_id;
            $exammark->course_id = $course_id;
            $exammark->batch_id = $batch_id;
            $exammark->cgpa = $cgpa;
            $exammark->user_id = auth()->user()->id;
            $exammark->total_marks = $request->marks;
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
