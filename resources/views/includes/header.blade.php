
<!DOCTYPE html>
<html lang="fa" dir="rtl">


<head>
    <title>پنل مدیریت</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="پنل مدیریت">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{!! asset('images/favicon.png') !!}">

    <!-- BEGIN CSS -->
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
    <!-- END CSS -->

    @yield('PageCss')




</head>
<body class="active-ripple theme-blue fix-header sidebar-extra">
<!-- BEGIN LOEADING -->
<div id="loader">
    <div class="spinner"></div>
</div><!-- /loader -->
<!-- END LOEADING -->

<!-- BEGIN HEADER -->
<div class="navbar navbar-fixed-top" id="main-navbar">
    <div class="header-right">
        <a href="/" class="logo-con">
            <img src="{!! asset('images/logo.png') !!}" class="img-responsive center-block" alt="لوگو کافه ارز">
        </a>
    </div><!-- /.header-right -->
    <div class="header-left">
        <div class="top-bar">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" class="btn" id="toggle-sidebar">
                        <span></span>
                    </a>
                </li>
                <li>
                    <a href="#" class="btn open" id="toggle-sidebar-top">
                        <i class="icon-user-following"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="#" class="btn" id="toggle-fullscreen">
                        <i class="icon-size-fullscreen"></i>
                    </a>
                </li>

                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle dropdown-hover" data-toggle="dropdown">
                        <img src="{!! asset('images/user/48.png') !!}" alt="عکس پرفایل" class="img-circle img-responsive">
                        <span>{{Auth::user()->name}}</span>
                        <i class="icon-arrow-down"></i>
                    </a>
                    <ul class="dropdown-menu">


                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-power"></i>

                                    خروج
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                        </li>
                    </ul>
                </li>
            </ul><!-- /.navbar-left -->
        </div><!-- /.top-bar -->
    </div><!-- /.header-left -->
</div><!-- /.navbar -->
<!-- END HEADER -->

