<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
    @vite('resources/js/app.js')
</head>

<body class="hold-transition sidebar-mini">
    <div id="app">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
    
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/logout">
                            <i class='fas fa-sign-out-alt'></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
    
            @include('admin.sidebar')
            
    
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
    
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
    
                        @include('admin.alert')
    
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- jquery validation -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ $title }}</h3>
                                    </div>
                                    <!-- /.card-header -->

                                    <!-- card-body -->
                                    <div class="card-body">
                                        @yield('content')
                                    </div>
    
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (left) -->
                            <!-- right column -->
                            <div class="col-md-6">
    
                            </div>
                            <!--/.col (right) -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
    
            @include('admin.footer')
            
        </div>
        <!-- ./wrapper -->
    </div>
    

    @include('admin.linkscript')

</body>

</html>
