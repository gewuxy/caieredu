@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">登录</div>
                <div class="panel-body">
                    @include('common.errors')
                    <form class="form-horizontal col-md-12" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="手机号">
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="password" placeholder="密码">
                        </div>

                        <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> 记住我
                                    </label>
                                </div>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="width:100%">
                                    登录
                                </button>
                            <div>
                                <a class="btn btn-link pull-left" href="{{ url('/register') }}">注册账号</a>
                                <a class="btn btn-link pull-right" href="{{ url('/password/reset') }}">忘记密码?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
