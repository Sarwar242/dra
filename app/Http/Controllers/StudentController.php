<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Department;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;
use DB;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batches=Batch::with('department')->get();
        return view('students.create', compact('batches'));
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
            'session' => 'required',
            'roll' => 'required',
            'reg_no' => 'required',
            'batch_id' => 'nullable',
            'email' => 'nullable|email',
            'address' => 'nullable',
        ]);
        DB::beginTransaction();
        try {
            $student = new Student;
            $student -> name = $request -> name;
            $student -> roll = $request -> roll;
            $student -> reg_no = $request -> reg_no;
            $student -> session = $request -> session;
            $student -> email = $request -> email;
            $student -> address = $request -> address;
            $student -> batch_id = $request -> batch_id;
            if(!is_null($request -> batch_id)){
                $batch = Batch::find($request -> batch_id);
                $student -> department_id = $batch -> department_id;
            }
            $student -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('student.create');
        }
        session()->flash('success', 'The student has been created successfully!!');
        return redirect()->route('student.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $student = Student::find($id);
        $batches=Batch::with('department')->get();
        return view('students.edit', compact(['student','batches']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => 'required|string',
            'session' => 'required',
            'roll' => 'required',
            'reg_no' => 'required',
            'batch_id' => 'nullable',
            'email' => 'nullable|email',
            'address' => 'nullable',
        ]);
        DB::beginTransaction();
        try {
            $student = Student::find($id);
            $student -> name = $request -> name;
            $student -> roll = $request -> roll;
            $student -> reg_no = $request -> reg_no;
            $student -> session = $request -> session;
            $student -> email = $request -> email;
            $student -> address = $request -> address;
            $student -> batch_id = $request -> batch_id;
            if(!is_null($request -> batch_id)){
                $batch = Batch::find($request -> batch_id);
                $student -> department_id = $batch -> department_id;
            }
            $student -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('student.edit',$id);
        }
        session()->flash('success', 'The Student has been updated successfully!!');
        return redirect()->route('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request)
    {
        $student = Student::find($request->id);
        $student ->delete();
        session()->flash('success', 'The Student has been deleted successfully!!');
        $reponse = array('status' => true);
        return json_encode($reponse);
    }
}
