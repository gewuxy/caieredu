@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('common.errors')
                    <form class="form-horizontal col-md-12" role="form" method="POST" action="{{ url('/newCourse') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="control-label sr-only" for="inputGroupSuccess1">Input group with success</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-book" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="courseName" placeholder="课程名称" value="{{old('courseName')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label sr-only" for="inputGroupSuccess1">Input group with success</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-search" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="courseType" placeholder="课程类别" value="{{old('courseType')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label sr-only" for="inputGroupSuccess1">Input group with success</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-time" aria-hidden="true"></i></span>
                                <input id="datetime" type="datetime" class="form-control" name="courseTime" placeholder="课程起始日期" value="{{old('courseTime')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="minAge" placeholder="适用年龄,最小年龄" value="{{old('minAge')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="maxAge" placeholder="适用年龄,最大年龄" value="{{old('maxAge')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="minNum" placeholder="最少开课人数" value="{{old('minNum')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="maxNum" placeholder="最大开课人数" value="{{old('maxNum')}}">
                            </div>
                        </div>

                        <div class="form-group btn-group-justified" style="align-content: center" id="distpicker">
                            <select name="province" data-province="省" style="width: 33%"></select>
                            <select name="city" data-city="市" style="width: 33%"></select>
                            <select name="district" data-district="区" style="width: 33%"></select>
                        </div>

                        <div class="form-group">
                            <label class="control-label sr-only" for="inputGroupSuccess1">Input group with success</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="courseAddressDetail" placeholder="课程详细地址" value="{{old('courseAddressDetail')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label sr-only" for="inputGroupSuccess1">Input group with success</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-yen" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="coursePrice" placeholder="课程价格" value="{{old('coursePrice')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label sr-only" for="inputGroupSuccess1">Input group with success</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="courseSummary" placeholder="课程简介" value="{{old('courseSummary')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-success" style="width:100%">
                                    提交
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="/js/distpicker.data.js"></script>
<script src="/js/distpicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $('#distpicker').distpicker({
        autoSelect:false
    });
    $("#datetime").datetimepicker({
        format: 'YYYY-MM-DD',
    });
</script>
@endsection
