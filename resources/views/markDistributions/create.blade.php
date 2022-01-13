@extends('layouts.master')
@section('content')


<div class="content-wrapper class-page">
    <section class="content-header">
        <h1><i class="fa fa-building-o"></i> MarkDistributions <small> New MarkDistribution </small></h1>
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
                    <form role="form" id="addUser" class="form-horizontal" action="{{ route('gc.store') }}" method="post">
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
                                        <label for="mark" class="col-sm-4 control-label">Total Marks</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control required" id="mark" name="mark" >
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
                                            <a class="btn  btn-default" href="{{ route('grade.categories') }}" title="Cancel"> Cancel </a>
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



