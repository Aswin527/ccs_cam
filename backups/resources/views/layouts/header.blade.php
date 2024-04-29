<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="5MJGP2biLBYzZ7sUhMubarzONLOgg0n7dhY4g1s6">
        <title>@yield('title') | </title>

        <link rel="stylesheet" href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendor/adminlte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        @yield('CSS')
        
    </head>
    <body class="sidebar-mini sidebar-collapse" data-scrollbar-theme="os-theme-dark" >
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand-md" style="background-color:#62929E;color:white">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" style="background-color:#62929E;color:white">
                            <i class="fas fa-bars"></i>
                            <span class="sr-only">Toggle navigation</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::User()->firstname }}+{{ Auth::User()->lastname }}&rounded=true" class="user-image img-circle elevation-2">
                            <span class="d-none d-md-inline" style="color:white">{{Auth::User()->firstname}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="background-color:#62929E">
                            <li class="user-header">
                                <img src="https://ui-avatars.com/api/?name={{ Auth::User()->firstname }}+{{ Auth::User()->lastname }}&rounded=true" class="img-circle elevation-2">
                                <p class="text monospace" style="color:white">{{Auth::User()->firstname}}</p>
                            </li>
                            <li class="user-footer">
                                <a class="btn btn-default btn-flat float-right btn-block sublog" href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-fw fa-power-off"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="{{ url('/lms/home') }}" class="brand-link">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::User()->firstname }}+{{ Auth::User()->lastname }}&rounded=true" class="brand-image img-circle elevation-3" style="opacity:.8">
                    <span class="brand-text font-weight-light ">
                        <b>{{Auth::User()->firstname}}</b>
                    </span>
                </a>

                @if(Auth::User()->firstname=='admin')
                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                            <li class="nav-header">MY PANEL</li>
                            <li class="nav-item has-treeview">
                                <a class="nav-link nav-item" href="#">
                                    <i class="fas fa-clipboard-list"></i>
                                    <p>Manage Categories<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/categories/add') }}">
                                            <i class="fas fa-plus"></i>
                                            <p>Add Category</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/categories/view') }}">
                                            <i class="fas fa-eye"></i>
                                            <p>View Category</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home/division/add') }}">
                                    <i class="fas fa-poll"></i> 
                                    <p>
                                        Manage Divisions
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a class="nav-link nav-item" href="#">
                                    <i class="fas fa-sitemap"></i>
                                    <p>Manage Products<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/products/add') }}">
                                            <i class="fas fa-plus"></i>
                                            <p>Add Product</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/products/view') }}">
                                            <i class="fas fa-eye"></i>
                                            <p>View Products</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a class="nav-link nav-item" href="#">
                                    <i class="fas fa-pager"></i>
                                    <p>Manage Pages<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/pages/add') }}">
                                            <i class="fas fa-plus"></i>
                                            <p>Add Page</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/pages/view') }}">
                                            <i class="fas fa-eye"></i>
                                            <p>View Pages</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a class="nav-link nav-item" href="#">
                                    <i class="fab fa-envira"></i>
                                    <p>Manage Gallery<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/gallery/add') }}">
                                            <i class="fas fa-plus"></i>
                                            <p>Add Image</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/gallery/view') }}">
                                            <i class="fas fa-eye"></i>
                                            <p>View Images</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                             <li class="nav-item has-treeview">
                                <a class="nav-link nav-item" href="#">
                                    <i class="fab fa-envira"></i>
                                    <p>Visual<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/visual/add') }}">
                                            <i class="fas fa-plus"></i>
                                            <p>Add Visual</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/visual/view') }}">
                                            <i class="fas fa-eye"></i>
                                            <p>View Visual</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a class="nav-link nav-item" href="#">
                                    <i class="fas fa-blog"></i>
                                    <p>Manage Blogs<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/blogs/add') }}">
                                            <i class="fas fa-plus"></i>
                                            <p>Add Blog</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/blogs/view') }}">
                                            <i class="fas fa-eye"></i>
                                            <p>View Blogs</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a class="nav-link nav-item" href="#">
                                    <i class="fas fa-users"></i>
                                    <p>Manage Users<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/users/add') }}">
                                            <i class="fas fa-plus"></i>
                                            <p>Add User</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/users/view') }}">
                                            <i class="fas fa-eye"></i>
                                            <p>View Users</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home/settings') }}">
                                    <i class="fas fa-cog"></i> 
                                    <p>Settings</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home/enquiries') }}">
                                    <i class="fas fa-ticket-alt"></i> 
                                    <p>Enquiries</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home/profile') }}">
                                    <i class="fas fa-user"></i> 
                                    <p>My Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">
                                    <i class="fas fa-undo-alt"></i> 
                                    <p>Back to Website</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fas fa-user"></i> 
                                    <p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                @else
                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                            <li class="nav-header">MY PANEL</li>
                            <li class="nav-item has-treeview">
                                <a class="nav-link nav-item" href="#">
                                    <i class="fas fa-clipboard-list"></i>
                                    <p>Manage Categories<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/categories/add') }}">
                                            <i class="fas fa-plus"></i>
                                            <p>Add Category</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/categories/view') }}">
                                            <i class="fas fa-eye"></i>
                                            <p>View Category</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                           
                            <li class="nav-item has-treeview">
                                <a class="nav-link nav-item" href="#">
                                    <i class="fas fa-sitemap"></i>
                                    <p>Manage Products<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/products/add') }}">
                                            <i class="fas fa-plus"></i>
                                            <p>Add Product</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home/products/view') }}">
                                            <i class="fas fa-eye"></i>
                                            <p>View Products</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                           
                            
                            
                            
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home/profile') }}">
                                    <i class="fas fa-user"></i> 
                                    <p>My Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">
                                    <i class="fas fa-undo-alt"></i> 
                                    <p>Back to Website</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fas fa-user"></i> 
                                    <p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            @endif




            </aside>
            <div class="content-wrapper">
                <br>
                @yield('content')
                @yield('modal')
            </div>
        </div>
        <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
        @yield('JS')
        <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    </body>
</html>