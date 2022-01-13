@extends('layouts.master')
@section('content')


<div class="content-wrapper class-page">
    <section class="content-header">
        <h1><i class="fa fa-building-o"></i> Grades <small> New Grade </small></h1>
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
                    <form role="form" id="addUser" class="form-horizontal" action="{{ route('grade.store') }}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-4 control-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control required" id="name" name="name" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="grade_point" class="col-sm-4 control-label">Grade Point</label>
                                        <div class="col-sm-8">
                                            <input type="number" step="any" class="form-control required" id="grade_point" name="grade_point" >
                                        </div>
                                    </div>
                                </div>
                            </div>

{{--
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="point_from" class="col-sm-4 control-label">Point From</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control required" id="point_from" name="point_from" >
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="point_to" class="col-sm-4 control-label">Point To</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control required" id="point_to" name="point_to" >
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mark_from" class="col-sm-4 control-label">Mark From</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control required" id="mark_from" name="mark_from" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mark_upto" class="col-sm-4 control-label">Mark Upto</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control required" id="mark_upto" name="mark_upto" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="comment" class="col-sm-4 control-label">Comment</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control required" id="comment" name="comment" >
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="grade_category" class="col-sm-4 control-label">Grade Category</label>
                                        <div class="col-sm-8">
                                            <select class="form-control selectpicker" name="grade_category_id" id="grade_category" required>
                                                <option value="" disabled selected>Select One</option>
                                                @foreach ($gcs as $gc)
                                                    <option value="{{ $gc->id }}">{{ $gc->name }}</option>
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

                                            <input type="submit" class="btn btn-primary" value="Submit" />
                                            <a class="btn  btn-default" href="{{ route('grades') }}" title="Cancel"> Cancel </a>
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



