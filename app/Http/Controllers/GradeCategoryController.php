<?php

namespace App\Http\Controllers;

use App\Models\GradeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;
use DB;

class GradeCategoryController extends Controller
{
    public function index()
    {
        $gradeCategories = GradeCategory::all();
        return view('gradeCategories.index', compact('gradeCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gradeCategories.create');
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
            'mark' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $gradeCategory = new GradeCategory;
            $gradeCategory -> name = $request -> name;
            $gradeCategory -> mark = $request -> mark;
            $gradeCategory -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('gc.create');
        }
        session()->flash('success', 'The gradeCategory has been created successfully!!');
        return redirect()->route('gc.create');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GradeCategory  $gradeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $gradeCategory = GradeCategory::find($id);

        return view('gradeCategories.edit', compact('gradeCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GradeCategory  $gradeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => 'required|string',
            'mark' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $gradeCategory = GradeCategory::find($id);
            $gradeCategory -> name = $request -> name;
            $gradeCategory -> mark = $request -> mark;
            $gradeCategory -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('gc.edit',$id);
        }
        session()->flash('success', 'The GradeCategory has been updated successfully!!');
        return redirect()->route('grade.categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GradeCategory  $gradeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $gradeCategory = GradeCategory::find($request->id);
        $gradeCategory ->delete();
        session()->flash('success', 'The GradeCategory has been deleted successfully!!');
        $reponse = array('status' => true);
        return json_encode($reponse);
    }
}
