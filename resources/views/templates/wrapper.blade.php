<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
<title>{{ config('app.name', 'Pterodactyl') }}</title>

@section('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/favicons/manifest.json">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#bc6e3c">
    <link rel="shortcut icon" href="/favicons/favicon.ico">
    <meta name="msapplication-config" content="/favicons/browserconfig.xml">
    <meta name="theme-color" content="#0e4688">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="/sorex/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/sorex/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="/sorex/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="/sorex/css/style.min.css?v=1.0.3341" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@show

        @section('user-data')
            @if(!is_null(Auth::user()))
                <script>
                    window.PterodactylUser = {!! json_encode(Auth::user()->toVueObject()) !!};
                </script>
            @endif
            @if(!empty($siteConfiguration))
                <script>
                    window.SiteConfiguration = {!! json_encode($siteConfiguration) !!};
                </script>
            @endif
        @show
        @yield('assets')

        @include('layouts.scripts')
        <style>
            @import url('//fonts.googleapis.com/css?family=Rubik:300,400,500&display=swap');
            @import url('//fonts.googleapis.com/css?family=IBM+Plex+Mono|IBM+Plex+Sans:500&display=swap');
            .ebtnLL {display:none !important;}
            .cWFcHc {display:none !important;}
            .sc-1topkxf-2:hover { text-decoration: none !important; }
            code {color:#cad1d8 !important;}
            .cgXlJi {display:none !important;}
	        p {color:#cad1d8 !important}
        </style>
    <script type="text/javascript">
    var intervalId = setInterval(function() {
        if (window.location.href.indexOf("server") > -1) {
          document.getElementById("server-manage").style.visibility = "visible";
        } else {
          document.getElementById("server-manage").style.visibility = "hidden";
        }
    }, 100);
</script>
</head>
<body style="background-color: #2c3b4c;">
@if(Auth::user() !== null)
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="{{ url('/') }}" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="/favicons/favicon-32x32.png" alt="homepage" class="dark-logo" />
                                
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                            {{ config('app.name', 'Pterodactyl') }} 
                            </span>
                        </a>
                        <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                            <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" >
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    
                    <ul class="navbar-nav mr-auto" >
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                            
                    <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ "https://www.gravatar.com/avatar/" . md5( strtolower( trim( Auth::user()->email ) ) ) }}" alt="user" class="rounded-circle" width="40">
                                <span class="m-l-5 font-medium d-none d-sm-inline-block">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="{{ "https://www.gravatar.com/avatar/" . md5( strtolower( trim( Auth::user()->email ) ) ) }}" alt="user" class="rounded-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">{{ Auth::user()->name }}</h4>
                                        <p class=" m-b-0">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <div class="text-center mx-auto" style="width: auto;left: 0;">
                                    <h1>
                                    Welcome back, {{ Auth::user()->username }}!
                                    </h1>
                                    <p>At the moment you have {{ count(Auth::user()->servers) }} server(s) in use.</p>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div class="profile-dis scrollable">
                                    <a class="dropdown-item" href="{{ url('/account') }}">
                                        <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                    <a class="dropdown-item" href="{{ url('/account/api') }}">
                                        <i class="ti-user m-r-5 m-l-5"></i> My Api</a>
                                    <a class="dropdown-item" href="{{ url('/billing/balance') }}">
                                        <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                    <div class="dropdown-divider"></div>
                                    @if(Auth::user()->root_admin)
                                    <a class="dropdown-item" href="{{ url('/admin') }}">
                                        <i class="ti-settings m-r-5 m-l-5"></i> Admin Setting</a>
                                    <div class="dropdown-divider"></div>
                                    @else
                                    @endif
                                    <form action="{{ url('/auth/logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="fa fa-power-off m-r-5 m-l-5"></i>
                                        Logout
                                    </button>
                                    </form>
                                    <div class="dropdown-divider"></div>
                                </div>
                                <div class="p-l-30 p-10">
                                    <a href="https://discord.gg/qusTrHCXqV"" class="btn btn-sm btn-secondary btn-rounded">Discord</a>
                                </div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Personal</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Account </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ url('/account') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Account </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('/account/api') }}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Account Api </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-bookmark"></i>
                                <span class="hide-menu">Ticket </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="ticket-list.html" class="sidebar-link">
                                        <i class="mdi mdi-book-multiple"></i>
                                        <span class="hide-menu"> Ticket List </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="ticket-detail.html" class="sidebar-link">
                                        <i class="mdi mdi-book-plus"></i>
                                        <span class="hide-menu"> Ticket Detail </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-shopping"></i>
                                <span class="hide-menu">Server Billing </span>
                                <span class="badge badge-pill badge-info ml-auto m-r-15">1</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ url('/billing/plutonium/plans') }}" class="sidebar-link">
                                        <i class="mdi mdi-shopping"></i>
                                        <span class="hide-menu"> Shop </span>
                                        <span class="badge badge-pill badge-info ml-auto m-r-15">1</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('/billing/cart') }}" class="sidebar-link">
                                        <i class="mdi mdi-cart"></i>
                                        <span class="hide-menu"> Cart </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('/billing/balance') }}" class="sidebar-link">
                                        <i class="mdi mdi-bank"></i>
                                        <span class="hide-menu"> Balance </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('/billing/invoices') }}" class="sidebar-link">
                                        <i class="mdi mdi-file-document"></i>
                                        <span class="hide-menu"> Invoices </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <div id="server-manage" style="visibility:hidden;">
                            <li class="nav-small-cap">
                                <i class="mdi mdi-dots-horizontal"></i>
                                <span class="hide-menu">Server Management</span>
                            </li>
                            <li class="sidebar-item">
                                <a href="console" class="sidebar-link">
                                    <i class="mdi mdi-console"></i>
                                    <span class="hide-menu"> Console </span>
                                </a>
                            </li>
                            <li class="sidebar-item ">
                                <a href="files" class="sidebar-link">
                                    <i class="mdi mdi-file"></i>
                                    <span class="hide-menu"> files </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="databases" class="sidebar-link">
                                    <i class="mdi mdi-database"></i>
                                    <span class="hide-menu"> Databases </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="databases" class="sidebar-link">
                                    <i class="mdi mdi-calendar"></i>
                                    <span class="hide-menu"> Schedules </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="users" class="sidebar-link">
                                    <i class="mdi mdi-account-plus"></i>
                                    <span class="hide-menu"> Users </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="backups" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu"> Backups </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="network" class="sidebar-link">
                                    <i class="mdi mdi-ethernet"></i>
                                    <span class="hide-menu"> Network </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="logs" class="sidebar-link">
                                    <i class="mdi mdi-history"></i>
                                    <span class="hide-menu"> Logs </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="startup" class="sidebar-link">
                                    <i class="mdi mdi-play-circle-outline"></i>
                                    <span class="hide-menu"> Startup </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="settings" class="sidebar-link">
                                    <i class="mdi mdi-settings"></i>
                                    <span class="hide-menu"> Settings </span>
                                </a>
                            </li>
                        </div>
        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb" >
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div >
                    @section('content')
                        @yield('above-container')
                        @yield('container')
                        @yield('below-container')
                    @show
            </div>
            </div>
            
            <footer class="footer text-center">
                All Rights Reserved by Sorexproject. Designed and Developed by
                <a href="https://github.com/Williampilote">Williampilote</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    <aside class="customizer">
        <a href="javascript:void(0)" class="service-panel-toggle">
            <i class="fa fa-spin fa-cog"></i>
        </a>
        <div class="customizer-body">
            <ul class="nav customizer-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                        <i class="mdi mdi-wrench font-20"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#chat" role="tab" aria-controls="chat" aria-selected="false">
                        <i class="mdi mdi-message-reply font-20"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                        <i class="mdi mdi-star-circle font-20"></i>
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- Tab 1 -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="p-15 border-bottom">
                        <!-- Sidebar -->
                        <h5 class="font-medium m-b-10 m-t-10">Layout Settings</h5>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input sidebartoggler" name="collapssidebar" id="collapssidebar">
                            <label class="custom-control-label" for="collapssidebar">Collapse Sidebar</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="sidebar-position" id="sidebar-position">
                            <label class="custom-control-label" for="sidebar-position">Fixed Sidebar</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="header-position" id="header-position">
                            <label class="custom-control-label" for="header-position">Fixed Header</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="boxed-layout" id="boxed-layout">
                            <label class="custom-control-label" for="boxed-layout">Boxed Layout</label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Logo Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin1"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin2"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin3"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin4"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin5"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin6"></a>
                            </li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Navbar BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Navbar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin1"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin2"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin3"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin4"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin5"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin6"></a>
                            </li>
                        </ul>
                        <!-- Navbar BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Sidebar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin1"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin2"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin3"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin4"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin5"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin6"></a>
                            </li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                </div>
                <!-- End Tab 1 -->
                <!-- Tab 2 -->
                <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <ul class="mailbox list-style-none m-t-20">
                        <li>
                            
                            <div class="p-15 ">
                            <h5 class="font-medium m-b-10 m-t-10">Unavailable</h5>
                            </div>
                            <div class="message-center chat-scroll">
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_2' data-user-id='2'>
                                    <span class="user-img">
                                        <img src="{{ "https://www.gravatar.com/avatar/" . md5( strtolower( trim( Auth::user()->email ) ) ) }}" alt="user" class="rounded-circle">
                                        <span class="profile-status busy pull-right"></span>
                                    </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">{{ Auth::user()->name }}</h5>
                                        <span class="mail-desc">I've sung a song! See you at</span>
                                        <span class="time">9:10 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- End Tab 2 -->
                <!-- Tab 3 -->
                <div class="tab-pane fade p-15" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <h6 class="m-t-20 m-b-20">Activity Timeline</h6>
                    <h5 class="font-medium m-b-10 m-t-10">Unavailable</h5>
                    <div class="steamline">
                        <div class="sl-item">
                            <div class="sl-left">
                                <img class="rounded-circle" alt="user" src="{{ "https://www.gravatar.com/avatar/" . md5( strtolower( trim( Auth::user()->email ) ) ) }}"> </div>
                            <div class="sl-right">
                                <div class="font-medium">{{ Auth::user()->name }}
                                    <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab 3 -->
            </div>
        </div>
    </aside>
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/sorex/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/sorex/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/sorex/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="/sorex/js/app.min.js"></script>
    <script src="/sorex/js/app.init.dark.js"></script>
    <script src="/sorex/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/sorex/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <!-- <script src="//assets/extra-libs/sparkline/sparkline.js"></script> -->
    <!--Wave Effects -->
    <script src="/sorex/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/sorex/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/sorex/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="/sorex/libs/chartist/dist/chartist.min.js"></script>
    <script src="/sorex/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="/sorex/extra-libs/c3/d3.min.js"></script>
    <script src="/sorex/extra-libs/c3/c3.min.js"></script>
    <script src="/sorex/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/sorex/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script> 
    <script src="/sorex/js/pages/dashboards/dashboard1.js"></script>
    
