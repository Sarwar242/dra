<?php

namespace App\Http\Controllers;

use App\Models\MarkDistribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;
use DB;

class MarkDistributionController extends Controller
{
    public function index()
    {
        $markDistributions = MarkDistribution::all();
        return view('markDistributions.index', compact('markDistributions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('markDistributions.create');
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
            'title' => 'required|string',
            'mark' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $markDistribution = new MarkDistribution;
            $markDistribution -> title = $request -> title;
            $markDistribution -> mark = $request -> mark;
            $markDistribution -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('md.create');
        }
        session()->flash('success', 'The Mark Distribution has been created successfully!!');
        return redirect()->route('md.create');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarkDistribution  $markDistribution
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $markDistribution = MarkDistribution::find($id);

        return view('markDistributions.edit', compact('markDistribution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MarkDistribution  $markDistribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'title' => 'required|string',
            'mark' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $markDistribution = MarkDistribution::find($id);
            $markDistribution -> title = $request -> title;
            $markDistribution -> mark = $request -> mark;
            $markDistribution -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('md.edit',$id);
        }
        session()->flash('success', 'The MarkDistribution has been updated successfully!!');
        return redirect()->route('mds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarkDistribution  $markDistribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $markDistribution = MarkDistribution::find($request->id);
        $markDistribution ->delete();
        session()->flash('success', 'The MarkDistribution has been deleted successfully!!');
        $reponse = array('status' => true);
        return json_encode($reponse);
    }
}
