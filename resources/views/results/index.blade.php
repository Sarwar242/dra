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
                <h1><i class="fa fa-building-o"></i> Results</h1>
            </div>

            <div class="col-xs-12 col-md-4 text-right">
                <a href="#" data-toggle="modal" style="cursor: pointer;"  class="btn btn-primary" id="mod2" data-target="#modal1">
                    <i class="fa fa-plus"></i> Generate Result
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 rms-data-table">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Exams Result List</h3>
                    </div>

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover rms-table">
                            <tr>
                                <th class="text-center" width="60px">#</th>
                                <th>Exam Name</th>
                                <th>Department</th>
                                <th>Batch</th>
                                <th>Total Courses</th>
                                <th>Status</th>
                                <th class="text-center" width="100px" >Action</th>
                            </tr>
                            @foreach($exams as $exam)
                                <tr>
                                    <td class="text-center">{{ $loop->index+1 }}</td>
                                    <td>{{ $exam->name }} - {{ $exam->year }}</td>
                                    <td>{{ $exam->batch->department->name }}</td>
                                    <td>{{ $exam->batch->name }}</td>
                                    <td>{{ $exam->courses()->count() }}</td>
                                    <td>{{ count($exam->results)==0 ? 'Not Generated' : 'Published' }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm {{ count($exam->results)==0 ? 'btn-danger'  : 'btn-info' }}" {{ count($exam->results)==0 ? 'disabled':''}} href="{{ route('result.view', $exam->id) }}" title="View"><i class="fa fa-eye"></i></a>
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
            jQuery("#searchList").attr("action", baseURL + "batches/" + value);
            jQuery("#searchList").submit();
        });

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



