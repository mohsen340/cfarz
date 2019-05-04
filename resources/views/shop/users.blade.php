@extends('layouts.mainlayout')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="portlet box border shadow round">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-user"></i>
                            لیست کاربران
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
                            {{ $users->links() }}
                        </div>
                        <div class="table-responsive">
                            <table class="table table-condensed table-hover table-striped" id="data-table">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>ایمیل</th>
                                    <th>موبایل</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=0)
                                @foreach($users as $user)

                                    <tr class="warning" style="height: 50px">

                                        <td>{{++$i}}</td>


                                            <td>
                                                <a href="{{url('user-detail', $user->id)}}"><h4 class="title">{{$user->name}} </h4></a>
                                            </td>

                                            <td>
                                                <a href="{{url('user-detail', $user->id)}}"><h4 class="title">{{$user->email}} </h4></a>
                                            </td>


                                        @if($user->orders()->orderBy('id', 'desc')->first() != null)
                                            <td>
                                                <a href="{{url('user-detail', $user->id)}}"><h4 class="title">{{$user->orders()->orderBy('id', 'desc')->first()->phone}} </h4></a>
                                            </td>
                                        @else
                                            <td> <h4 class="title"></h4></td>
                                        @endif
                                    </tr>


                                @endforeach


                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                        <div class="pull-left">
                            {{ $users->links() }}
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


