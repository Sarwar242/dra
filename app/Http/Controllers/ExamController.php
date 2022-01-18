<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamCourse;
use App\Models\Course;
use App\Models\Student;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;
use DB;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        return view('exams.index', compact('exams'));
    }

    public function create()
    {
        $batches = Batch::all();
        $courses = Course::all();
        return view('exams.create', compact(['batches','courses']));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'year' => 'required',
            'batch_id' => 'nullable',
            'status' => 'nullable',
            'courses' => 'required|array',
        ]);
        DB::beginTransaction();
        try {
            $exam = new Exam;
            $exam -> name = $request -> name;
            $exam -> year = $request -> year;
            $exam -> batch_id = $request -> batch_id;
            $exam -> status = $request -> status;
            $exam -> save();

            foreach ($request->courses as $course_id){
                $courses = new ExamCourse;
                $courses->exam_id = $exam -> id;
                $courses->course_id = $course_id;
                $courses -> save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('exam.create');
        }
        session()->flash('success', 'The Exam has been created successfully!!');
        return redirect()->route('exam.create');
    }

    public function edit($id) {

        $exam = Exam::find($id);
        $batches = Batch::all();
        $courses = Course::all();
        return view('exams.edit', compact(['exam','batches','courses']));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => 'required|string',
            'year' => 'required',
            'batch_id' => 'nullable',
            'status' => 'nullable',
            'courses' => 'required|array',
        ]);
        DB::beginTransaction();
        try {
            $exam = Exam::find($id);
            $exam -> name = $request -> name;
            $exam -> year = $request -> year;
            $exam -> batch_id = $request -> batch_id;
            $exam -> status = $request -> status;
            $exam -> save();
            if(!is_null($exam -> courses()))
                $exam -> courses() ->delete();

            foreach ($request->courses as $course_id){
                $courses = new ExamCourse;
                $courses -> exam_id = $exam -> id;
                $courses -> course_id = $course_id;
                $courses -> save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('exam.edit',$id);
        }
        session()->flash('success', 'The Exam has been updated successfully!!');
        return redirect()->route('exams');
    }

    public function destroy(Request $request)
    {
        $exam = Exam::find($request->id);
        $exam ->delete();
        session()->flash('success', 'The Exam has been deleted successfully!!');
        $reponse = array('status' => true);
        return json_encode($reponse);
    }
    public function getCourses($id)
    {
        $courses = Course::join('exam_courses', 'exam_courses.course_id', '=', 'courses.id')
                        ->where('exam_id',$id)->get();
        return json_encode($courses);
    }
     public function getStudents($id)
    {
        $students = Student::where('batch_id', $id)->get();
        return json_encode($students);
    }
}
