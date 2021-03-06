<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>College Project | fyp project</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>

        </ul>

        <!-- SEARCH FORM -->
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" @keyup="searchit" v-model="search" type="search"
                   placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" @click="searchit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="./img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">College Project</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                {{-- <div class="image">
                     <img src="{{asset('img/profile/'.Auth::user()->photo)
      }}" class="img-circle elevation-2" alt="User Image">
                 </div>--}}
                <div class="info">
                    <a href="#" class="d-block">
                        {{Auth::user()->name}}
                        <span class="right badge badge-success">{{Auth::user()->type}}</span>
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    @can('isStudent')
                        <li class="nav-item">
                            <router-link to="/dashboard"
                                         tag="a" class="nav-link" active-class="active" exact>
                                <i class="nav-icon fas fa-tachometer-alt white"></i>
                                <p>Dashboard</p>
                            </router-link>
                        </li>
                    @endcan


                    @can('isAdmin')

                        <li class="nav-item">
                            <router-link to="/users" tag="a" class="nav-link" active-class="active" exact>
                                <i class="fas fa-users nav-icon"></i>
                                <p>Students</p>
                            </router-link>
                        </li>


                    @endcan


                    @can('isAdmin')

                        <li class="nav-item">
                            <router-link :to="{name: 'message', params: { user: {{ json_encode(Auth::user()) }}} }"
                                         tag="a" class="nav-link" active-class="active" exact>
                                <i class="nav-icon fas fa-inbox white"></i>
                                <p>
                                    Inbox Message

                                </p>
                            </router-link>
                        </li>


                    @endcan



                    @can('isAdmin')
                        <li class="nav-item">
                            <router-link to="/routine" tag="a" class="nav-link" active-class="active" exact>
                                <i class="nav-icon fas fa-book orange"></i>
                                <p>
                                    Add Routine
                                </p>
                            </router-link>
                        </li>

                    @endcan
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                            <i class="nav-icon fa fa-power-off red"></i>
                            <p>
                                {{ __('Logout') }}
                            </p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <router-view></router-view>

                <vue-progress-bar></vue-progress-bar>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Main Footer -->
    <footer class="main-footer">

        <!-- Default to the left -->
        <strong>Copyright &copy; 2019-2020 <a href="https://www.google.com">Google.com</a>.</strong> All
        rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->

@auth
    <script>
        window.user = @json(auth()->user());


    </script>
@endauth

<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
