@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">注册</div>
                <div class="panel-body">
                    @include('common.errors')
                    <form class="form-horizontal col-md-12" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                                       placeholder="手机号码">
                                <div class="input-group-btn">
                                    <button id="sendVerifySmsButton" class="btn">
                                        发送验证码
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <input type="smsCode" class="form-control" name="verifyCode" placeholder="请输入验证码">
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <input type="password" class="form-control" name="password" placeholder="请输入密码">
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="再次输入密码">
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary" style="width:100%">
                                    注册
                                </button>
                                <div>
                                    <a class="btn btn-link pull-right" href="{{ url('/login') }}">已有账号，直接登录</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="/js/laravel-sms.js"></script>
<script>
    $('#sendVerifySmsButton').sms({
        //laravel csrf token
        token           : "{{csrf_token()}}",
        //定义如何获取mobile的值
        mobile_selector : 'input[name=phone]',
        //手机号的检测规则
        mobile_rule     : 'mobile_required',
        //请求间隔时间
        interval        : 60,
        //是否请求语音验证码
        voice           : false,

        //定义服务器有消息返回时如何展示，默认为alert
        alertMsg       :  function (msg, type) {
            alert(msg);
        }
    });
</script>
@endsection
