@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-building-o"></i> Departments <small> Update Department </small></h1>
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
                    <form role="form" id="addUser" class="form-horizontal" action="{{ route('department.update', $department->id) }}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="field_id_name" class="col-sm-4 control-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control required" value="{{ $department->name }}" id="field_id_name" name="name" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="field_id_name" class="col-sm-4 control-label">Faculty</label>
                                        <div class="col-sm-8">
                                            <select class="form-control selectpicker" name="faculty" id="fac_name" required>
                                                <option value="" disabled selected>Select One</option>
                                                @foreach (Helper::faculties() as $faculty)
                                                    <option value="{{ $faculty }}" {{ $department->faculty==$faculty? 'selected':'' }}>{{ $faculty }}</option>
                                                @endforeach
                                            </select>
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
                                            <a class="btn  btn-default" href="{{ route('departments') }}" title="Cancel"> Cancel </a>
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
