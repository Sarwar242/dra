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
                        <h3>{{ App\Models\Student::all()->count() }}</h3>
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
                        <h3>{{ App\Models\Batch::all()->count() }}</h3>
                        <p>Total Batches</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sitemap"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ App\Models\Course::all()->count() }}</h3>
                        <p>Total Courses</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ App\Models\Exam::all()->count() }}</h3>
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

                        <a href="{{ route('batches') }}" class="btn btn-app">
                  	    <i class="fa fa-sitemap"></i> List Batches
                        </a>

                        <a href="{{ route('batch.create') }}" class="btn btn-app">
                  	    <i class="fa fa-sitemap"></i> New Batch
                        </a>

                        <a href="{{ route('courses') }}" class="btn btn-app">
                  	    <i class="fa fa-book"></i> List Course
                        </a>

                        <a href="{{ route('course.create') }}" class="btn btn-app">
                  	    <i class="fa fa-book"></i> New Course
                        </a>

                        <a href="{{ route('departments') }}" class="btn btn-app">
                        <i class="fa fa-building-o"></i> Departments
                        </a>

                        {{-- <a href="{{ route('department.create') }}" class="btn btn-app">
                  	    <i class="fa fa-users"></i> List Teachers
                        </a>

                        <a href="/user/add" class="btn btn-app">
                  	    <i class="fa fa-user"></i> New Teacher
                        </a> --}}

                        <a href="{{ route('exams') }}" class="btn btn-app">
                        <i class="fa fa-pencil"></i> List Exams
                        </a>

                        <a href="{{ route('exam.create') }}" class="btn btn-app">
                        <i class="fa fa-pencil"></i> New Exam
                        </a>

                        <a href="{{ route('results') }}" class="btn btn-app">
                        <i class="fa fa-pencil-square-o"></i> Get Mark
                        </a>

                        <a href="{{ route('grades') }}" class="btn btn-app">
                        <i class="fa fa-signal"></i> List Grade
                        </a>

                        <a href="{{ route('grade.create') }}" class="btn btn-app">
                        <i class="fa fa-signal"></i> New Grade
                        </a>

                        <a href="{{ route('students') }}" class="btn btn-app">
                        <i class="fa fa-users"></i> List Students
                        </a>

                        <a href="{{ route('student.create') }}" class="btn btn-app">
                        <i class="fa fa-user"></i> New Student
                        </a>

                        <a href="{{ route('results') }}" class="btn btn-app">
                        <i class="fa fa-graduation-cap"></i> Result Quick
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
