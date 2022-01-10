@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
             <div class="col-md-12">
             
            </div>
        </div>

        <h1>
            <i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard
            <small>Control Panel</small>
        </h1>

    </section>

    <section class="content">


        <!-- Get Panel -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>0</h3>
                        <p>Total Students</p>
                    </div>
                    <div class="icon">
                        <i class="ion-ios-people"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>0</h3>
                        <p>Total Class</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sitemap"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>0</h3>
                        <p>Total Subjects</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>0</h3>
                        <p>Total Exam</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-pencil"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Get Quick Icon Link -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header">
                            <h3 class="box-title"> <i class="fa fa-university"></i> Quick icon</h3>
                        </div>

                        <a href="/classes/classlist" class="btn btn-app">
                  	    <i class="fa fa-sitemap"></i> list_class
                        </a>

                        <a href="/classes/add" class="btn btn-app">
                  	    <i class="fa fa-sitemap"></i> new_class
                        </a>

                        <a href="/subjects" class="btn btn-app">
                  	    <i class="fa fa-book"></i> list_subject
                        </a>

                        <a href="/subjects/add" class="btn btn-app">
                  	    <i class="fa fa-book"></i> new_subject
                        </a>

                        <a href="/departments/departmentslist" class="btn btn-app">
                        <i class="fa fa-building-o"></i> Departments
                        </a>

                        <a href="/user/userlist" class="btn btn-app">
                  	    <i class="fa fa-users"></i> list_teacher
                        </a>

                        <a href="/user/add" class="btn btn-app">
                  	    <i class="fa fa-user"></i> new_teacher
                        </a>

                        <a href="/configuration"  class="btn btn-app">
                  	    <i class="fa fa-cog"></i> configuration
                        </a>

                        <a href="/languages" class="btn btn-app">
                  	    <i class="fa fa-support"></i> manage_language
                        </a>

                        <a href="/backup" class="btn btn-app">
                        <i class="fa fa-archive"></i> backup_restore
                        </a>

                        <a href="/exam" class="btn btn-app">
                        <i class="fa fa-pencil"></i> list_exam
                        </a>

                        <a href="/exam/add" class="btn btn-app">
                        <i class="fa fa-pencil"></i> new_exam
                        </a>

                        <a href="/mark" class="btn btn-app">
                        <i class="fa fa-pencil-square-o"></i> get_mark
                        </a>

                        <a href="/grade" class="btn btn-app">
                        <i class="fa fa-signal"></i> list_grade
                        </a>

                        <a href="/grade/add" class="btn btn-app">
                        <i class="fa fa-signal"></i> new_grade
                        </a>

                        <a href="/students/studentlist" class="btn btn-app">
                        <i class="fa fa-users"></i> list_student
                        </a>

                        <a href="/students/add" class="btn btn-app">
                        <i class="fa fa-user"></i> new_student
                        </a>

                        <a href="/result" class="btn btn-app">
                        <i class="fa fa-graduation-cap"></i> result_quick
                        </a>

                        <a href="/certificate" class="btn btn-app">
                        <i class="fa fa-certificate"></i> certificate_quick
                        </a>

                        <a href="/fields/fieldslist" class="btn btn-app">
                        <i class="fa fa-cog"></i> Field Builder
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
