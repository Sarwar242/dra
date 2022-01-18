@extends('layouts.master')
@section('content')


<div class="content-wrapper class-page">
    <section class="content-header">
        <h1><i class="fa fa-building-o"></i> Exam <small> Marks </small></h1>
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
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="session" class="col-sm-6 control-label">Course Name</label>
                                        <div class="col-sm-6">
                                            <strong>Total Marks Achieved</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @foreach($courses as $course)
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="field_id_name" class="col-sm-6 control-label">{{ $course->name }}({{ $course->code }})</label>
                                            <div class="col-sm-4">
                                                <input type="number" step="any" value="{{ $course->total_marks }}" class="form-control required" id="mark_{{ $course->id }}" name="marks" >
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-sm btn-success" style="cursor: pointer;" onclick="save({{ $course->id }})">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <div class="col-sm-4 control-label"></div>
                                        <div class="col-sm-8">
                                            <input type="hidden" name="exam_id" id="exam_id" value="{{ $exam->id }}">
                                            <input type="hidden" name="student_id" id="student_id" value="{{ $student->id }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection


@section('script')
<script>
    function save(id){
        var exam_id = $("#exam_id").val();
        var student_id = $("#student_id").val();
        var marks = $("#mark_"+id).val();
        var e = event.target;
        $.ajax({
         type:'POST',
         url:'/marks/save',
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         data: {
                    "exam_id": exam_id,
                    "student_id": student_id,
                    "course_id": id,
                    "marks": marks,
            },
         success: function(data){
            console.log(data);
            e.innerHTML='Saved';
         }
      });
    }
</script>
@endsection