<!-- BEGIN WRAPPER -->
<div id="wrapper">

    <!-- BEGIN SIDEBAR -->
    <div id="sidebar">

        <div class="side-menu-container">
            <ul class="metismenu" id="side-menu">
                <li class="">
                    <a href="{{url('dashboard')}}">
                        <i class="icon-home"></i>
                        <span>پیشخوان</span>
                    </a>
                </li>

                <li class="">
                    <a href="{{url("addcurrency")}}" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-frame"></i>
                        <span>ارزها</span>
                    </a>
                    <ul>
                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'author')
                        <li>
                            <a href="{{url("addcurrency")}}" class="">
                                <i class="icon-frame"></i>
                                <span>مدیریت ارزها</span>
                            </a>
                        </li>
                        @endif

                        <li>
                            <a href="{{url("listcurrency")}}" class="">
                                <i class="icon-frame"></i>
                                <span>مدیریت دیتاها</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="{{url("addscurrency")}}" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-book-open"></i>
                        <span>ارزهای مرجع</span>
                    </a>
                    <ul>
                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'author')
                        <li>
                            <a href="{{url("addscurrency")}}" class="">
                                <i class="icon-book-open"></i>
                                <span>مدیریت ارزهای مرجع</span>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{url("listscurrency")}}" class="">
                                <i class="icon-book-open"></i>
                                <span>مدیریت دیتاها</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="{{url("adddcurrency")}}" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-diamond"></i>
                        <span>ارزهای دیجیتال</span>
                    </a>
                    <ul>
                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'author')
                        <li>
                            <a href="{{url("adddcurrency")}}" class="">
                                <i class="icon-diamond"></i>
                                <span>مدیریت ارزهای دیجیتال</span>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{url("listdcurrency")}}" class="">
                                <i class="icon-diamond"></i>
                                <span>مدیریت دیتاها</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="{{url("addcoin")}}" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-disc"></i>
                        <span>سکه ها</span>
                    </a>
                    <ul>
                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'author')
                        <li>
                            <a href="{{url("addcoin")}}" class="">
                                <i class="icon-disc"></i>
                                <span>مدیریت سکه ها</span>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{url("listcoin")}}" class="">
                                <i class="icon-disc"></i>
                                <span>مدیریت دیتاها</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="{{url("addgold")}}" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-tag"></i>
                        <span>طلا ها</span>
                    </a>
                    <ul>
                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'author')
                        <li>
                            <a href="{{url("addgold")}}" class="">
                                <i class="icon-tag"></i>
                                <span>مدیریت طلا ها</span>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{url("listgold")}}" class="">
                                <i class="icon-tag"></i>
                                <span>مدیریت دیتاها</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="{{url("addmobile")}}" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-call-end"></i>
                        <span>موبایل ها</span>
                    </a>
                    <ul>
                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'author')
                        <li>
                            <a href="{{url("addmobilebrand")}}" class="">
                                <i class="icon-call-end"></i>
                                <span>مدیریت برند ها</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{url("addmobile")}}" class="">
                                <i class="icon-call-end"></i>
                                <span>مدیریت موبایل ها</span>
                            </a>
                        </li>

                            <li>
                                <a href="{{url("mobileoptions")}}" class="">
                                    <i class="icon-call-end"></i>
                                    <span>مدیریت امکانات</span>
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{url("listmobile")}}" class="">
                                <i class="icon-call-end"></i>
                                <span>مدیریت دیتاها</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="">
                    <a href="{{url("addcarco")}}" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-direction"></i>
                        <span>خودروها</span>
                    </a>
                    <ul>

                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'author')
                        <li>
                            <a href="{{url("addcarco")}}" class="">
                                <i class="icon-direction"></i>
                                <span>مدیریت شرکت ها</span>
                            </a>
                        </li>
                            <li>
                                <a href="{{url("caroptions")}}" class="">
                                    <i class="icon-direction"></i>
                                    <span>مدیریت امکانات</span>
                                </a>
                            </li>

                        @endif

                        <li>
                            <a href="{{url("addcar")}}" class="">
                                <i class="icon-direction"></i>
                                <span>مدیریت خودروها</span>
                            </a>
                        </li>

                    </ul>
                </li>


                @if(auth()->user()->role == 'admin' || auth()->user()->role == 'author')
                <li class="">
                    <a href="{{url("addmaghale")}}" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-notebook"></i>
                        <span>مقالات و روزنامه ها</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{url("addnews")}}" class="">
                                <i class="icon-notebook"></i>
                                <span>افزودن مقاله</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url("listnews")}}" class="">
                                <i class="icon-notebook"></i>
                                <span>لیست مقالات</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{url("addcatenewspaper")}}" class="">
                                <i class="icon-notebook"></i>
                                <span>دسته بندی روزنامه ها</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{url("addnewspaper")}}" class="">
                                <i class="icon-notebook"></i>
                                <span>افزودن روزنامه</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{url("listnewspaper")}}" class="">
                                <i class="icon-notebook"></i>
                                <span>مدیریت روزنامه ها</span>
                            </a>
                        </li>

                    </ul>
                </li>
                @endif

                <li class="">
                    <a href="{{url("files")}}" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-cloud-upload"></i>
                        <span>آپلود</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{url("manage-files")}}" class="">
                                <i class="icon-cloud-upload"></i>
                                <span>مدیریت فایلها</span>
                            </a>
                        </li>


                    </ul>
                </li>




                @if(auth()->user()->role == 'admin')
                <li class="header-right">
                        <span style="color: white;font-size: 25px;text-align: center">فروشگاه</span>
                </li>


                <li class="">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <i class=""></i>
                        <span>مدیریت محصولات</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{url("shop-products")}}" class="">
                                <i class=""></i>
                                <span>محصولات</span>
                            </a>
                        </li>


                    </ul>
                </li>


                <li class="">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <i class=""></i>
                        <span>مدیریت سفارشات</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{url("shop-orders")}}" class="">
                                <i class=""></i>
                                <span>سفارشات</span>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <i class=""></i>
                        <span>مدیریت کاربران</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{url("all-users")}}" class="">
                                <i class=""></i>
                                <span>لیست کاربران</span>
                            </a>
                        </li>


                    </ul>
                </li>

                @endif




            </ul><!-- /#side-menu -->
        </div><!-- /.side-menu-container -->
    </div><!-- /#sidebar -->
    <!-- END SIDEBAR -->
</div>