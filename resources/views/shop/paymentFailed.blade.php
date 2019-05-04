<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        .text-center1{
            text-align: center;
        }
    </style>
</head>
<body class="rtl">
<div class="mt-5 text-center ">
    <h2 class="m-auto alert alert-danger p-3 text-center1">{{$description}}</h2>
    {{--<div class="mt-3">--}}
        {{--<a  href="{{route('user-cart')}}" class="m-auto btn btn-sm btn-blue">بازگشت به پنل کاربری</a>--}}
    {{--</div>--}}
</div>
</body>
</html>