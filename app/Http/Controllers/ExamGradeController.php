<?php

namespace App\Http\Controllers;

use App\Models\ExamGrade;
use App\Models\GradeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;
use DB;

class ExamGradeController extends Controller
{
    public function index()
    {
        $grades = ExamGrade::all();
        return view('examGrades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gcs = GradeCategory::all();
        return view('examGrades.create', compact('gcs'));
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
            'grade_point' => 'required',
            'mark_from' => 'required',
            'mark_upto' => 'required',
            'comment' => 'nullable',
            'grade_category_id' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $examGrade = new ExamGrade;
            $examGrade -> name = $request -> name;
            $examGrade -> grade_point = $request -> grade_point;
            $examGrade -> mark_from = $request -> mark_from;
            $examGrade -> mark_upto = $request -> mark_upto;
            $examGrade -> comment = $request -> comment;
            $examGrade -> grade_category_id = $request -> grade_category_id;
            $examGrade -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('grade.create');
        }
        session()->flash('success', 'The Grade has been created successfully!!');
        return redirect()->route('grade.create');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamGrade  $examGrade
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $grade = ExamGrade::find($id);
        $gcs = GradeCategory::all();
        return view('examGrades.edit', compact(['grade','gcs']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamGrade  $examGrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => 'required|string',
            'grade_point' => 'required',
            'mark_from' => 'required',
            'mark_upto' => 'required',
            'comment' => 'nullable',
            'grade_category_id' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $examGrade = ExamGrade::find($id);
            $examGrade -> name = $request -> name;
            $examGrade -> grade_point = $request -> grade_point;
            $examGrade -> mark_from = $request -> mark_from;
            $examGrade -> mark_upto = $request -> mark_upto;
            $examGrade -> comment = $request -> comment;
            $examGrade -> grade_category_id = $request -> grade_category_id;
            $examGrade -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('grade.edit',$id);
        }
        session()->flash('success', 'The Grade has been updated successfully!!');
        return redirect()->route('grades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamGrade  $examGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $examGrade = ExamGrade::find($request->id);
        $examGrade ->delete();
        session()->flash('success', 'The Grade has been deleted successfully!!');
        $reponse = array('status' => true);
        return json_encode($reponse);
    }
}
