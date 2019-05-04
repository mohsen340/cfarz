@extends('layouts.mainlayout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box border shadow round">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-fire"></i>
                            افزودن شرکت خودروسازی
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
                        <form role="form" action="InsertNewCarco" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">

                                    <div class="form-group">
                                        <label>نام شرکت </label>
                                        <div class="input-group round">
                                                <span class="input-group-addon">
                                                    <i class="icon-info"></i>
                                                </span>
                                            <input type="text" name="name" class="form-control" value="" placeholder="نام شرکت وارد شود">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group relative">
                                        <input type="file" name="filename[]" class="form-control">
                                        <label>آیکون</label>
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

                                <div class="form-actions">
                                    <button type="submit" name="submit" class="btn btn-info btn-round">
                                        <i class="icon-check"></i>
                                        ذخیره
                                    </button>
                                </div><!-- /.form-actions -->
                            </div>
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
                            لیست شرکت ها
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
                                {{ $currencyList->links() }}
                            </div>
                            <div class="table-responsive">
                                <table class="table table-condensed table-hover table-striped" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>آیکون</th>
                                        <th>عنوان شرکت</th>
                                        <th>فعال/غیرفعال</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0;?>
                                    @foreach($currencyList as $currency)
                                        <tr>
                                            <?php $i++;?>
                                            <td><?php echo $i;?></td>
                                            <td><img src="{{$currency->filename}}" height="35" class="rounded float-right" alt="{{$currency->name}}"></td>
                                            <td contenteditable="true" onBlur="saveToDatabaseTwo(this,'name','{{$currency->id}}')">{{$currency->name}}</td>
                                             <td>
                                                <select name="status"  onchange="saveToDatabaseThree(this,'status','{{$currency->id}}')">
                                                    @if($currency->status==0)
                                                        <option value="0" selected>غیرفعال</option>
                                                        <option value="1">فعال</option>
                                                    @else
                                                        <option value="0" >غیرفعال</option>
                                                        <option value="1" selected>فعال</option>
                                                    @endif
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /.table-responsive -->
                        <div class="pull-left">
                            {{ $currencyList->links() }}
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
                url: "{{url('EditCarCo')}}",
                type: "POST",
                data: 'column=' + column + '&editval=' + $(editableObj).text() + '&id=' + id + '&_token=' + '{{csrf_token()}}' + '&type='+2,
                success: function (data) {
                    $(editableObj).css("background", "#FDFDFD");
                }
            });
        }
        
                function saveToDatabaseThree(editableObj,column,id) {
            $.ajax({
                url: "{{url('EditCarCo')}}",
                type: "POST",
                data: 'column=' + column + '&editval=' + $(editableObj).val() + '&id=' + id + '&_token=' + '{{csrf_token()}}' + '&type='+1,
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


