<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
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
    <div class="row">
        <div class="col-sm-12 col-md-6 text-center m-auto ">
            <div class="alert alert-danger p-1 p-sm-2 mt-4">
                <p>
                     لطفا کد خرید و شماره پیگیری پرداخت را برای پیگیری های بعدی یادداشت کنید.
                </p>
            </div>
        </div>
    </div>
    {{--<div class="text-center mt-2">--}}
        {{--<a href="{{route('user-cart')}}" class="m-auto btn btn-sm btn-blue">بازگشت به پنل کاربری</a>--}}
    {{--</div>--}}
</div>
</body>
</html>