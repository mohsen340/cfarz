@extends('layouts.mainlayout')
@section('content')

    <div class="row">
        <div class="col-md-6 col-xs-6 xxs-full-width">
            <div class="stat-box bg-darkblue shadow">
                <a href="#">
                    <div class="stat">
                        <div class="counter-down" data-value="{{$currency}}"></div>
                        <div class="h3">ارز</div>
                    </div><!-- /.stat -->
                    <div class="visual">
                        <i class="icon-book-open"></i>
                    </div><!-- /.visual -->
                </a>
            </div><!-- /.stat-box -->
        </div><!-- /.col-md-3 -->
        <div class="col-md-6 col-xs-6 xxs-full-width">
            <div class="stat-box bg-blue shadow">
                <a href="#">
                    <div class="stat">
                        <div class="counter-down" data-value="{{$sourcecurrency}}"></div>
                        <div class="h3"> ارز مرجع</div>
                    </div><!-- /.stat -->
                    <div class="visual">
                        <i class="icon-paypal"></i>
                    </div><!-- /.visual -->
                </a>
            </div><!-- /.stat-box -->
        </div><!-- /.col-md-3 -->
    </div>
    <div class="row">
        <div class="col-md-6 col-xs-6 xxs-full-width">
            <div class="stat-box bg-orange shadow">
                <a href="#">
                    <div class="stat">
                        <div class="counter-down" data-value="{{$coin}}"></div>
                        <div class="h3">سکه</div>
                    </div><!-- /.stat -->
                    <div class="visual">
                        <i class="icon-disc"></i>
                    </div><!-- /.visual -->
                </a>
            </div><!-- /.stat-box -->
        </div><!-- /.col-md-3 -->
        <div class="col-md-6 col-xs-6 xxs-full-width">
            <div class="stat-box bg-red shadow">
                <a href="#">
                    <div class="stat">
                        <div class="counter-down" data-value="{{$gold}}"></div>
                        <div class="h3">طلا</div>
                    </div><!-- /.stat -->
                    <div class="visual">
                        <i class="icon-diamond"></i>
                    </div><!-- /.visual -->
                </a>
            </div><!-- /.stat-box -->
        </div><!-- /.col-md-3 -->
    </div><!-- /.row -->




    <div class="row">
        <div class="col-md-3 col-xs-6 xxs-full-width">
            <div class="stat-box bg-green shadow">
                <a href="#">
                    <div class="stat">
                        <div class="counter-down" data-value="{{$mobile}}"></div>
                        <div class="h3">موبایل</div>
                    </div><!-- /.stat -->
                    <div class="visual">
                        <i class="icon-phone"></i>
                    </div><!-- /.visual -->
                </a>
            </div><!-- /.stat-box -->
        </div><!-- /.col-md-3 -->
        <div class="col-md-3 col-xs-6 xxs-full-width">
            <div class="stat-box bg-green shadow">
                <a href="#">
                    <div class="stat">
                        <div class="counter-down" data-value="{{$cars}}"></div>
                        <div class="h3">خودرو</div>
                    </div><!-- /.stat -->
                    <div class="visual">
                        <i class="icon-arrow-right"></i>
                    </div><!-- /.visual -->
                </a>
            </div><!-- /.stat-box -->
        </div><!-- /.col-md-3 -->
        <div class="col-md-3 col-xs-6 xxs-full-width">
            <div class="stat-box bg-green shadow">
                <a href="#">
                    <div class="stat">
                        <div class="counter-down" data-value="{{$news}}"></div>
                        <div class="h3">اخبار</div>
                    </div><!-- /.stat -->
                    <div class="visual">
                        <i class="icon-note"></i>
                    </div><!-- /.visual -->
                </a>
            </div><!-- /.stat-box -->
        </div><!-- /.col-md-3 -->
        <div class="col-md-3 col-xs-6 xxs-full-width">
            <div class="stat-box bg-green shadow">
                <a href="#">
                    <div class="stat">
                        <div class="counter-down" data-value="{{$newspapers}}"></div>
                        <div class="h3">روزنامه</div>
                    </div><!-- /.stat -->
                    <div class="visual">
                        <i class="icon-notebook"></i>
                    </div><!-- /.visual -->
                </a>
            </div><!-- /.stat-box -->
        </div><!-- /.col-md-3 -->
    </div><!-- /.row -->



    @if(auth()->user()->role == 'admin')
    <div class="row">
        <div class="col-md-6">
            <div class="portlet box border shadow round">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-fire"></i>
                           اطلاعات اپلیکیشن
                        </h3>
                    </div>
                    <div class="buttons-box">
                        <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip" title="تمام صفحه" href="#">
                            <i class="icon-size-fullscreen"></i>
                        </a>
                        <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">
                            <i class="icon-arrow-up"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="portlet-body">
                        <form role="form" method="post">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">

                                <div class="form-group">
                                    <label>نوع نسخه</label>
                                    <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-settings"></i>
                                                </span>
                                        <select class="form-control" name="status" onBlur="saveToDatabaseThree(this,'force','1')">
                                            @if($UpdateStatus==0)
                                                <option value="0" selected>اختیاری</option>
                                                <option value="1">اجباری</option>
                                            @else
                                                <option value="0" >اختیاری</option>
                                                <option value="1" selected>اجباری</option>
                                            @endif
                                        </select>
                                    </div><!-- /.input-group -->
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <label>کد نسخه فعلی اپلیکیشن</label>
                                    <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                        <input type="text" name="version" class="form-control" value="{{$versionOfApp}}" onBlur="saveToDatabaseThree(this,'app_version',1)" placeholder="فقط عدد وارد شود">
                                    </div><!-- /.input-group -->
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <label>زمان بین تبلیغات</label>
                                    <div class="input-group round">
                                            <span class="input-group-addon">
                                                <i class="icon-info"></i>
                                            </span>
                                        <input type="text" name="version" class="form-control" value="{{$AdsTime}}" onBlur="saveToDatabaseThree(this,'ads_time',1)" placeholder="فقط عدد وارد شود">
                                    </div><!-- /.input-group -->
                                </div><!-- /.form-group -->
                                
                                    <div class="form-group">
                                    <label>Unit Code Banner</label>
                                    <div class="input-group round">
                                            <span class="input-group-addon">
                                                <i class="icon-info"></i>
                                            </span>
                                        <input type="text" name="version" class="form-control" value="{{$unitbanner}}" onBlur="saveToDatabaseThree(this,'unitbanner',1)" placeholder="فقط عدد وارد شود">
                                    </div><!-- /.input-group -->
                                </div><!-- /.form-group -->


                             <div class="form-group">
                                    <label>Unit Code Video Gift</label>
                                    <div class="input-group round">
                                            <span class="input-group-addon">
                                                <i class="icon-info"></i>
                                            </span>
                                        <input type="text" name="version" class="form-control" value="{{$unitgift}}" onBlur="saveToDatabaseThree(this,'unitgift',1)" placeholder="فقط عدد وارد شود">
                                    </div><!-- /.input-group -->
                                </div><!-- /.form-group -->
                                
                                
                                <div class="form-group">
                                    <label>Unit Code Interstitial</label>
                                    <div class="input-group round">
                                            <span class="input-group-addon">
                                                <i class="icon-info"></i>
                                            </span>
                                        <input type="text" name="version" class="form-control" value="{{$unitinter}}" onBlur="saveToDatabaseThree(this,'unitinter',1)" placeholder="فقط عدد وارد شود">
                                    </div><!-- /.input-group -->
                                </div><!-- /.form-group -->
                                
                                <div class="form-group">
                                    <label>زمان نمایش تبلیغات پس از کلیک روی دکمه رفرش</label>
                                    <div class="input-group round">
                                            <span class="input-group-addon">
                                                <i class="icon-info"></i>
                                            </span>
                                        <input type="text" name="version" class="form-control" value="{{$timefree}}" onBlur="saveToDatabaseThree(this,'timefree',1)" placeholder="فقط عدد وارد شود">
                                    </div><!-- /.input-group -->
                                </div><!-- /.form-group -->


                                    <div class="form-group">
                                        <label>منابع برنامه</label>
                                        <div class="input-group round">
                                            <span class="input-group-addon">
                                                <i class="icon-info"></i>
                                            </span>
                                            <input type="text" name="resource" class="form-control" value="{{$resource}}" onBlur="saveToDatabaseThree(this,'resource',1)" placeholder="منابع برنامه وارد شود">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->
                                
                                
                            </div><!-- /.form-body -->

                            </div>
                        </form>
                    </div><!-- /.portlet-body -->
                </div><!-- /.portlet -->

            </div>
            </div>
        <div class="col-md-6">
            <div class="portlet box border shadow round">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-fire"></i>
                             اپلیکیشن دانلودی برای نمودارها
                        </h3>
                    </div>
                    <div class="buttons-box">
                        <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip" title="تمام صفحه" href="#">
                            <i class="icon-size-fullscreen"></i>
                        </a>
                        <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">
                            <i class="icon-arrow-up"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="portlet-body">
                        <form role="form"  method="post">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">

                                    <div class="form-group">
                                        <label>وضعیت نمایش</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-settings"></i>
                                                </span>
                                            <select class="form-control" name="status" onchange="saveToDatabaseThree(this,'activeadsforchart','1')">
                                                @if($activeall==0)
                                                    <option value="0" selected>فعال</option>
                                                    <option value="1">غیرفعال</option>
                                                @else
                                                    <option value="0" >فعال</option>
                                                    <option value="1" selected>غیرفعال</option>
                                                @endif
                                            </select>
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>نمایش لینک مستقیم</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-settings"></i>
                                                </span>
                                            <select class="form-control" name="dstatus" onchange="saveToDatabaseThree(this,'activedirect','1')">
                                                @if($activedirect==0)
                                                    <option value="0" selected>فعال</option>
                                                    <option value="1">غیرفعال</option>
                                                @else
                                                    <option value="0" >فعال</option>
                                                    <option value="1" selected>غیرفعال</option>
                                                @endif
                                            </select>
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>لینک دانلود مستقیم</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <input type="text" name="directlink" class="form-control" value="{{$directlink}}" onBlur="saveToDatabaseThree(this,'linkdirect','1')" placeholder="لینک دانلود مستقیم">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>نمایش لینک گوگل پلی</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-settings"></i>
                                                </span>
                                            <select class="form-control" name="gstatus" onchange="saveToDatabaseThree(this,'activegoogleplay','1')">
                                                @if($activegoogle==0)
                                                    <option value="0" selected>فعال</option>
                                                    <option value="1">غیرفعال</option>
                                                @else
                                                    <option value="0" >فعال</option>
                                                    <option value="1" selected>غیرفعال</option>
                                                @endif
                                            </select>
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>لینک دانلود گوگل پلی</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <input type="text" name="googleplaylink" class="form-control" value="{{$googleplaylink}}" onBlur="saveToDatabaseThree(this,'linkgoogleplay','1')" placeholder="لینک دانلود گوگل پلی">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>نمایش لینک کافه بازار</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-settings"></i>
                                                </span>
                                            <select class="form-control" name="cstatus" onchange="saveToDatabaseThree(this,'activebazaar','1')">
                                                @if($activecafebazar==0)
                                                    <option value="0" selected>فعال</option>
                                                    <option value="1">غیرفعال</option>
                                                @else
                                                    <option value="0" >فعال</option>
                                                    <option value="1" selected>غیرفعال</option>
                                                @endif
                                            </select>
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>لینک دانلود بازار</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <input type="text" name="cafebazarlink" class="form-control" value="{{$cafebazarlink}}" onBlur="saveToDatabaseThree(this,'linkebazaar','1')" placeholder="لینک دانلود بازار">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                </div><!-- /.form-body -->
                            </div>
                        </form>
                    </div><!-- /.portlet-body -->
                </div><!-- /.portlet -->

            </div>
        </div>
    </div>
    @endif

