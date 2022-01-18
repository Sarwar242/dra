@extends('layouts.master')
@section('content')
<div class="content-wrapper">

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
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-8 title-bar">
                <h1><i class="fa fa-building-o"></i> {{ $result->exam->name }} - {{ $result->exam->year }}</h1>
            </div>

            <div class="col-xs-12 col-md-4 text-right">
                {{-- <a href="#" data-toggle="modal" style="cursor: pointer;"  class="btn btn-primary" id="mod2" data-target="#modal1">
                    <i class="fa fa-plus"></i> Generate Result
                </a> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 rms-data-table">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Result Details</h3><hr>
                        <h6 class="box-title"><strong>Student Name: </strong> &nbsp;&nbsp; {{ $result->student->name }}</h6><br>
                        <h6 class="box-title"><strong>Student Roll: </strong> &nbsp;&nbsp;  {{ $result->student->roll }}</h6><br>
                        <h6 class="box-title"><strong>CGPA: </strong> &nbsp;&nbsp; {{ $result->gpa }}</h6><br><hr>
                    </div>

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover rms-table">
                            <tr>
                                <th class="text-center" width="60px">#</th>
                                <th>Course</th>
                                <th>Credit</th>
                                <th>Grade Point</th>
                                <th>Mark</th>
                                <th>Comment</th>

                            </tr>
                            @foreach($marks as $mark)
                                <tr>
                                    <td class="text-center">{{ $loop->index+1 }}</td>
                                    <td>{{ $mark->course->name }} ({{ $mark->course->code }})</td>
                                    <td>{{ $mark->course->credit }}</td>
                                    <td>{{ $mark->cgpa }}</td>
                                    <td>{{ $mark->total_marks }}</td>
                                    <td>{{ Helper::comment($mark->cgpa) }}</td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript" src="/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){

        /**
        ** For Delete
        **/
        jQuery(document).on("click", ".deleteBatch", function(){
            var Id = $(this).data("id"),
            hitURL = "/exam/delete",
            currentRow = $(this);
            var confirmation = confirm("Are you sure want to delete ?");

            if(confirmation)
            {
                jQuery.ajax({
                type : "GET",
                dataType : "json",
                url : hitURL,
                data : { id : Id }
                }).done(function(data){
                    console.log(data);
                    currentRow.parents('tr').remove();
                    if(data.status = true) { console.log("Batch successfully deleted"); }
                    else if(data.status = false) { console.log("Batch delete failed"); }
                    else { alert("Access denied..!"); }
                    location.reload();
                });
            }
        });
    });
</script>
@endsection



