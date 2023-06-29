<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Conquer | Admin Dashboard Template</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="MobileOptimized" content="320">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('conquer/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('conquer/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('conquer/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('conquer/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="{{ asset('conquer/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('conquer/plugins/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('conquer/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{ asset('conquer/css/style-conquer.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('conquer/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('conquer/css/style-responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('conquer/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('conquer/css/pages/tasks.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('conquer/css/themes/default.css') }}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ asset('conquer/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="page-header-fixed">
    <!-- BEGIN HEDER -->
    <div class="header navbar navbar-fixed-top">
        <!-- BEGIN TOP NAVIGATION BAR -->
        <div class="header-inner">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="/" class="navbar-brand text-danger font-weight-bold text-uppercase">
                    Fashion Brand
                </a>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <img src="{{ asset('conquer/img/menu-toggler.png') }}" alt="" />
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-close-others="true">
                        <img alt="" src="{{ asset('conquer/img/avatar3_small.jpg') }}" />
                        <span class="username username-hide-on-mobile">Nick </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="extra_profile.html"><i class="fa fa-user"></i> My Profile</a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="login.html"><i class="fa fa-key"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->
    <div class="clearfix">
    </div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: for circle icon style menu apply page-sidebar-menu-circle-icons class right after sidebar-toggler-wrapper -->
                <ul class="page-sidebar-menu">
                    <li class="sidebar-toggler-wrapper">
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <div class="sidebar-toggler">
                        </div>
                        <div class="clearfix">
                        </div>
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    </li>
                    <li class="start active ">
                        <a href="index.html">
                            <i class="icon-home"></i>
                            <span class="title">Dashboard</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="icon-puzzle"></i>
                            <span class="title">Page Layouts</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="layout_sidebar_fixed.html">
                                    <i class="icon-anchor"></i>
                                    Sidebar Fixed Page</a>
                            </li>
                            <li>
                                <a href="layout_sidebar_closed.html">
                                    <i class="icon-book-open"></i>
                                    Sidebar Closed Page</a>
                            </li>
                            <li>
                                <a href="layout_boxed_page.html">
                                    <i class="icon-pin"></i>
                                    Boxed Page</a>
                            </li>
                            <li>
                                <a href="layout_session_timeout.html">
                                    <i class="icon-vector"></i>
                                    <span class="badge badge-warning">new</span>Session Timeout</a>
                            </li>
                            <li>
                                <a href="layout_idle_timeout.html">
                                    <i class="icon-cursor"></i>
                                    User Idle Timeout</a>
                            </li>
                            <li>
                                <a href="layout_language_bar.html">
                                    <i class="icon-rocket"></i>
                                    Language Bar</a>
                            </li>
                            <li>
                                <a href="layout_disabled_menu.html">
                                    <i class="icon-link"></i>
                                    Disabled Menu Links</a>
                            </li>
                            <li>
                                <a href="layout_sidebar_reversed.html">
                                    <i class="icon-settings"></i>
                                    <span class="badge badge-success">new</span>Reversed Sidebar</a>
                            </li>
                            <li>
                                <a href="layout_blank_page.html">
                                    <i class="icon-paper-clip"></i>
                                    Blank Page</a>
                            </li>
                            <li>
                                <a href="layout_ajax.html">
                                    <i class="icon-bubble"></i>
                                    Content Loading via Ajax</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="icon-present"></i>
                            <span class="title">UI Features</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="ui_general.html">
                                    General</a>
                            </li>
                            <li>
                                <a href="ui_buttons.html">
                                    Buttons</a>
                            </li>
                            <li>
                                <a href="ui_icons.html">
                                    Icons</a>
                            </li>
                            <li>
                                <a href="ui_typography.html">
                                    Typography</a>
                            </li>
                            <li>
                                <a href="ui_modals.html">
                                    Modals</a>
                            </li>
                            <li>
                                <a href="ui_extended_modals.html">
                                    Extended Modals</a>
                            </li>
                            <li>
                                <a href="ui_tabs_accordions_navs.html">
                                    Tabs, Accordions & Navs</a>
                            </li>
                            <li>
                                <a href="ui_toastr.html">
                                    <span class="badge badge-warning">new</span>Toastr Notifications</a>
                            </li>
                            <li>
                                <a href="ui_datepaginator.html">
                                    <span class="badge badge-success">new</span>Date Paginator</a>
                            </li>
                            <li>
                                <a href="ui_tree.html">
                                    Tree View</a>
                            </li>
                            <li>
                                <a href="ui_nestable.html">
                                    Nestable List</a>
                            </li>
                            <li>
                                <a href="ui_ion_sliders.html">
                                    <span class="badge badge-important">new</span>Ion Range Sliders</a>
                            </li>
                            <li>
                                <a href="ui_jqueryui_sliders.html">
                                    jQuery UI Sliders</a>
                            </li>
                            <li>
                                <a href="ui_knob.html">
                                    Knob Circle Dials</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="footer">
        <div class="footer-inner">
            2013 &copy; Fashion Brand by Orang Sibuk.
        </div>
        <div class="footer-tools">
            <span class="go-top">
                <i class="fa fa-angle-up"></i>
            </span>
        </div>
    </div>
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ asset('conquer/plugins/jquery-1.11.0.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js')}} before bootstrap.min.js')}} to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="{{ asset('conquer/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('conquer/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('conquer/plugins/jqvmap/jqvmap/jquery.vmap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('conquer/plugins/jquery.peity.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/jquery.pulsate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/jquery-knob/js/jquery.knob.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/flot/jquery.flot.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/bootstrap-daterangepicker/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('conquer/plugins/gritter/js/jquery.gritter.js') }}" type="text/javascript"></script>
    <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js')}} for drag & drop support -->
    <script src="{{ asset('conquer/plugins/fullcalendar/fullcalendar/fullcalendar.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('conquer/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('conquer/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('conquer/scripts/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/scripts/index.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer/scripts/tasks.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function() {
            App.init(); // initlayout and core plugins
            Index.init();
            Index.initJQVMAP(); // init index page's custom scripts
            Index.initCalendar(); // init index page's custom scripts
            Index.initCharts(); // init index page's custom scripts
            Index.initChat();
            Index.initMiniCharts();
            Index.initPeityElements();
            Index.initKnowElements();
            Index.initDashboardDaterange();
            Tasks.initDashboardWidget();
        });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>