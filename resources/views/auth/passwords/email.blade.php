@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">修改密码</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal col-md-12" role="form" method="POST" action="{{ url('/password/email') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">

                            <div class="input-group">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="电话号码">
                                <div class="input-group-btn">
                                    <button class="btn">
                                        发送验证码
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('smsCode') ? ' has-error' : '' }}">

                            <div>
                                <input type="text" class="form-control" name="smsCode" placeholder="输入验证码">

                                @if ($errors->has('smsCode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('smsCode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div>
                                <input type="password" class="form-control" name="password" placeholder="请输入密码">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="再次输入密码">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary clearfix" style="width: 100%">
                                    确认
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
