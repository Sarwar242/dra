@extends('layouts.master')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/af-2.3.7/b-2.1.1/cr-1.5.5/date-1.1.1/fc-4.0.1/fh-3.2.1/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/sp-1.4.0/sl-1.3.4/sr-1.0.1/datatables.min.css"/>

@endsection
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
                <h1><i class="fa fa-building-o"></i> Exams</h1>
            </div>

            <div class="col-xs-12 col-md-4 text-right">
                <a class="btn btn-primary" href="{{ route('exam.create') }}"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 rms-data-table">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Exams List</h3>
                    </div>

                    <div class="box-body table-responsive no-padding">
                        <table id="dataTable" class="table table-hover rms-table">
                            <tr>
                                <th class="text-center" width="60px">#</th>
                                <th>Name</th>
                                <th>Year</th>
                                <th>Batch</th>
                                <th>Status</th>
                                <th class="text-center" width="100px" >Action</th>
                            </tr>
                            @foreach($exams as $exam)
                                <tr>
                                    <td  class="text-center">{{ $loop->index+1 }}</td>
                                    <td>{{ $exam->name }}</td>
                                    <td>{{ $exam->year }}</td>
                                    <td>{{ $exam->batch->department->name }}--{{$exam->batch->name }}</td>
                                    <td>{{ $exam->status }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-info"  href="{{ route('exam.edit', $exam->id) }}" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-sm btn-danger deleteExam" data-id="{{ $exam->id }}" id="ExamId" name="Id" title="Delete"><i class="fa fa-trash"></i></button>
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
            jQuery("#searchList").attr("action", baseURL + "exams/" + value);
            jQuery("#searchList").submit();
        });

        /**
        ** For Delete
        **/
        jQuery(document).on("click", ".deleteExam", function(){
            var Id = $(this).data("id"),
            hitURL = "/exams/delete",
            currentRow = $(this);
            var confirmation = confirm("Are you sure want to delete ?");

            if(confirmation)
            {
                jQuery.ajax({
                type : "Get",
                dataType : "json",
                url : hitURL,
                data : { id : Id }
                }).done(function(data){
                    console.log(data);
                    currentRow.parents('tr').remove();
                    if(data.status = true) { console.log("Exam successfully deleted"); }
                    else if(data.status = false) { console.log("Exam delete failed"); }
                    else { alert("Access denied..!"); }
                    location.reload();
                });
            }
        });

    });
</script>
@endsection
@section('script')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/af-2.3.7/b-2.1.1/cr-1.5.5/date-1.1.1/fc-4.0.1/fh-3.2.1/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/sp-1.4.0/sl-1.3.4/sr-1.0.1/datatables.min.js"></script>
 <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1,-2] /* 1st one, start by the right */
                }],
                "pageLength": 50,
            });
        });
    </script>
@endsection


