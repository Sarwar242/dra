<?php

namespace App\Http\Controllers;


use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;
use DB;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.add');
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
            'faculty' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $department = new Department;
            $department -> name = $request -> name;
            $department -> faculty = $request -> faculty;
            $department -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('department.create');
        }
        session()->flash('success', 'The department has been created successfully!!');
        return redirect()->route('department.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $department = Department::find($id);

        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => 'required|string',
            'faculty' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $department = Department::find($id);
            $department -> name = $request -> name;
            $department -> faculty = $request -> faculty;
            $department -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('department.edit',$id);
        }
        session()->flash('success', 'The Department has been updated successfully!!');
        return redirect()->route('departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $department = Department::find($request->id);
        $department ->delete();
        $reponse = array('status' => true);
        session()->flash('success', 'The Department has been deleted successfully!!');
        return json_encode($reponse);
    }
}
