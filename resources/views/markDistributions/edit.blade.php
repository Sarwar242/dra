@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-building-o"></i> MarkDistributions <small> Update MarkDistribution </small></h1>
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
                    <form role="form" id="addUser" class="form-horizontal" action="{{ route('md.update', $markDistribution->id) }}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-4 control-label">Title</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control required" value="{{ $markDistribution->title }}" id="name" name="title" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mark" class="col-sm-4 control-label">Total Marks</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control required" value="{{ $markDistribution->mark }}" id="mark" name="mark" >
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
                                            <a class="btn  btn-default" href="{{ route('mds') }}" title="Cancel"> Cancel </a>
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
