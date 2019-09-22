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
                        <form role="form" action="{{url('shop-product-insert')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">



                                    <div class="form-group">
                                        <label>نوع محصول</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <select class="form-control" name="type">
                                                <option value="like">لایک اینستاگرام</option>
                                                <option value="follower">فالور اینستاگرام</option>
                                                <option value="member">ممبر کانال تلگرام</option>
                                            </select>
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->





                                    <div class="form-group">
                                        <label>نام محصول</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <input type="text" name="title" class="form-control" value="" placeholder="نام محصول وارد شود">
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
                                            <input type="text" name="description" class="form-control" value="" placeholder="توضیحات محصول وارد شود">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>قیمت محصول</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <input type="number" name="price" class="form-control" value="" placeholder="قیمت محصول وارد شود(تومان)">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>اولویت نمایش(هر چه بیشتر باشد بالاتر دیده میشود)</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <input type="number" name="priority" class="form-control" value="0" required placeholder="اولویت نمایش محصول وارد شود">
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
                            لیست محصولات
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
                            {{ $products->links() }}
                        </div>
                        <div class="table-responsive">
                            <table class="table table-condensed table-hover table-striped" id="data-table">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نوع</th>
                                    <th>نام</th>
                                    <th>تصویر</th>
                                    <th>توضیحات</th>
                                    <th>قیمت(تومان)</th>
                                    <th>اولویت نمایش</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=0)
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td> <h4 class="title">{{$product->type}} </h4></td>
                                        <td> <h4 class="title">{{$product->title}} </h4></td>
                                        <td><img src="{{$product->image_url}}" height="35" class="rounded float-right" ></td>
                                        <td> <h4 class="desc">{{$product->description}} </h4></td>
                                        <td> <h4 class="title">{{number_format($product->price)}} </h4></td>
                                        <td> <h4 class="title">{{$product->priority}} </h4></td>
                                        <td> <a class="btn-primary" style="padding: 2px" href="{{url('shop-products/detail', $product->id)}}">ویرایش</a></td>
                                        <td> <a class="btn-danger" style="padding: 2px" href="{{url('shop-product-delete', $product->id)}}">حذف</a></td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                        <div class="pull-left">
                            {{ $products->links() }}
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


