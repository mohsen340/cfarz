@extends('layouts.mainlayout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box border shadow">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-note"></i>
                            افزودن مقاله
                        </h3>
                    </div><!-- /.portlet-title -->
                    <div class="buttons-box">
                        <a class="btn btn-sm btn-default btn-round btn-code" title="کدها" rel="tooltip" href="#">
                            <i class="fa fa-code"></i>
                        </a>
                        <div class="code-modal hide">
                        </div>
                        <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip" title="تمام صفحه" href="#">
                            <i class="icon-size-fullscreen"></i>
                        </a>
                        <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">
                            <i class="icon-arrow-up"></i>
                        </a>
                    </div><!-- /.buttons-box -->
                </div><!-- /.portlet-heading -->
                <div class="portlet-body">
                    <form role="form" action="InsertNewNews" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-body">
                    <div class="form-group">
                        <label>عنوان مقاله</label>
                        <div class="input-group round">
                                            <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                            <input type="text" name="title" class="form-control" value="" placeholder="عنوان مقاله">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    <div class="form-group relative">
                        <input type="file" name="filename[]" class="form-control">
                        <label>تصویر مقاله</label>
                        <div class="input-group round">
                            <input type="text" class="form-control file-input" placeholder="برای آپلود کلیک کنید">
                            <span class="input-group-btn input-group-sm">
                                <button type="button" class="btn btn-info">
                                    <i class="icon-picture"></i>
                                    آپلود عکس
                                </button>
                            </span>
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>خلاصه ای از مقاله</label>
                        <div class="input-group round">
                                            <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                            <input type="text" name="descrb" class="form-control" value="" placeholder="خلاصه ای از مقاله">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->


                    <div class="form-group">
                        <label>نوع مقاله</label>
                        <div class="input-group round">
                                        <span class="input-group-addon">
                                            <i class="icon-settings"></i>
                                        </span>
                            <select class="form-control" name="type">
                                <option value="1" >مقاله</option>
                                <option value="2">خبر</option>
                                <option value="3">خبر برگزیده</option>
                            </select>
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    <textarea name="text" class="summernote">
                        <p dir="rtl"><span style="font-family:Tahoma">هم اکنون نوشتن را آغاز کنید...</span></p>
                    </textarea><!-- /summernote -->

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
        </div><!-- /.col-md-12 -->

    </div><!-- /.row -->
@stop

@section('Pagejavascript')

    <!-- BEGIN PAGE JAVASCRIPT -->
    <script src="{!! asset('plugins/summernote/dist/summernote.min.js') !!}"></script>
    <script src="{!! asset('js/pages/summernote.js') !!}"></script>
    <!-- END PAGE JAVASCRIPT -->

@stop

@section('PageCss')

    <!-- BEGIN PAGE CSS -->
    <link href="{!! asset('plugins/summernote/dist/summernote.css') !!}" rel="stylesheet">
    <!-- END PAGE CSS -->

@stop