@stop

@section('Pagejavascript')

    <!-- BEGIN PAGE JAVASCRIPT -->
    <script src="{!! asset('plugins/raphael/raphael.min.js') !!}"></script>
    <script src="{!! asset('plugins/morris.js/morris.min.js') !!}"></script>
    <script src="{!! asset('plugins/jquery-incremental-counter/jquery.incremental-counter.min.js') !!}"></script>
    <script src="{!! asset('plugins/ammap3/ammap/ammap.js') !!}"></script>
    <script src="{!! asset('plugins/ammap3/ammap/maps/js/iranHighFa.js') !!}"></script>
    <script src="{!! asset('plugins/kamadatepicker/kamadatepicker.min.js') !!}"></script>
    <script src="{!! asset('js/pages/dashboard1.js') !!}"></script>
    <!-- END PAGE JAVASCRIPT -->

    <script>

        function saveToDatabaseThree(editableObj,column,id) {
            $.ajax({
                url: "{{url('EditADSINFO')}}",
                type: "POST",
                data: 'column=' + column + '&editval=' + $(editableObj).val() + '&id=' + id + '&_token=' + '{{csrf_token()}}' + '&type='+1,
                success: function (data) {
                    $(editableObj).css("background", "#FDFDFD");
                }
            });
        }

        function saveToDatabaseTwo(editableObj,column,id) {
            $.ajax({
                url: "{{url('EditADSINFO')}}",
                type: "POST",
                data: 'column=' + column + '&editval=' + $(editableObj).text() + '&id=' + id + '&_token=' + '{{csrf_token()}}' + '&type='+2,
                success: function (data) {
                    $(editableObj).css("background", "#FDFDFD");
                }
            });
        }

    </script>

@stop

@section('PageCss')

    <!-- BEGIN PAGE CSS -->
    <link href="{!! asset('plugins/morris.js/morris.css') !!}" rel="stylesheet">
    <link href="{!! asset('plugins/kamadatepicker/kamadatepicker.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/effects.css') !!}" rel="stylesheet">
    <!-- END PAGE CSS -->

@stop

