<!DOCTYPE html>
<html lang="en">
<head>
    <title>Travel Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('andrea/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('andrea/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('andrea/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('andrea/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('andrea/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('andrea/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('andrea/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('andrea/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('andrea/css/jquery.timepicker.css')}}">

    <link rel="stylesheet" href="{{asset('andrea/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('andrea/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('andrea/css/style.css')}}">
</head>
<body>

<div id="colorlib-page">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
    @include('frontend.main.left')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex">
                    @yield('content')
                    @include('frontend.main.right')
                </div>
            </div>
        </section>
    </div><!-- END COLORLIB-MAIN -->
</div><!-- END COLORLIB-PAGE -->

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{asset('andrea/js/jquery.min.js')}}"></script>
<script src="{{asset('andrea/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('andrea/js/popper.min.js')}}"></script>
<script src="{{asset('andrea/js/bootstrap.min.js')}}"></script>
<script src="{{asset('andrea/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('andrea/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('andrea/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('andrea/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('andrea/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('andrea/js/aos.js')}}"></script>
<script src="{{asset('andrea/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('andrea/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('andrea/js/google-map.js')}}"></script>
<script src="{{asset('andrea/js/main.js')}}"></script>

</body>
</html>
