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
                                    <a href="javascript:;" class="file">选择文件<input name="pictureupload" type="file" id="pictureupload" accept="image/*">
                                    </a>
                                    <span class="showFileName"></span>
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

                            <div class="form-group" id="distpicker">
                                <select name="province" data-province="{{Auth::user()->province}}"
                                        style="width: 32.3%"></select>
                                <select name="city" data-city="{{Auth::user()->city}}" style="width: 32.3%"></select>
                                <select name="district" data-district="{{Auth::user()->district}}"
                                        style="width: 32.3%"></select>
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">修改图片</h4>
                </div>
                <div class="modal-body">
                    <img id="modal_preview" src="" alt="" style="width: auto;height: auto;max-width: 100%;"/>
                    <label class="data-url"></label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary">确定</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="/js/distpicker.data.js"></script>
    <script src="/js/distpicker.js"></script>
    <script src="/js/cropper.js"></script>
    <script>
        $('#distpicker').distpicker({
            autoSelect: false
        });

        var $image = $('#modal_preview');
        var originlData = {};

        $('#pictureupload').change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $image.attr('src', e.target.result);
                    $("#myModal").on("shown.bs.modal", function() {
                        $image.cropper({
                            aspectRatio: 200/200,
                            resizable: true,
                            zoomable: true,
                            modal:true,
                            guides:false,
                            hightlight:true,
                            rotatable: true,
                            background:false,
                            multiple: false,
                        });
                    }).on("hidden.bs.modal", function() {
                        originlData = $image.cropper("getData");
                        var canvas = $image.cropper("getCroppedCanvas");
                        var data = canvas.toDataURL();
                        $("#preview").attr("src", data);
                        $image.cropper("destroy");
                    });;
                    $('#myModal').modal('show');
                    //showCropper();
                }

                reader.readAsDataURL(this.files[0]);
            }
        });


        $(".file").on("change","input[type='file']",function(){
            var filePath=$(this).val();
            if(filePath.indexOf("jpg")!=-1 || filePath.indexOf("png")!=-1){
                $(".fileerrorTip").html("").hide();
                var arr=filePath.split('\\');
                var fileName=arr[arr.length-1];
                $(".showFileName").html(fileName);
            }else{
                $(".showFileName").html("");
                $(".fileerrorTip").html("您未上传文件，或者您上传文件类型有误！").show();
                return false
            }
        });
    </script>
@endsection
