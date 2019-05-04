
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <title>صفحه ورود</title>
    <meta charset="utf-8">
    <!-- BEGIN CSS -->
    <link href="{!! asset('plugins/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('plugins/bootstrap-rtl/dist/css/bootstrap-rtl.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('plugins/simple-line-icons/css/simple-line-icons.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('plugins/sweetalert2/dist/sweetalert2.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('plugins/paper-ripple/dist/paper-ripple.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('plugins/iCheck/skins/square/_all.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/colors.css') !!}" rel="stylesheet">
    <!-- END CSS -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="fix-header active-ripple theme-blue">
<!-- BEGIN LOEADING -->
<div id="loader">
    <div class="spinner"></div>
</div><!-- /loader -->
<!-- END LOEADING -->

<!-- BEGIN WRAPPER -->
<div class="fixed-modal-bg"></div>
<div class="modal-page shadow">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="logo-con m-t-10 m-b-10">
                    <img src="{!! asset('images/logo.png') !!}" class="center-block img-responsive">
                </div><!-- /.logo-con -->
                <hr>
                @yield('content')

            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.modal-page -->
<!-- END WRAPPER -->

<!-- BEGIN JS -->
<script src="{!! asset('js/jquery-1.12.4.min.js') !!}"></script>
<script src="{!! asset('plugins/jquery-migrate/jquery-migrate-1.2.1.min.js') !!}"></script>
<script src="{!! asset('js/holder.js') !!}"></script>
<script src="{!! asset('plugins/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('plugins/metisMenu/dist/metisMenu.min.js') !!}"></script>
<script src="{!! asset('plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') !!}"></script>
<script src="{!! asset('plugins/paper-ripple/dist/PaperRipple.min.js') !!}"></script>
<script src="{!! asset('plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') !!}"></script>
<script src="{!! asset('plugins/sweetalert2/dist/sweetalert2.min.js') !!}"></script>
<script src="{!! asset('plugins/screenfull/dist/screenfull.min.js') !!}"></script>
<script src="{!! asset('plugins/iCheck/icheck.min.js') !!}"></script>
<script src="{!! asset('plugins/switchery/dist/switchery.js') !!}"></script>
<script src="{!! asset('js/core.js') !!}"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="{!! asset('js/html5shiv.js') !!}"></script>
<script src="{!! asset('js/respond.min.js') !!}"></script>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- END JS -->

<!-- BEGIN PAGE JAVASCRIPT -->
<script src="{!! asset('js/pages/login.js') !!}"></script>
<!-- END PAGE JAVASCRIPT -->

</body>
</html>
