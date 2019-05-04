@extends('layouts.mainlayout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box border shadow">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-note"></i>
                            افزودن روزنامه
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
                    <form role="form" action="InsertNewNewsPaper" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-body">
                    <div class="form-group">
                        <label>عنوان روزنامه</label>
                        <div class="input-group round">
                                            <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                            <input type="text" name="title" class="form-control" value="" placeholder="عنوان روزنامه">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    <div class="form-group relative">
                        <input type="file" name="filename[]" class="form-control">
                        <label>تصویر روزنامه</label>
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
                        <label>توضیحی مختصر در مورد روزنامه</label>
                        <div class="input-group round">
                                            <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                            <input type="text" name="descrb" class="form-control" value="" placeholder="توضیحی مختصر در مورد روزنامه">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->


                    <div class="form-group">
                        <label>دسته بندی روزنامه</label>
                        <div class="input-group round">
                                        <span class="input-group-addon">
                                            <i class="icon-settings"></i>
                                        </span>
                            <select class="form-control" name="catid">
                                @foreach($listnewscats as $currency)
                                    <option value="{{$currency->id}}" >{{$currency->name}}</option>
                                @endforeach
                            </select>
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>لینک دانلود روزنامه</label>
                        <div class="input-group round">
                                    <span class="input-group-addon">
                                            <i class="icon-info"></i>
                                        </span>
                            <input type="text" name="downloadlink" class="form-control" value="" placeholder="لینک دانلود روزنامه">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

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


