<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/minia/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Mar 2024 04:57:27 GMT -->
<head>

        <meta charset="utf-8" />
        <title>Dashboard | CCS-CAM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="admin_assets/images/favicon.ico">

        <!-- plugin css -->
        <link href="/admin_assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Css -->

        <!-- preloader css -->
        <link rel="stylesheet" href="/admin_assets/css/preloader.min.css" type="text/css" />

        <link href="/admin_assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        
        <!-- Icons Css -->
        <link href="/admin_assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/admin_assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="/admin_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin_assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="/admin_assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
      @yield('css')
    </head>

    <body>

    <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="/assets/images/ccs-small-logo.jpg" alt="" height="24" width="24" >
                                </span>
                                <span class="logo-lg">
                                    <img src="/assets/images/ccs-small-logo.jpg" alt="" height="24" width="24"> <span class="logo-txt">CCS</span>
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="/assets/images/ccs-small-logo.jpg" alt="" height="24" width="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="/assets/images/ccs-small-logo.jpg" alt="" height="24" width="24"> <span class="logo-txt">CCS</span>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="search" class="icon-lg"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
        
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">

                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        

                        <div class="dropdown d-none d-sm-inline-block">
                            <button type="button" class="btn header-item" id="mode-setting-btn">set
                                <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                                <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                            </button>
                        </div>

                        

                        

                        

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item bg-light-subtle border-start border-end" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(Auth::user()->photo)
                                <img class="rounded-circle header-profile-user" src="/images/{{Auth::user()->photo}}"
                                    alt="Header Avatar">
                                @else
                                <img class="rounded-circle header-profile-user" src="/admin_assets/images/users/avatar-1.jpg"
                                    alt="Header Avatar">
                                @endif
                                
                                <span class="d-none d-xl-inline-block ms-1 fw-medium">CCS</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                
                                <a class="dropdown-item" href="/user/logout"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" data-key="t-menu">Menu</li>

                            <li>
                                <a href="/lms/home">
                                    <i data-feather="home"></i>
                                    <span data-key="t-dashboard">Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="grid"></i>
                                    <span data-key="t-apps">Membership Master</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="/home/add/member">
                                            <span data-key="t-calendar">Add Member</span>
                                        </a>
                                    </li>
        
                                    <li>
                                        <a href="/home/view/member">
                                            <span data-key="t-chat">View Member</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/home/organization/position">
                                            <span data-key="t-alerts"> Position in Organization</span>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="/home/organization/cateory/position">
                                            <span data-key="t-alertss">Position in CCS</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/home/education/qualification">
                                            <span data-key="t-alertss">Education Qualification</span>
                                        </a>
                                    </li>
                                    
        
                                   
                                    
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="users"></i>
                                    <span data-key="t-authentication">Organization Master</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/home/organization" data-key="t-login">Add Organization</a></li>
                                    <li><a href="/home/organization/view" data-key="t-register">View Organization</a></li>
                                    <li><a href="/home/ocateory/position" data-key="t-register">Organization Category</a></li>
                                    
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="file-text"></i>
                                    <span data-key="t-pages">Payments</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/home/user/all/payments" data-key="t-starter-page">All Payments</a></li>
                                    <li><a href="/home/payment/category" data-key="t-maintenance">Payment Category</a></li>
                                    <li><a href="/home/currency/category" data-key="t-maintenance">Currency Exchange</a></li>
                                    <li><a href="/home/bank/category" data-key="t-maintenance">Admin bank</a></li>
                                    <li><a href="/home/voucher" data-key="t-maintenance">Voucher</a></li>
                                     <li><a href="/home/receipt" data-key="t-maintenance">Receipt</a></li>
                                     <li><a href="/home/donation/requests" data-key="t-maintenance">Donation Request</a></li>
                                   
                                </ul>
                            </li>


                           

                            <li class="menu-title mt-2" data-key="t-components">Website Editor</li>
                              <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="users"></i>
                                    <span data-key="t-authentication">Home</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/home/slider" data-key="t-login">Slider</a></li>
                                    <!--<li><a href="/home/Aboutus" data-key="t-register">Aboutus</a></li>-->
                                    <!--<li><a href="/home/green" data-key="t-register">Green</a></li>-->
                                    <li><a href="/home/testimonials" data-key="t-recover-password">Testimonials</a></li>
                                   
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="users"></i>
                                    <span data-key="t-authentication">About</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/home/settings" data-key="t-login">About us</a></li>
                                    <!--<li><a href="/home/Aboutus" data-key="t-register">Aboutus</a></li>-->
                                    <!--<li><a href="/home/green" data-key="t-register">Green</a></li>-->
                                    <li><a href="/home/preseident/message" data-key="t-recover-password">President Message</a></li>
                                   
                                </ul>
                            </li>
                            
                            <li>
                                <a href="/home/gallery/add">
                                    <i class="bx bx-image-add"></i>
                                   
                                    <span data-key="t-forms">Gallery</span>
                                </a>
                               
                            </li>
                            <li>
                                <a href="/admin/our/partner">
                                    <i data-feather="briefcase"></i>
                                    <span data-key="t-components">Our Partner</span>
                                </a>
                                
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="gift"></i>
                                    <span data-key="t-ui-elements">Publications</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/home/categories/add" data-key="t-lightbox">Add Publications</a></li>
                                    <li><a href="/home/categories/view" data-key="t-range-slider">View Publications</a></li>
                                   
                                </ul>
                            </li>

                            <li>
                                <a href="#" class="has-arrow">
                                    <i data-feather="box"></i>
                                   
                                    <span data-key="t-forms">Events</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/home/create/events" data-key="t-form-elements">Add Events</a></li>
                                    <li><a href="/home/events" data-key="t-form-validation">View Events</a></li>
                                   
                                </ul>
                            </li>
                             <li>  

                                <a href="/home/video">
                                     <i class=" bx bxs-videos"></i>
                                    <span data-key="t-dashboard">Video</span>
                                </a>
                            </li>
                            
                            <li>  

                                <a href="/user/logout">
                                     <i class="bx bx-log-out"></i>
                                    <span data-key="t-dashboard">Logout</span>
                                </a>
                            </li>

                          

                           

                        </ul>

                        
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        @yield('content')
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © CCS.
                            </div>
                           
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        
        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center p-3">

                    <h5 class="m-0 me-2">Theme Customizer</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="m-0" />

                <div class="p-4">
                    <h6 class="mb-3">Layout</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-vertical" value="vertical">
                        <label class="form-check-label" for="layout-vertical">Vertical</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-horizontal" value="horizontal">
                        <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-light" value="light">
                        <label class="form-check-label" for="layout-mode-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-dark" value="dark">
                        <label class="form-check-label" for="layout-mode-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                        <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                        <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                        <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                        <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                        <label class="form-check-label" for="topbar-color-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                        <label class="form-check-label" for="topbar-color-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                        <label class="form-check-label" for="sidebar-size-default">Default</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                        <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                        <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                        <label class="form-check-label" for="sidebar-color-light">Light</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                        <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                        <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-ltr" value="ltr">
                        <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-rtl" value="rtl">
                        <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                    </div>

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="/admin_assets/libs/jquery/jquery.min.js"></script>
        <script src="/admin_assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/admin_assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/admin_assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/admin_assets/libs/node-waves/waves.min.js"></script>
        <script src="/admin_assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="/admin_assets/libs/pace-js/pace.min.js"></script>

       

        <!-- Plugins js-->
        <script src="/admin_assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="/admin_assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
        <!-- dashboard init -->
        

        <script src="/admin_assets/js/app.js"></script>
        
         <script src="/admin_assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="/admin_assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="/admin_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="/admin_assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="/admin_assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="/admin_assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="/admin_assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="/admin_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/admin_assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
       
        <!-- Datatable init js -->
        <script src="/admin_assets/js/pages/datatables.init.js"></script> 

    </body>
    
    @yield('js')



</html>