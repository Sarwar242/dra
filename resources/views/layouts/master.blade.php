<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>DRA- Departmental Result Archive</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap 3.3.4 -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="/sumoselect.min.css" rel="stylesheet" type="text/css" />
    <link href="/custom.css" rel="stylesheet" type="text/css" />

    @yield('css')

    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <!-- jQuery 2.1.4 -->
    <script src="/js/jQuery-2.1.4.min.js"></script>
    <script src="/js/jquery.sumoselect.min.js"></script>
    <script src="/js/common.js"></script>
    <script type="text/javascript">
        var baseURL = "http://127.0.0.1:8000/";
    </script>
  </head>
  <body class="skin-purple sidebar-mini">


    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="/home" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
            <img src="/dist/img/logo.png" style="max-width: 80%;"  alt="DRA"  >
          </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
            <img src="/dist/img/logo.png" style="max-width: 80%;"  alt="DRA"  >
          </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown tasks-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <i class="fa fa-history"></i>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">{{ \Carbon\Carbon::now() }} :<i class="fa fa-clock-o"></i>First Time Login</li>
                </ul>
              </li>


              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img style="width: 20px; height: 20px;" src="/dist/img/avatar.png" class="img-circle" alt="User Image" />
                  <span class="hidden-xs">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">

                    <img src="/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                        {{ auth()->user()->name }}
                      <small>Super Admin</small>
                    </p>

                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="">
                      <a style="width: 100%;margin-bottom: 10px;" href="/changeavatar" class="btn btn-default btn-flat"><i class="fa fa-user"></i> change_avatar</a>
                      <a style="width: 100%;margin-bottom: 10px;" href="/changepass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> change_password</a>
                    </div>
                    <div class="">
                      <a style="width: 100%;margin-bottom: 10px;" href="/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i>log_out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
          @include('layouts.sidemenu')
            @if(empty($front_end_result)) :
            <li class=" bg-green">
              <a href="/"  target="_blank" ><i class="fa fa-trophy"></i><span>Front end result</span></a>
            </li>
            @endif

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
        @yield('content')
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Departmental Result Archive</b>  | Version 1.0
        </div>
        <strong>Copyright &copy; DRA <a href="/">SARAH</a>.</strong> All rights reserved.
    </footer>

    @include('layouts.modal0')
    @include('layouts.modal1')

    <!-- jQuery UI 1.11.2 -->
    <!-- <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/dist/js/app.min.js" type="text/javascript"></script>
    <script src="/js/jquery.validate.js" type="text/javascript"></script>
    <script src="/js/validation.js" type="text/javascript"></script>
    <script type="text/javascript">
        var windowURL = `${location.protocol}//${location.host}/${location.pathname.split('/')[1]}`;
        pageURL = windowURL.substring(windowURL.lastIndexOf('/'), -1);
        console.log(windowURL);
        var x= $('a[href="'+windowURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
            x.parent().parent().parent().addClass('active');
    </script>


<script>
    $(document).on('change','#exam',function(){
       var exam = $("#exam").val();
       $("#course").html("");
       var option = "";
       //send an ajax req to servers
       $.get("/exam/get-courses/" +
       exam,
       function(data) {
         option = "<option selected disabled>Select one</option>";
           var d = JSON.parse(data);
           d.forEach(function(element) {
               console.log(element.id);
               option += "<option value='" + element.id + "'>" + element.name + "</option>";
           });
           $("#course").html(option);
       });
 });

 $(document).on('change','#batch',function(){
       var batch = $("#batch").val();
       $("#student").html("");
       var option = "";
       //send an ajax req to servers
       $.get("/exam/get-students/" +
       batch,
       function(data) {
         option = "<option selected disabled>Select one</option>";
           var d = JSON.parse(data);
           d.forEach(function(element) {
               console.log(element.id);
               option += "<option value='" + element.id + "'>" + element.name + "</option>";
           });
           $("#student").html(option);
       });
 });
 </script>
     @yield('script')
  </body>
</html>
