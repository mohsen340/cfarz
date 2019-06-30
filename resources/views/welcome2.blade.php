<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فالور بگیر|مرجع فروش فالور</title>
    <link rel="stylesheet" href="{{asset('welcome2/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('welcome2/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('welcome2/css/style.css')}}">

</head>
<body style="overflow-y:none">
<!--NAVIGATION SECTION-->
<nav class="navbar navbar-expand-lg  text-white" >
    <!-- <form style="width: 600px; ">
      <div class="input-group" >
          <span class="">
              <button class="btn btn-default " style="background-color:#540004 " type="submit">
                <i class="fa fa-search "></i>
             </button>
          </span>
        <input type="text"  style="background-color: #8a1c6e" name="search" class=" text-black d-block" placeholder="جستجو..." id="search-button">
      </div>
    </form> -->
    @if (Auth::check())
    <a href="{{ url('/dashboard') }}" class="btn text-white" style="background-color:#c23ca5"> پنل مدیریت </a>
    @else
    <a href="{{ url('/login') }}" class="btn text-white" style="background-color:#c23ca5"> ورود </a>
    @endif

    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-toggle-down" style="color: #ffffff"  id="toggle-icon"> </span>
    </button>
    <div class="collapse navbar-collapse " style="direction: rtl !important; " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto " style="text-align: end">
            <li class="nav-item active ">
                <a class="nav-link  active" style="" href="#follower">خانه <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#follower">فالور اینستاگرام</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link " href="#like"> لایک ایرانی اینستاگرام</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="#view">بازدید اینستاگرام</a>
            </li>
        </ul>

    </div>
</nav>

<section id="slider" style="">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active "></li>


        </ol>
        <div class="carousel-inner">
            <div class="carousel-item carousel-image-1 active" >
                <div class="container">
                    <div class="carousel-caption  text-right mb-5 p-4"style="background: #00000070;
 color: white;
 border-radius: .25rem;">
                        <h1 class="display-3 text-center d-none d-sm-block" style="font-weight: 500;">توسعه دهندگان پارس</h1>
                        <p class="lead pt-5 text-center "style="font-weight: 400;">مرجع تخصصی فالور ، لایک و بازدید اینستاگرام</p>
                    </div>
                </div>
            </div>


            <a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
                <span class="carousel-control-prev-icon"></span>
            </a>

            <a href="#myCarousel" data-slide="next" class="carousel-control-next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</section>



<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<div class="container-fluid px-5" style="background-color:#eddfea">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="d-flex flex-row justify-content-between">

                <h5 style="color: #bfbabe"> Follower </h5>
                <h3> فالوور اینستاگرام </h3>
            </div>
        </div>
    </div>
</div>
<section id="follower" class="" style="background-color:#eddfea">
    <div class="container ">
        <div class="d-flex flex-row flex-wrap  justify-content-center">
            <div  class="mr-2" >
                <div class="card my-5" style="border-radius:5px;min-width:230px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
  background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
  box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
          <span>
              <h3 style="color:#ffffff">1000 </h3>
              <h5 class="" style="color:#ffffff">فالوور ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 5700 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div>

            <div  class="mr-2" >
                <div class="card my-5" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">500 </h3>
              <h5 class="" style="color:#ffffff">فالوور ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 3800 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-5" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">200 </h3>
              <h5 class="" style="color:#ffffff">فالوور ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 2500 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-5" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">2000 </h3>
              <h5 class="" style="color:#ffffff">فالوور ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 10500 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-1" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">5000 </h3>
              <h5 class="" style="color:#ffffff">فالوور ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 28500 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-1" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">10000 </h3>
              <h5 class="" style="color:#ffffff">فالوور ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 53500 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-1" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">1500 </h3>
              <h5 class="" style="color:#ffffff">فالوور ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 85000 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-1" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">20000 </h3>
              <h5 class="" style="color:#ffffff">فالوور ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 113000 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-1" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">50000 </h3>
              <h5 class="" style="color:#ffffff">فالوور ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 280000 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-1" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">100000 </h3>
              <h5 class="" style="color:#ffffff">فالوور ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 565000 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >

        </div>
    </div>
    </div>
    </div>
    </div>

