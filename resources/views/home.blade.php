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
                            <h3 class="box-title"> <i class="fa fa-university"></i> Quick Icons</h3>
                        </div>

                        <a href="/classes/classlist" class="btn btn-app">
                  	    <i class="fa fa-sitemap"></i> List Batches
                        </a>

                        <a href="/classes/add" class="btn btn-app">
                  	    <i class="fa fa-sitemap"></i> New Batch
                        </a>

                        <a href="/subjects" class="btn btn-app">
                  	    <i class="fa fa-book"></i> List Course
                        </a>

                        <a href="/subjects/add" class="btn btn-app">
                  	    <i class="fa fa-book"></i> New Course
                        </a>

                        <a href="/departments/departmentslist" class="btn btn-app">
                        <i class="fa fa-building-o"></i> Departments
                        </a>

                        <a href="/user/userlist" class="btn btn-app">
                  	    <i class="fa fa-users"></i> List Teachers
                        </a>

                        <a href="/user/add" class="btn btn-app">
                  	    <i class="fa fa-user"></i> New Teacher
                        </a>

                        <a href="/exam" class="btn btn-app">
                        <i class="fa fa-pencil"></i> List Exams
                        </a>

                        <a href="/exam/add" class="btn btn-app">
                        <i class="fa fa-pencil"></i> New Exam
                        </a>

                        <a href="/mark" class="btn btn-app">
                        <i class="fa fa-pencil-square-o"></i> Get Mark
                        </a>

                        <a href="/grade" class="btn btn-app">
                        <i class="fa fa-signal"></i> List Grade
                        </a>

                        <a href="/grade/add" class="btn btn-app">
                        <i class="fa fa-signal"></i> New Grade
                        </a>

                        <a href="/students/studentlist" class="btn btn-app">
                        <i class="fa fa-users"></i> List Students
                        </a>

                        <a href="/students/add" class="btn btn-app">
                        <i class="fa fa-user"></i> New Student
                        </a>

                        <a href="/result" class="btn btn-app">
                        <i class="fa fa-graduation-cap"></i> Result Quick
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
