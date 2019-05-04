@extends('layouts.mainlayout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box border shadow round">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-fire"></i>
                            افزودن امکانات برای موبایل
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
                        <form role="form" action="InsertNewMobileOption" method="post">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">


                                    <div class="form-group">
                                        <label>عنوان موبایل</label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-settings"></i>
                                                </span>
                                            <select class="form-control" name="idmobile">
                                                @foreach($currencyList as $currency)
                                                    <option value="{{$currency->id}}" >{{$currency->name}}</option>
                                                @endforeach
                                            </select>
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>عنوان</label>
                                        <div class="input-group round">
                                            <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <input type="text" name="title" class="form-control" value="" placeholder="عنوان وارد شود">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>مقدار</label>
                                        <div class="input-group round">
                                            <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <input type="text" name="value" class="form-control" value="" placeholder="مقدار وارد شود">
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
                            لیست امکانات موبایل ها
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
                                {{ $datasetList->links() }}
                            </div>
                            <div class="table-responsive">
                                <table class="table table-condensed table-hover table-striped" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>عنوان موبایل</th>
                                        <th>عنوان</th>
                                        <th>مقدار</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0;?>
                                    @foreach($datasetList as $dataset)
                                        <tr>
                                            <?php $i++;?>
                                            <td><?php echo $i;?></td>
                                            <td>
                                                    @foreach ($currencyList as $currency)
                                                        @if($currency->id == $dataset->mobile_id)
                                                            {{$currency->name}}
                                                        @endif
                                                    @endforeach
                                            </td>
                                            <td contenteditable="true" onBlur="saveToDatabaseTwo(this,'options','{{$dataset->id}}')">{{$dataset->options}}</td>
                                                <td contenteditable="true" onBlur="saveToDatabaseTwo(this,'values','{{$dataset->id}}')">{{$dataset->values}}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /.table-responsive -->
                        <div class="pull-left">
                            {{ $datasetList->links() }}
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

        function saveToDatabaseTwo(editableObj,column,id) {
            $.ajax({
                url: "{{url('EditDataMobileOptions')}}",
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
    <link href="{!! asset('plugins/data-table/css/dataTables.bootstrap.css') !!}" rel="stylesheet">
    <!-- END PAGE CSS -->

@stop