</section>

<div class="container-fluid " style="height:2px; background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25)">

</div>
<div class="container-fluid px-4" style="background-color:#f7f8fc">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="d-flex flex-row justify-content-between">

                <h5 style="color: #bfbabe"> Like </h5>
                <h3> لایک اینستاگرام </h3>
            </div>
        </div>
    </div>
</div>
<section id="like" style="background-color:#f7f8fc">
    <div class="container">
        <div class="d-flex flex-row flex-wrap justify-content-center">
            <div  class="mr-2" >
                <div class="card my-5" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
  background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
  box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
              <span>
                <h3 style="color:#ffffff">700 </h3><h5 class="" style="color:#ffffff">لایک ایرانی</h5>
              </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 2800 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-5" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">500 </h3><h5 class="" style="color:#ffffff">لایک ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 2500 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-5" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">300 </h3><h5 class="" style="color:#ffffff">لایک ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 2300 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-5" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">200 </h3><h5 class="" style="color:#ffffff">لایک ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 1900 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-1" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">100 </h3><h5 class="" style="color:#ffffff">لایک ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 900 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-1" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">10000 </h3><h5 class="" style="color:#ffffff">لایک ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 34500 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-1" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">5000 </h3><h5 class="" style="color:#ffffff">لایک ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 17800 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-1" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">3000 </h3><h5 class="" style="color:#ffffff">لایک ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 11200 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-1" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">2000 </h3>
              <h5 class="" style="color:#ffffff">لایک ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 7300 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
            <div  class="mr-2" >
                <div class="card my-1" style="border-radius:5px" >
                    <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">1000 </h3>
              <h5 class="" style="color:#ffffff">لایک ایرانی</h5>
            </span>
                    </div>
                    <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                        <ul class="dList " style="margin-right:-10px;">
                            <li>

                                تخفیف ویژه به مدت محدود
                            </li>
                            <li>
                                شروع آنی پس از خرید
                            </li>
                            <li>
                                بدون نیاز به فالوو کردن دیگران
                            </li>
                        </ul>
                        <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 3800 تومان </div>
                        <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                    </div>
                </div>
            </div >
        </div>
    </div>
</section>



