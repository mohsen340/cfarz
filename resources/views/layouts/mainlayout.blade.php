@include('includes.header')
<!-- BEGIN PAGE CONTENT -->
<div id="page-content">
    <div class="row">
        <!-- BEGIN BREADCRUMB -->
        <div class="col-md-12">
            <div class="breadcrumb-box border shadow">
                <ul class="breadcrumb">
                    <li><a href="{{$pageaddress}}">{{$pagename}}</a></li>
                </ul>
                <div class="breadcrumb-left">
                    {{$date}}    <i class="icon-calendar"></i>
                </div><!-- /.breadcrumb-left -->
            </div><!-- /.breadcrumb-box -->
        </div><!-- /.col-md-12 -->
        <!-- END BREADCRUMB -->

        <div class="col-md-12">
            @yield('content')
        </div><!-- /.col-md-12 -->
    </div><!-- /.row -->

    <div class="row footer-container">
        <div class="col-md-12">
            <div class="copyright">
                <p class="pull-right">
                    کلیه حقوق نزد کافه ارز محفوظ می باشد.
                </p>
            </div><!-- /.copyright -->
        </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
</div><!-- /#page-content -->
<!-- END PAGE CONTENT -->
@include('includes.footer')
