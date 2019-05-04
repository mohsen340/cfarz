@extends('layouts.mainlayout')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="portlet box border shadow round">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-user"></i>
                            لیست سفارشات
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
                            {{ $orders->links() }}
                        </div>
                        <div class="table-responsive">
                            <table class="table table-condensed table-hover table-striped" id="data-table">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>ایمیل</th>
                                    <th>موبایل</th>
                                    <th>توضیحات</th>
                                    <th>محصول</th>
                                    <th>مبلغ(تومان)</th>
                                    <th>تاریخ</th>
                                    <th>کد خرید</th>
                                    <th>وضعیت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=0)
                                @foreach($orders as $order)
                                    @if($order->is_done == 0)
                                        <tr class="warning" style="height: 100px">
                                            <td>{{++$i}}</td>
                                            <td>
                                                <a href="{{url('user-detail', $order->user->id)}}"><h4 class="title">{{$order->user->email}} </h4></a>
                                            </td>
                                            <td> <h4 class="desc">{{$order->phone}} </h4></td>
                                            <td> <h4 class="desc">{{$order->description}} </h4></td>
                                            <td> <h4 class="desc">{{$order->product->title}} </h4></td>
                                            <td> <h4 class="desc">{{number_format($order->payment->amount)}} </h4></td>
                                            <td> <h4 class="desc">{{verta($order->created_at)->format('Y/m/d')}}<br>{{verta($order->created_at)->format('H:i')}}</h4></td>
                                            <td> <h4 class="desc">{{$order->buy_code}} </h4></td>
                                            <td> <a class="btn-success" style="padding: 2px" href="{{url('shop-order-done', $order->id)}}">انجام شد </a></td>
                                        </tr>
                                    @else
                                        <tr class="success" style="height: 100px">
                                            <td>{{++$i}}</td>
                                            <td>
                                                <a href="{{url('user-detail', $order->user->id)}}"><h4 class="title">{{$order->user->email}} </h4></a>
                                            </td>
                                            <td> <h4 class="desc">{{$order->phone}} </h4></td>
                                            <td> <h4 class="desc">{{$order->description}} </h4></td>
                                            <td> <h4 class="desc">{{$order->product->title}} </h4></td>
                                            <td> <h4 class="desc">{{number_format($order->payment->amount)}} </h4></td>
                                            <td> <h4 class="desc">{{verta($order->created_at)->format('Y/m/d')}}<br>{{verta($order->created_at)->format('H:i')}}</h4></td>
                                            <td> <h4 class="desc">{{$order->buy_code}} </h4></td>
                                            <td> <span class="" style="padding: 2px" >انجام شده </span></td>
                                        </tr>

                                    @endif
                                @endforeach


                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                        <div class="pull-left">
                            {{ $orders->links() }}
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


