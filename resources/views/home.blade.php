@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="background-color: #2e6da4;box-sizing: border-box">
        <img src="" class="img-responsive img-rounded" style="width: 140px;height: 140px;display: inline-block; margin: 10px" alt="Responsive image">
        <div style="vertical-align: middle;display: inline-block;color: white;">
            <p>商家名称：{{ Auth::user()->organization }}</p>
            <p>联系电话：{{Auth::user()->contactsNO}}</p>
            <p>地址：{{Auth::user()->detailAddress}}</p>
            <p>审核状态</p>
        </div>
        <span class="glyphicon glyphicon-menu-right pull-right" aria-hidden="true" style="color: white;padding-top: 60px;padding-right: 10px"></span>

    </div>
    <div class="row" style="height: 50px;border-bottom: 1px solid #cccccc">
        <div class="pull-left" style="text-align: center;padding-left: 10px;padding-top: 12px;padding-bottom: 10px;color: #2e6da4">已有课程</div>
        <div class="pull-right" style=""><a class="btn btn-primary" style="margin-top: 8px;margin-right: 10px" href="{{url('/newCourse')}}">新建课程</a></div>
    </div>
    @foreach ($courses as $course)
    <div class="row" style="box-sizing: border-box">
        <img src="" class="img-responsive img-rounded" style="width: 80px;height: 80px;display: inline-block; margin: 10px" alt="Responsive image">
        <div style="vertical-align: middle;display: inline-block;">
            <p style="color: #666666">课程名称：<span style="color: #2ca02c">{{$course->name}}</span></p>
            <p style="color: #666666">开课时间：<span style="color: #2ca02c">{{$course->startDate}}</span></p>
            <p style="color: #666666">价格：<span style="color: #dd0000">￥{{$course->price}}</span></p>
        </div>
        <span class="glyphicon glyphicon-menu-right pull-right" aria-hidden="true" style="color: #666666;padding-top: 40px;padding-right: 10px"></span>

    </div>
    @endforeach
</div>
@endsection
