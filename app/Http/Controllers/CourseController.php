<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;
use DB;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|string',
            'code' => 'required',
            'credit' => 'nullable',
        ]);
        DB::beginTransaction();
        try {
            $course = new Course;
            $course -> name = $request -> name;
            $course -> code = $request -> code;
            $course -> credit = $request -> credit;
            $course -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('course.create');
        }
        session()->flash('success', 'The course has been created successfully!!');
        return redirect()->route('course.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $course = Course::find($id);

        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => 'required|string',
            'code' => 'required',
            'credit' => 'nullable',
        ]);
        DB::beginTransaction();
        try {
            $course = Course::find($id);
            $course -> name = $request -> name;
            $course -> code = $request -> code;
            $course -> credit = $request -> credit;
            $course -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('course.edit',$id);
        }
        session()->flash('success', 'The Course has been updated successfully!!');
        return redirect()->route('courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $course = Course::find($request->id);
        $course ->delete();
        session()->flash('success', 'The Course has been deleted successfully!!');
        $reponse = array('status' => true);
        return json_encode($reponse);
    }
}
