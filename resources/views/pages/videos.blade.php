@extends('layouts.mainlayout')
@section('content')
    <div class="row">
        {{--<div class="col-md-12">--}}
            {{--<div class="portlet box border shadow round">--}}
                {{--<div class="portlet-heading">--}}
                    {{--<div class="portlet-title">--}}
                        {{--<h3 class="title">--}}
                            {{--<i class="icon-fire"></i>--}}
                            {{--آپلود ویدیو--}}
                        {{--</h3>--}}
                    {{--</div>--}}
                    {{--<div class="buttons-box">--}}
                        {{--<a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip" title="تمام صفحه" href="#">--}}
                            {{--<i class="icon-size-fullscreen"></i>--}}
                        {{--</a>--}}
                        {{--<a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">--}}
                            {{--<i class="icon-arrow-up"></i>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="portlet-body">--}}
                    {{--<div class="portlet-body">--}}
                        {{--<form role="form" action="{{url('upload-video')}}" method="post" enctype="multipart/form-data">--}}
                            {{--{{csrf_field()}}--}}
                            {{--<div class="form-body">--}}
                                {{--<div class="form-group">--}}

                                    {{--<div class="form-group">--}}
                                        {{--<label>نام فایل</label>--}}
                                        {{--<div class="input-group round">--}}
                                                {{--<span class="input-group-addon">--}}
                                                    {{--<i class="icon-info"></i>--}}
                                                {{--</span>--}}
                                            {{--<input type="text" name="name" class="form-control" value="" placeholder="نام ویدیو وارد شود">--}}
                                        {{--</div><!-- /.input-group -->--}}
                                    {{--</div><!-- /.form-group -->--}}

                                    {{--<div class="form-group relative">--}}
                                        {{--<input type="file" name="filename[]" class="form-control">--}}
                                        {{--<label>انتخاب ویدیو</label>--}}
                                        {{--<div class="input-group round">--}}
                                            {{--<input type="text" class="form-control file-input" placeholder="برای آپلود کلیک کنید">--}}
                                            {{--<span class="input-group-btn input-group-sm">--}}
                                                {{--<button type="button" class="btn btn-info">--}}
                                                    {{--<i class="icon-picture"></i>--}}
                                                    {{--آپلود ویدیو--}}
                                                {{--</button>--}}
                                            {{--</span>--}}
                                        {{--</div><!-- /.input-group -->--}}
                                    {{--</div><!-- /.form-group -->--}}





                                {{--</div><!-- /.form-body -->--}}

                                {{--<div class="form-actions">--}}
                                    {{--<button type="submit" name="submit" class="btn btn-info btn-round">--}}
                                        {{--<i class="icon-check"></i>--}}
                                        {{--ذخیره--}}
                                    {{--</button>--}}
                                {{--</div><!-- /.form-actions -->--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div><!-- /.portlet-body -->--}}
                {{--</div><!-- /.portlet -->--}}

            {{--</div>--}}
        {{--</div>--}}

        <div class="col-md-12">
            <div class="portlet box border shadow round">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-fire"></i>
                             افزودن فایل با لینک (این فایل روی سرور دانلود آپلود خواهد شد)
                        </h3>
                        <br>
                        <h5>
                            *بعد از کلیک دکمه ذخیره لحظاتی طول میکشد تا فایل روی سرور دانلود ، آپلود شود.پس میتوانید صفحه را ببندید و یا دکمه بازگشت را بزنید(فایل اتوماتیک آپلود خواهد شد)
                        </h5>
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

                @if(\Illuminate\Support\Facades\Session::get('error') != null)
                    <h4 class="btn-danger  text-center">{{\Illuminate\Support\Facades\Session::get('error')}}</h4>
                @elseif(\Illuminate\Support\Facades\Session::get('success') != null)
                    <h4 class="btn-success text-center">{{\Illuminate\Support\Facades\Session::get('success')}}</h4>
                @endif
                <div class="portlet-body">
                    <div class="portlet-body">
                        <form role="form" action="{{url('upload-video-with-link')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">

                                    <div class="form-group">
                                        <label>نام فایل</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <input type="text" name="name" class="form-control" value="" placeholder="نام فایل وارد شود">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>لینک فایل</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <input type="text" name="link" class="form-control" value="" placeholder="لینک فایل وارد شود">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->






                                </div><!-- /.form-body -->

                                <div class="form-actions">
                                    <button type="submit" name="submit" class="btn btn-info btn-round">
                                        <i class="icon-check"></i>
                                        ذخیره
                                    </button>
                                </div><!-- /.form-actions -->
                            </div>
                        </form>
                    </div><!-- /.portlet-body -->
                </div><!-- /.portlet -->

            </div>
        </div>










        <div class="col-md-12">
            <div class="portlet box border shadow round">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-user"></i>
                            لیست فایلها
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

                            <div class="pull-left">
                                {{--{{ $videos->links() }}--}}
                            </div>
                            <div class="table-responsive">
                                <table class="table table-condensed table-hover table-striped" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نام</th>
                                        <th style="text-align: center">لینک دانلود</th>
                                        <th>وضعیت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=0)
                                    @foreach($videos as $file)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td> <h4 class="title">{{$file->name}} </h4></td>
                                            <td style="direction: ltr"><label style="direction: ltr"  value="{{$file->link}}">{{$file->link}}</label></td>
                                            @if($file->downloaded == 1)
                                                <td class="btn-success">آپلود شده</td>
                                            @elseif($file->downloaded == 0)
                                                <td class="btn-warning">در حال آپلود روی سرور</td>
                                            @endif
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div><!-- /.table-responsive -->
                        <div class="pull-left">
                            {{ $videos->links() }}
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.portlet-body -->
                </div><!-- /.portlet -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.portlet -->



@stop

@section('Pagejavascript')


    <!-- BEGIN PAGE JAVASCRIPT -->
    <script src="{!! asset('plugins/data-table/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('plugins/data-table/js/dataTables.bootstrap.js') !!}"></script>
    <script src="{!! asset('js/pages/datatable.js') !!}"></script>
    <!-- END PAGE JAVASCRIPT -->

    <script>



    </script>

@stop

@section('PageCss')

    <!-- BEGIN PAGE CSS -->
    <link href="{!! asset('plugins/data-table/css/dataTables.bootstrap.css') !!}" rel="stylesheet">
    <!-- END PAGE CSS -->

@stop


