@inject('BLang', 'Pterodactyl\Models\Billing\BLang')
<!-- HEADER -->
<header>
    <!-- MENU -->
    <link rel="stylesheet" href="/sorex/css/home.css">
    <link href="/sorex/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/sorex/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="/sorex/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="/sorex/css/style.min.css?v=1.0.3350" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">

    <link rel="stylesheet" href="/themes/carbon/css/login/interchanging.css" />
    <meta property="og:title" content="Sorexproject">
    <meta property="og:type" content="website">
    <meta property="og:url" content="/">
    <meta property="og:image"
        content="https://cdn.discordapp.com/attachments/760210364008366200/867840957991092254/serverslogos.png">
    <meta property="og:description" content="Manage your own plutonium servers with an easy-to-use Panel">
    </div>
</header>
<!-- MAIN CONTENT -->

<head>
    <title>Sorexproject - Register</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="robots" content="noindex">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/favicons/manifest.json">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#bc6e3c">
    <link rel="shortcut icon" href="/favicons/favicon.ico">
    <meta name="msapplication-config" content="/favicons/browserconfig.xml">
    <meta name="theme-color" content="#fff">
    <link rel="stylesheet" href="/modules/register/css/register.css?v=2.0">


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
        <canvas id="c"></canvas>
        <div class="container" class="login">
            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
                <div class="auth-box">
                    <div id="loginform">
                        <div class="logo">
                            <span class="db"><img src="/favicons/favicon.ico" style="height: 30%;width: 30%;"
                                    alt="logo" /></span>
                            <h5 class="font-medium m-b-20">Registration Form</h5>
                        </div>
                        @if(isset($post_res))
                        <?php
								$res = explode('ion.', $post_res);
								if(isset($res['1'])){
								$submitted = "error";
								$res = "Email address or username already exists.";
							
								} else {
								$submitted = "success";
								$res = "Your account has been registered, please check your email to login.";
								}
							?>


                        {{-- Form Submit HTML Response --}}

                        @isset($submitted)
                        @if($submitted == "success")
                        <div class="cyh04c-2 fNCLyU">
                            <div role="alert" class="sc-1yg9bob-0 sc-1yg9bob-1 brfJKd hEbrIt"
                                style="background: #14ac14; border: none;">
                                <span class="sc-1yg9bob-2 endIRo title"
                                    style="background: #0000002b; border: none;">Success</span>
                                <span class="sc-1yg9bob-3 knvREb">{{ $res }}</span>
                            </div>
                        </div> @endif
                        @if($submitted == "error")
                        <div class="cyh04c-2 fNCLyU">
                            <div role="alert" class="sc-1yg9bob-0 sc-1yg9bob-1 brfJKd hEbrIt">
                                <span class="sc-1yg9bob-2 endIRo title">Error</span>
                                <span class="sc-1yg9bob-3 knvREb">{{ $res }}</span>
                            </div>
                        </div>

                        @endisset @endif


                        @endif



                        <div class="row">
                            <div class="col-xs-12">
                                @if (count($errors) > 0)

                                @foreach ($errors->all() as $error)

                                <div class="cyh04c-2 fNCLyU">
                                    <div role="alert" class="sc-1yg9bob-0 sc-1yg9bob-1 brfJKd hEbrIt">
                                        <span class="sc-1yg9bob-2 endIRo title">Error</span>
                                        <span class="sc-1yg9bob-3 knvREb">{{ $error }}</span>
                                    </div>
                                </div>

                                @endforeach

                                @endif
                                @foreach (Alert::getMessages() as $type => $messages)
                                @foreach ($messages as $message)
                                <div class="alert alert-{{ $type }} alert-dismissable" role="alert">
                                    {!! $message !!}
                                </div>
                                @endforeach
                                @endforeach
                            </div>
                        </div>



                        <form action="{{ route('auth.register.url') }}" method="POST" class="qtrnpk-0 ctVkDO">

                            <div class="cyh04c-3 jbDTOK">

                                <div class="cyh04c-6 dFeVmo">

                                    <div>
                                        <label class="g780ms-0 dlUeSf">Email Address</label>
                                        <input name="registration_email" type="email" class="sc-19rce1w-0 hmhrLa"
                                            value="" placeholder="example@gmail.com" required>
                                    </div>

                                    <div>
                                        <label class="g780ms-0 dlUeSf qtrnpk-1 cZROhH">Username</label>
                                        <input name="registration_username" type="text" class="sc-19rce1w-0 hmhrLa"
                                            value="" placeholder="Username" required>
                                    </div>

                                    <div>
                                        <label class="g780ms-0 dlUeSf qtrnpk-1 cZROhH">First Name</label>
                                        <input name="registration_firstname" type="text" class="sc-19rce1w-0 hmhrLa"
                                            value="" placeholder="First Name" required>

                                        <div>
                                            <label class="g780ms-0 dlUeSf qtrnpk-1 cZROhH">Last Name</label>
                                            <input name="registration_lastname" type="text" class="sc-19rce1w-0 hmhrLa"
                                                value="" placeholder="Last Name" required>
                                        </div>
                                    </div>



                                    <div class="qtrnpk-2 eWHATQ">
                                        {!! csrf_field() !!}
                                        <button type="submit" class="sc-1qu1gou-0 gzrAQh">
                                            <span class="sc-1qu1gou-2">Register</span>
                                        </button>
                                    </div>
                                    <div class="qtrnpk-3 fCEexJ"><a class="qtrnpk-4 fFWwUW" href="/auth/login">Already
                                            Registered?</a></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <footer class="cyh04c-7 fFcOT">
                        All Rights Reserved by Sorexproject. Designed and Developed by
                        <a href="https://github.com/Williampilote">Williampilote</a>.
                    </footer>
                </div>
            </div>
        </div>
</body>

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
<script src="/sorex/js/home/adAccueil.js?v=2.3"></script>
<script src="/sorex/js/home/accueil.js?v=2.3"></script>
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