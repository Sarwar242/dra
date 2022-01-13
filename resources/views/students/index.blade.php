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
                <h1><i class="fa fa-building-o"></i> Students</h1>
            </div>

            <div class="col-xs-12 col-md-4 text-right">
                <a class="btn btn-primary" href="{{ route('student.create') }}"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 rms-data-table">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Students List</h3>
                    </div>

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover rms-table">
                            <tr>
                                <th class="text-center" width="60px">#</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Registration Number</th>
                                <th>Session</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Department</th>
                                <th>Batch</th>
                                <th class="text-center" width="100px" >Action</th>
                            </tr>
                            @foreach($students as $student)
                                <tr>
                                    <td  class="text-center">{{ $loop->index+1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->roll }}</td>
                                    <td>{{ $student->reg_no }}</td>
                                    <td>{{ $student->session }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->department->name }}</td>
                                    <td>{{ $student->batch->name }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-info"  href="{{ route('student.edit', $student->id) }}" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-sm btn-danger deleteStudent" data-id="{{ $student->id }}" id="studentId" name="Id" title="Delete"><i class="fa fa-trash"></i></button>
                                    </td>
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
        ** For pagination
        **/
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();
            var link = jQuery(this).get(0).href;
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "students/" + value);
            jQuery("#searchList").submit();
        });

        /**
        ** For Delete
        **/
        jQuery(document).on("click", ".deleteStudent", function(){
            var Id = $(this).data("id"),
            hitURL = "/student/delete",
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
                    if(data.status = true) { console.log("Student successfully deleted"); }
                    else if(data.status = false) { console.log("Student delete failed"); }
                    else { alert("Access denied..!"); }
                    location.reload();
                });
            }
        });
    });
</script>
@endsection



