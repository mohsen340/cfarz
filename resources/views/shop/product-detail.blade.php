@extends('layouts.mainlayout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box border shadow round">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-fire"></i>
                            افزودن محصول
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
                        <form role="form" action="{{url('shop-products/update')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <input type="hidden" name="id" value="{{$product->id}}">
                            <div class="form-body">
                                <div class="form-group">



                                    <div class="form-group">
                                        <label>نوع محصول</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <select class="form-control" name="type">
                                                <option value="like" @if($product->type == 'like') selected @endif>لایک اینستاگرام</option>
                                                <option value="follower" @if($product->type == 'follower') selected @endif>فالور اینستاگرام</option>
                                                <option value="member" @if($product->type == 'member') selected @endif>ممبر کانال تلگرام</option>
                                            </select>
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->





                                    <div class="form-group">
                                        <label>نام محصول</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <input type="text" name="title" class="form-control" value="{{$product->title}}" placeholder="نام محصول وارد شود">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group relative">
                                        <input type="file" name="filename[]" class="form-control">
                                        <label>انتخاب تصویر</label>
                                        <div class="input-group round">
                                            <input type="text" class="form-control file-input" placeholder="برای آپلود کلیک کنید">
                                            <span class="input-group-btn input-group-sm">
                                                <button type="button" class="btn btn-info">
                                                    <i class="icon-picture"></i>
                                                    آپلود تصویر
                                                </button>
                                            </span>
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>توضیحات محصول</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <input type="text" name="description" class="form-control" value="{{$product->description}}" placeholder="توضیحات محصول وارد شود">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>قیمت محصول</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <input type="number" name="price" class="form-control" value="{{$product->price}}" placeholder="قیمت محصول وارد شود(تومان)">
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


