<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>





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

    <style>
        .text-center1{
            text-align: center;
            margin: auto;
        }
    </style>



</head>
<body class="rtl">
<div class="mt-5 text-center1">
    <table class="m-auto response-table bg-light text-center1" border="1">
        <thead class="">
        <tr>
            <th class="py-3 text-center " scope="col" colspan="2">{{$description}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th class="p-2 ltr" scope="row">مبلغ (تومان)</th>
            <td class="text-center">{{number_format($price)}}</td>
        </tr>

        <tr>
            <th class="p-2" scope="row"> شماره پیگیری پرداخت</th>
            <td class="text-center">{{$RefID}}</td>
        </tr>
        <tr>
            <th class="p-2" scope="row"> کد خرید</th>
            <td class="text-center">{{$buy_code}}</td>
        </tr>
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <div class="row text-center1">
        <div class="">
            <div class="alert alert-success p-1 p-sm-2 mt-4">
                <p>
                    لطفا کد خرید و شماره پیگیری پرداخت را برای پیگیری های بعدی یادداشت کنید.
                </p>
            </div>
            <br>
            <br>
            <br>
            <a class="m-auto btn btn-sm btn-blue" href="intent://persiandevelopment.com#Intent;scheme=http;package=push.instagramfarsi.celler;end">بازگشت به برنامه</a>


        </div>
    </div>
    {{--<div class="text-center mt-2">--}}
    {{--<a href="{{route('user-cart')}}" class="m-auto btn btn-sm btn-blue">بازگشت به پنل کاربری</a>--}}
    {{--</div>--}}
</div>
</body>
</html>