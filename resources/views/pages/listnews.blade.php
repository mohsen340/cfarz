@extends('layouts.mainlayout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box border shadow round">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-user"></i>
                            لیست مقالات
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
                                        <th>تصویر مقاله</th>
                                        <th>عنوان</th>
                                        <th>خلاصه</th>
                                        <th>وضعیت</th>
                                        <th>نوع مقاله</th>
                                        <th>تاریخ ثبت</th>
                                        <th>آپلود عکس جدید</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0;?>
                                    @foreach($datasetList as $dataset)
                                        <tr>
                                            <?php $i++;?>
                                            <td><?php echo $i;?></td>
                                            <td><img src="{{$dataset->filename}}" height="35" class="rounded float-right" alt="{{$dataset->name}}"></td>
                                            <td contenteditable="true" onBlur="saveToDatabaseTwo(this,'name','{{$dataset->id}}')">{{$dataset->name}}</td>
                                            <td contenteditable="true" onBlur="saveToDatabaseTwo(this,'descrb','{{$dataset->id}}')">{{$dataset->descrb}}</td>
                                            <td>
                                                <select name="status"  onchange="saveToDatabaseThree(this,'status','{{$dataset->id}}')">
                                                    @if($dataset->status==0)
                                                        <option value="0" selected>غیرفعال</option>
                                                        <option value="1">فعال</option>
                                                    @else
                                                        <option value="0" >غیرفعال</option>
                                                        <option value="1" selected>فعال</option>
                                                    @endif
                                                </select>
                                            </td>
                                                <td>
                                                    <select name="status"  onchange="saveToDatabaseThree(this,'type','{{$dataset->id}}')">
                                                        @if($dataset->type==1)
                                                            <option value="1" selected >مقاله</option>
                                                            <option value="2">خبر</option>
                                                            <option value="3">خبر برگزیده</option>
                                                        @elseif($dataset->type==2)
                                                            <option value="1" >مقاله</option>
                                                            <option value="2" selected>خبر</option>
                                                            <option value="3">خبر برگزیده</option>
                                                        @else
                                                            <option value="1" >مقاله</option>
                                                            <option value="2" >خبر</option>
                                                            <option value="3" selected>خبر برگزیده</option>
                                                        @endif
                                                    </select>
                                                </td>
                                            <td>
                                                <?php echo $v = new Verta($dataset->created_at);?>
                                            </td>

                                            <td>
                                                <form action="/upload-new-image" method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <input type="file" name="image">
                                                    <input type="hidden" name="id" value="{{$dataset->id}}">
                                                    <input type="submit" value="آپلود">

                                                </form>
                                            </td>
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

        function saveToDatabaseThree(editableObj,column,id) {
            $.ajax({
                url: "{{url('EditNews')}}",
                type: "POST",
                data: 'column=' + column + '&editval=' + $(editableObj).val() + '&id=' + id + '&_token=' + '{{csrf_token()}}' + '&type='+1,
                success: function (data) {
                    $(editableObj).css("background", "#FDFDFD");
                }
            });
        }

        function saveToDatabaseTwo(editableObj,column,id) {
            $.ajax({
                url: "{{url('EditNews')}}",
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


