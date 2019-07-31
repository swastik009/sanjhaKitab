<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>@yield('title')</title>


    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800">
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/bootstrap.min.css')}}">
    <!-- CSS Global Icons -->
    <link rel="stylesheet" href="{{asset('assets/vendor/icon-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/icon-line/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/icon-etlinefont/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/icon-line-pro/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/icon-hs/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/dzsparallaxer/dzsparallaxer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/dzsparallaxer/dzsscroller/scroller.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/dzsparallaxer/advancedscroller/plugin.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/fancybox/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/slick-carousel/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/hs-megamenu/src/hs.megamenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/hs-megamenu/src/hs.megamenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- CSS Implementing Plugins -->
    <link  rel="stylesheet" href="{{asset('assets/vendor/animate.css')}}">
    <link  rel="stylesheet" href="{{asset('assets/vendor/custombox/custombox.min.css')}}">


    <!-- CSS Unify -->
    <link rel="stylesheet" href="{{asset('assets/css/sweetalert2.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontAwesome.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/unify-core.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/unify-components.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/unify-globals.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.e-commerce.css')}}">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

    @yield('styles')
    <style>
        html,
        body {
            height: 100%;
        }

        #page-content {
            flex: 1 0 auto;
        }

        #sticky-footer {
            flex-shrink: none;
        }

        /* Other Classes for Page Styling */

        body {
            background: whitesmoke;

        }


    </style>
</head>