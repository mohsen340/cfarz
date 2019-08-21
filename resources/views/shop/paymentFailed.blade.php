<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        .text-center1{
            text-align: center;
        }
    </style>


    <link href="{!! asset('plugins/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('plugins/bootstrap-rtl/dist/css/bootstrap-rtl.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('plugins/metisMenu/dist/metisMenu.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('plugins/simple-line-icons/css/simple-line-icons.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('plugins/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('plugins/switchery/dist/switchery.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('plugins/sweetalert2/dist/sweetalert2.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('plugins/paper-ripple/dist/paper-ripple.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('plugins/iCheck/skins/square/_all.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/colors.css') !!}" rel="stylesheet">



</head>
<body class="rtl">
<div class="mt-5 text-center ">
    <h2 class="m-auto alert alert-danger p-3 text-center1">{{$description}}</h2>
    <br>
    <br>
    <br>
    <a class="m-auto btn btn-sm btn-blue" href="intent://persiandevelopment.com#Intent;scheme=http;package=push.instagramfarsi.celler;end">بازگشت به برنامه</a>
    {{--<div class="mt-3">--}}
        {{--<a  href="{{route('user-cart')}}" class="m-auto btn btn-sm btn-blue">بازگشت به پنل کاربری</a>--}}
    {{--</div>--}}
</div>
</body>
</html>