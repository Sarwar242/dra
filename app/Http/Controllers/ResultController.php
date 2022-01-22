<?php

namespace App\Http\Controllers;

use App\Models\ExamMark;
use App\Models\Exam;
use App\Models\ExamGrade;
use App\Models\GradeCategory;
use App\Models\MarkDistributionValue;
use App\Models\Student;
use App\Models\Rank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;
use DB;

class ResultController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        return view('results.index', compact('exams'));
    }
    public function view($exam_id)
    {
        $results = Rank::where('exam_id', $exam_id)->orderBy('gpa','desc')->get();
        $exam = Exam::find($exam_id);

        return view('results.view', compact(['results','exam']));
    }


    public function details($id)
    {
        $result = Rank::find($id);
        $marks = ExamMark::where('exam_id', $result->exam_id)
                            ->where('batch_id', $result->batch_id)
                            ->where('student_id', $result->student_id)
                            ->get();

        return view('results.details', compact(['result','marks']));
    }

    public function generate(Request $request)
    {
        $this->validate($request,[
            'exam_id' => 'required',
            'batch_id' => 'required'
        ]);

        $marks = ExamMark::where('exam_id', $request->exam_id)
                            ->where('batch_id', $request->batch_id)
                            ->get();
        $exam =Exam::find($request->exam_id);
        foreach ($marks->unique('student_id') as $value){
                $total_gpa=0.0;
                $total_credit = 0.0;
                $total_failed = 0;
                $result = Rank::where('student_id', $value->student_id)
                                ->where('batch_id', $request-> batch_id)
                                ->where('exam_id', $request->exam_id)->first();
                if(empty($result))
                    $result = new Rank;
                $result->batch_id=$exam-> batch_id;
                $result->department_id=$exam-> batch->department_id;
                $result->exam_id=$exam->id;
                $result->student_id=$value->student_id;
                foreach($marks->where('student_id', $value->student_id)->unique('course_id') as $obj){
                    $total_gpa += $obj->cgpa * $obj->course->credit;
                    $total_credit += $obj->course->credit;
                    /** Failed Course Count */
                    if($obj->cgpa==0){
                        $total_failed +=1;
                    }

                }
                $result->credit=$total_credit;
                $result->gpa=$total_gpa/$total_credit;
                /** if a student fails in more than 3 subjects then he/she will not be promoted */
                $result->failed = $total_failed;
                if($total_failed>3){
                    $result->status= "not promoted";
                }else{
                    $result->status= "promoted";
                }
                $result->save();
        }
                            //courses*students
                            //1 student => achieved marks/grade of all courses
        session()->flash('success', 'The Result has been generated successfully!!');
        return redirect()->route('results');
    }



    /** Frontend */
    public function result(Request $request)
    {
        $this->validate($request,[
            'roll' => 'required',
            'reg_no' => 'required',
            'exam_id' => 'required',
            'batch_id' => 'required',
        ]);

        $student = Student::where('roll', $request->roll)
                            ->where('reg_no', $request->reg_no)
                            ->first();
        if(empty($student)){
            session()->flash('failed', 'Invalid Roll/Registration!!');
            return back();
        }
        $result = Rank::where('student_id', $student->id)
                        ->where('batch_id', $request-> batch_id)
                        ->where('exam_id', $request->exam_id)->first();
        if(empty($result)){
            session()->flash('failed', 'Sorry, Result Not Published Yet!!');
            return back();
        }

        return view('result', compact('result'));
    }

}