<div class="container-fluid " style="height:2px; background: #d6249f;
  background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
  box-shadow: 0px 3px 10px rgba(0,0,0,.25)">


    <div class="container-fluid px-5" style="background-color:#eddfea">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="d-flex flex-row justify-content-between">

                    <h5 style="color: #bfbabe"> View </h5>
                    <h3>بازدید اینستاگرام </h3>
                </div>
            </div>
        </div>
    </div>
    <section id="view" class="" style="background-color:#eddfea">
        <div class="container">
            <div class="d-flex flex-row flex-wrap  justify-content-center">
                <div  class="  mr-2" >
                    <div class="card my-5" style="border-radius:5px" >
                        <div class="card-title p-2 text-center" style="  background: #d6249f;
  background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
  box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
              <span>
                <h3 style="color:#ffffff">2000 </h3><h5 class="" style="color:#ffffff">بازدید اینستاگرام</h5>
              </span>
                        </div>
                        <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                            <ul class="dList " style="margin-right:-10px;">
                                <li>

                                    تخفیف ویژه به مدت محدود
                                </li>
                                <li>
                                    شروع آنی پس از خرید
                                </li>
                                <li>
                                    بدون نیاز به فالوو کردن دیگران
                                </li>
                            </ul>
                            <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 7800 تومان </div>
                            <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                        </div>
                    </div>
                </div >
                <div  class="  mr-2" >
                    <div class="card my-5" style="border-radius:5px" >
                        <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">1000 </h3><h5 class="" style="color:#ffffff">بازدید اینستاگرام</h5>
            </span>
                        </div>
                        <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                            <ul class="dList " style="margin-right:-10px;">
                                <li>

                                    تخفیف ویژه به مدت محدود
                                </li>
                                <li>
                                    شروع آنی پس از خرید
                                </li>
                                <li>
                                    بدون نیاز به فالوو کردن دیگران
                                </li>
                            </ul>
                            <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 4000 تومان </div>
                            <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                        </div>
                    </div>
                </div >
                <div  class="  mr-2" >
                    <div class="card my-5" style="border-radius:5px" >
                        <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">500 </h3><h5 class="" style="color:#ffffff">بازدید اینستاگرام</h5>
            </span>
                        </div>
                        <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                            <ul class="dList " style="margin-right:-10px;">
                                <li>

                                    تخفیف ویژه به مدت محدود
                                </li>
                                <li>
                                    شروع آنی پس از خرید
                                </li>
                                <li>
                                    بدون نیاز به فالوو کردن دیگران
                                </li>
                            </ul>
                            <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 2300 تومان </div>
                            <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                        </div>
                    </div>
                </div >
                <div  class="  mr-2" >
                    <div class="card my-5" style="border-radius:5px" >
                        <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">200 </h3><h5 class="" style="color:#ffffff">بازدید اینستاگرام</h5>
            </span>
                        </div>
                        <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                            <ul class="dList " style="margin-right:-10px;">
                                <li>

                                    تخفیف ویژه به مدت محدود
                                </li>
                                <li>
                                    شروع آنی پس از خرید
                                </li>
                                <li>
                                    بدون نیاز به فالوو کردن دیگران
                                </li>
                            </ul>
                            <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 900 تومان </div>
                            <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                        </div>
                    </div>
                </div >
                <div  class="  mr-2" >
                    <div class="card my-1" style="border-radius:5px" >
                        <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">100 </h3><h5 class="" style="color:#ffffff">بازدید اینستاگرام</h5>
            </span>
                        </div>
                        <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                            <ul class="dList " style="margin-right:-10px;">
                                <li>

                                    تخفیف ویژه به مدت محدود
                                </li>
                                <li>
                                    شروع آنی پس از خرید
                                </li>
                                <li>
                                    بدون نیاز به فالوو کردن دیگران
                                </li>
                            </ul>
                            <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 500 تومان </div>
                            <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                        </div>
                    </div>
                </div >
                <div  class=" mr-2" >
                    <div class="card my-1" style="border-radius:5px" >
                        <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">100000 </h3><h5 class="" style="color:#ffffff">بازدید اینستاگرام</h5>
            </span>
                        </div>
                        <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                            <ul class="dList " style="margin-right:-10px;">
                                <li>

                                    تخفیف ویژه به مدت محدود
                                </li>
                                <li>
                                    شروع آنی پس از خرید
                                </li>
                                <li>
                                    بدون نیاز به فالوو کردن دیگران
                                </li>
                            </ul>
                            <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 285000 تومان </div>
                            <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                        </div>
                    </div>
                </div>
                <div  class="mr-2" >
                    <div class="card my-1" style="border-radius:5px" >
                        <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">50000 </h3><h5 class="" style="color:#ffffff">بازدید اینستاگرام</h5>
            </span>
                        </div>
                        <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                            <ul class="dList " style="margin-right:-10px;">
                                <li>

                                    تخفیف ویژه به مدت محدود
                                </li>
                                <li>
                                    شروع آنی پس از خرید
                                </li>
                                <li>
                                    بدون نیاز به فالوو کردن دیگران
                                </li>
                            </ul>
                            <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 158000 تومان </div>
                            <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                        </div>
                    </div>
                </div >
                <div  class="  mr-2" >
                    <div class="card my-1" style="border-radius:5px" >
                        <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">20000 </h3><h5 class="" style="color:#ffffff">بازدید اینستاگرام</h5>
            </span>
                        </div>
                        <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                            <ul class="dList " style="margin-right:-10px;">
                                <li>

                                    تخفیف ویژه به مدت محدود
                                </li>
                                <li>
                                    شروع آنی پس از خرید
                                </li>
                                <li>
                                    بدون نیاز به فالوو کردن دیگران
                                </li>
                            </ul>
                            <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 62500 تومان </div>
                            <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                        </div>
                    </div>
                </div >
                <div  class= "  mr-2" >
                    <div class="card my-1" style="border-radius:5px" >
                        <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">10000 </h3>
              <h5 class="" style="color:#ffffff">بازدید اینستاگرام</h5>
            </span>
                        </div>
                        <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                            <ul class="dList " style="margin-right:-10px;">
                                <li>

                                    تخفیف ویژه به مدت محدود
                                </li>
                                <li>
                                    شروع آنی پس از خرید
                                </li>
                                <li>
                                    بدون نیاز به فالوو کردن دیگران
                                </li>
                            </ul>
                            <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 32500 تومان </div>
                            <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                        </div>
                    </div>
                </div >
                <div  class="  mr-2" >
                    <div class="card my-1" style="border-radius:5px" >
                        <div class="card-title p-2 text-center" style="  background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25); border-radius:5px">
            <span>
              <h3 style="color:#ffffff">5000 </h3>
              <h5 class="" style="color:#ffffff">بازدید اینستاگرام</h5>
            </span>
                        </div>
                        <div class="card-body bg-light" style="direction : rtl !important;border-radius:10px" >
                            <ul class="dList " style="margin-right:-10px;">
                                <li>

                                    تخفیف ویژه به مدت محدود
                                </li>
                                <li>
                                    شروع آنی پس از خرید
                                </li>
                                <li>
                                    بدون نیاز به فالوو کردن دیگران
                                </li>
                            </ul>
                            <div class="text-center d-block align-center p-1 " style=" background-color:#f0ddec; color:#425ee3; height:35px; border-radius:5px; text-decoration: none;"> 17300 تومان </div>
                            <a href="" class="btn d-block text-white my-2" style=" background-color:#c23ca5"> سفارش </a>
                        </div>
                    </div>
                </div >
            </div>
        </div>
    </section>


    <section  style="background-color:#f7f8fc;">
        <div class="container"  >
            <div class="row  py-5">

                <div class="col-md-4">

                    <h5 class="text-dark text-right mr-4">سایر موارد</h5>
                    <ul class=" mt-3 mr-5 " style="text-align:right; direction:rtl !important;">
                        <li>

                            <a href="#"  class="" style="text-decoration:none;color:#888888">
                                سوالات متداول
                            </a>

                        </li>
                        <li>

                            <a href="#"  class="py-1" style="text-decoration:none;color:#888888">
                                ارتباط با ما
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-1" style="text-decoration:none;color:#888888">
                                پیگیری خرید  </a>
                        </li>
                    </ul>
                </div>


                <div class="col-md-4">
                    <h5 class="text-dark text-right mr-4">لینک های سریع</h5>
                    <ul class=" mt-3 mr-5" style="text-align:right; direction:rtl !important;">
                        <li>

                            <a href="#like"  class="" style="text-decoration:none;color:#888888">
                                لایک اینستاگرام
                            </a>

                        </li>
                        <li>

                            <a href="#follower"  class="py-1" style="text-decoration:none;color:#888888">

                                فالوور اینستاگرام
                            </a>
                        </li>
                        <li>
                            <a href="#view" class="py-1" style="text-decoration:none;color:#888888">
                                بازدید اینستاگرام
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <p style="direction:rtl !important ; color:#000000 ; font-size:17px; text-align:right" class="mr-5">توسعه دهندگان پارس با سال ها سابقه در زمینه شبکه های اجتماعی از به روزترین مراجع بوده که به طور پیوسته رضایت مشتریان را سرلوحه کار خود قرار داده است.
                    </p>  </div>
            </div>
        </div>
    </section>



    <footer id="footer" class="footer pt-2 " style=" background: #d6249f;
background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
box-shadow: 0px 3px 10px rgba(0,0,0,.25);">
        <div class="container">
            <div class="row" style="direction: rtl !important;">
                <div class="col-md-12 text-center text-white">
                    {{--<p>--}}
                        {{--طراحی و توسعه--}}
                        {{--توسط--}}
                        {{--<a href="http://www.ezitech.ir/"> EziTech </a>--}}
                        {{--<span style="font-weight:500; ">|| تمامی حقوق برای <Strong>  "توسعه دهندگان پارس"</Strong>  محفوظ می باشد.</span>--}}
                    {{--</p>--}}
                </div>
            </div>
        </div>
    </footer>












</body>
</html>
