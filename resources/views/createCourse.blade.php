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
                                <input type="text" class="form-control" name="courseName" placeholder="课程名称" value="{{ $course->name or old('courseName')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label sr-only" for="inputGroupSuccess1">Input group with success</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-search" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="courseType" placeholder="课程类别" value="{{$course->category or old('courseType')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label sr-only" for="inputGroupSuccess1">Input group with success</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-time" aria-hidden="true"></i></span>
                                <input id="datetime" type="datetime" class="form-control" name="courseTime" placeholder="课程起始日期" value="{{$course->startDate or old('courseTime')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="minAge" placeholder="适用年龄,最小年龄" value="{{$course->minAge or old('minAge')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="maxAge" placeholder="适用年龄,最大年龄" value="{{$course->maxAge or old('maxAge')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="minNum" placeholder="最少开课人数" value="{{$course->minNum or old('minNum')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="maxNum" placeholder="最大开课人数" value="{{$course->maxNum or old('maxNum')}}">
                            </div>
                        </div>

                        <div class="form-group btn-group-justified" style="align-content: center" id="distpicker">
                            <select id="province" name="province" data-province="{{$course->province}}" style="width: 33%" ></select>
                            <select id="city" name="city" data-city="{{$course-city}}" style="width: 33%"></select>
                            <select id="district" name="district" data-district="{{$course->district}}" style="width: 33%"></select>
                        </div>

                        <div class="form-group">
                            <label class="control-label sr-only" for="inputGroupSuccess1">Input group with success</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="courseAddressDetail" placeholder="课程详细地址" value="{{$course->detailAddress or old('courseAddressDetail')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label sr-only" for="inputGroupSuccess1">Input group with success</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-yen" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="coursePrice" placeholder="课程价格" value="{{$course->price or old('coursePrice')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label sr-only" for="inputGroupSuccess1">Input group with success</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="courseSummary" placeholder="课程简介" value="{{$course->summary or old('courseSummary')}}">
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
