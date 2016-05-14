@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">注册</div>
                <div class="panel-body">
                    @include('common.errors')
                    <form class="form-horizontal col-md-12" role="form" method="POST" action="{{ url('/editDetail') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="control-label sr-only" for="inputGroupSuccess1">Input group with success</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="orgName" placeholder="机构名称" value="{{old('orgName')}}">
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
                                <input type="text" class="form-control" name="orgAddressDetail" placeholder="详细地址" value="{{old('orgAddressDetail')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label sr-only" for="inputGroupSuccess1">Input group with success</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-book" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="introduction" placeholder="简介" value="{{old('introduction')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label sr-only" for="inputGroupSuccess1">Input group with success</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="contacts" placeholder="联系人" value="{{old('contacts')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label sr-only" for="inputGroupSuccess1">Input group with success</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="contactsNO" placeholder="联系人电话" value="{{old('contactsNO')}}">
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
    <script>
        $('#distpicker').distpicker({
            autoSelect:false
        });
    </script>
@endsection
