@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-building-o"></i> Exams <small> Update Exam </small></h1>
    </section>
    <section class="content">

        <div class="row">
             <div class="col-md-12">
                @if(Session::has('success'))

                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">
                            x
                        </button>
                        <strong>
                            {!! session('success') !!}
                        </strong>
                    </div>
                @endif
                @if(Session::has('failed'))

                    <div class="alert alert-error alert-block">
                        <button type="button" class="close" data-dismiss="alert">
                            x
                        </button>
                        <strong>
                            {!! session('failed') !!}
                        </strong>
                    </div>

                @endif
                @foreach ($errors->all() as $message)
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">
                            x
                        </button>
                        <strong>
                            {!! $message !!}
                        </strong>
                        </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">

                    <!-- form start -->
                    <form role="form" id="addUser" class="form-horizontal" action="{{ route('exam.update', $exam->id) }}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-4 control-label">Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" value="{{ $exam->name }}" class="form-control required" id="name" name="name" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="year" class="col-sm-4 control-label">Year</label>
                                            <div class="col-sm-8">
                                                <input type="number" value="{{ $exam->year }}" step="any" class="form-control required" id="year" name="year" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="batch" class="col-sm-4 control-label">Department - Batch</label>
                                            <div class="col-sm-8">
                                                <select class="form-control selectpicker" name="batch_id" id="batch" required>
                                                    <option value="" disabled>Select One</option>
                                                    @foreach ($batches as $batch)
                                                        <option value="{{ $batch->id }}" {{ $batch->id==$exam->batch_id? 'selected':'' }}>{{ $batch->department->name }}--{{ $batch->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="batch" class="col-sm-4 control-label">Courses</label>
                                            <div class="col-sm-8">
                                                <select class="form-control selectpicker" data-live-search="true" name="courses[]" multiple aria-label="multiple select" required>
                                                    @foreach($courses as $course)
                                                    @php $check=0; @endphp

                                                    @foreach($exam->courses as $course2)
                                                        @if ($course2->course_id == $course->id)
                                                        <option value="{{$course->id}}" selected>{{$course->name}}</option>
                                                        @php $check=1; @endphp
                                                        @break
                                                        @endif
                                                    @endforeach
                                                    @if ($check==0)
                                                        <option value="{{$course->id}}" >{{$course->name}}</option>
                                                    @endif
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status" class="col-sm-4 control-label">Status</label>
                                            <div class="col-sm-8">
                                                <select class="form-control selectpicker" name="status" id="status" required>
                                                    <option value="" disabled>Select One</option>
                                                    @foreach (Helper::statuses() as $status)
                                                        <option value="{{ $status }}" {{ $exam->status==$status? 'selected':'' }}>{{ $status }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <div class="col-sm-4 control-label"></div>
                                        <div class="col-sm-8">

                                            <input type="submit" class="btn btn-primary" value="Update" />
                                            <a class="btn  btn-default" href="{{ route('exams') }}" title="Cancel"> Cancel </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
