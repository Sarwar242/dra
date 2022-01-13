<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;
use DB;
class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::all();
        return view('batches.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Department::all();
        return view('batches.create', compact('departments'));
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
            'department_id' => 'nullable'
        ]);
        DB::beginTransaction();
        try {
            $batch = new Batch;
            $batch -> name = $request -> name;
            $batch -> session = $request -> session;
            $batch -> department_id = $request -> department_id;
            $batch -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('batch.create');
        }
        session()->flash('success', 'The batch has been created successfully!!');
        return redirect()->route('batch.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $batch = Batch::find($id);
        $departments=Department::all();
        return view('batches.edit', compact(['batch','departments']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => 'required|string',
            'session' => 'required',
            'department_id' => 'nullable'
        ]);
        DB::beginTransaction();
        try {
            $batch = Batch::find($id);
            $batch -> name = $request -> name;
            $batch -> session = $request -> session;
            $batch -> department_id = $request -> department_id;
            $batch -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('batch.edit',$id);
        }
        session()->flash('success', 'The Batch has been updated successfully!!');
        return redirect()->route('batches');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $batch = Batch::find($request->id);
        $batch ->delete();
        session()->flash('success', 'The Batch has been deleted successfully!!');
        $reponse = array('status' => true);
        return json_encode($reponse);
    }
}