</body>
@else
<head>


    <link rel="stylesheet" href="/sorex/css/style.css">
    <link rel="stylesheet" href="/sorex/css/home.css">

    <link rel="shortcut icon" href="/favicons/favicon.ico">
    <link href="/sorex/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/sorex/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="/sorex/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="/sorex/css/style.min.css?v=1.0.3342" rel="stylesheet">

</head>

<body ng-app="messengerApp">
<div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="container" class="login">
        <footer class="footer text-center">
                All Rights Reserved by Sorexproject. Designed and Developed by
                <a href="https://github.com/Williampilote">Williampilote</a>.
    </footer>
        <canvas id="c"></canvas>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" >
                <div class="auth-box">
                    <div id="loginform">
                        <div class="logo">
                            <span class="db"><img src="/favicons/favicon.ico" style="height: 30%;width: 30%;" alt="logo" /></span>
                            <h5 class="font-medium m-b-20">Login to Continue</h5>
                        </div>
                        @section('content')
                            @yield('above-container')
                            @yield('container')
                            @yield('below-container')
                        @show
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="/sorex/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/sorex/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/sorex/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AngularJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular-animate.min.js"></script>
    <script src="/sorex/js/home/adAccueil.js"></script>
    <script src="/sorex/js/home/accueil.js?v=2.2"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>

    
</body>
@endif
</body>
@section('scripts')
      {!! $asset->js('main.js') !!}
  @show
</html>