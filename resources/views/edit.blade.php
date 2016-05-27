@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('common.errors')
                        <form class="form-horizontal col-md-12" role="form" method="POST"
                              action="{{ url('/editDetail')}}" files="true" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <div class="input-group">
                                    <img id="preview" src="{{Auth::user()->headIcon}}" alt="头像" style="display: inline;width: 80px;height: 80px"/>
                                    <input name="pictureupload" type="file" id="pictureupload" style="display: inline;padding-top: 28px;padding-left: 10px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label sr-only" for="inputGroupSuccess1">Input group with
                                    success</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"
                                                                       aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="orgName" placeholder="机构名称"
                                           value="{{Auth::user()->organization }}">
                                </div>
                            </div>

                            <div class="form-group btn-group-justified" style="align-content: center" id="distpicker">
                                <select name="province" data-province="{{Auth::user()->province}}"
                                        style="width: 33%"></select>
                                <select name="city" data-city="{{Auth::user()->city}}" style="width: 33%"></select>
                                <select name="district" data-district="{{Auth::user()->district}}"
                                        style="width: 33%"></select>
                            </div>

                            <div class="form-group">
                                <label class="control-label sr-only" for="inputGroupSuccess1">Input group with
                                    success</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"
                                                                       aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="orgAddressDetail" placeholder="详细地址"
                                           value="{{Auth::user()->detailAddress}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label sr-only" for="inputGroupSuccess1">Input group with
                                    success</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-book"
                                                                       aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="introduction" placeholder="简介"
                                           value="{{Auth::user()->introduction }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label sr-only" for="inputGroupSuccess1">Input group with
                                    success</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"
                                                                       aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="contacts" placeholder="联系人"
                                           value="{{Auth::user()->contacts}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label sr-only" for="inputGroupSuccess1">Input group with
                                    success</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"
                                                                       aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="contactsNO" placeholder="联系人电话"
                                           value="{{Auth::user()->contactsNO}}">
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
    <script src="/plugins/croppic/croppic.min.js"></script>
    <script>
        $('#distpicker').distpicker({
            autoSelect: false
        });

        $('#pictureupload').change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });

        var eyeCandy = $('#cropContainerEyecandy');
        var croppedOptions = {
            uploadUrl: 'upload',
            cropUrl: 'crop',
            cropData:{
                'width' : eyeCandy.width(),
                'height': eyeCandy.height()
            }
        };
        var cropperBox = new Croppic('cropContainerEyecandy', croppedOptions);
    </script>
@endsection
