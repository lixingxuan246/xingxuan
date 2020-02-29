<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 水平表单</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>

<meta name="csrf-token" content="{{csrf_token()}}">

</head>
<body>

<form action="{{url('manage/update/'.$res->m_id)}}" method="post" class="form-horizontal"  role="form" enctype="multipart/form-data">

<!-- @if ($errors->any()) <div class="alert alert-danger"> <ul>
@foreach ($errors->all() as $error)<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
 -->


@csrf
<h3>管理员</h3>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员账号</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="mana_name"
                   placeholder="请输入名字" value="{{$res->mana_name}}">
                  <!--  <b style="color:red">{{$errors->first('regu_name')}}</b> -->
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">管理员密码
        </label>
        <div class="col-sm-10">
<input type="password" name="pwd" value="{{$res->pwd}}">




        </div>

    </div>





    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">头像</label>
        <div class="col-sm-10">
        <img src="{{env('UPLOAD_URL')}}{{$res->mana_img}}"  width="40" height="40"/>
                     <input type="file" name="mana_img" >

        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">手机号</label>
        <div class="col-sm-10">
                     <input type="text" name="shou" value="{{$res->shou}}">

                    <!--   <b style="color:red">{{$errors->first('writer')}}</b> -->
        </div>
    </div>






    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-default" value="修改
            ">
        </div>
    </div>
</form>
<!-- <script>
$.ajaxSetup({ headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});

    $('input[name="regu_name"]').blur(function(){
         $(this).next().html('');
    var regu_name = $(this).val();
    var reg = /^[\u4e00-\u9fa50-9A-Za-z_]{2,8}$/;
    if(!reg.test(regu_name)){
        $(this).next().html('商品名称由中文字母数字组成且不能为空，长度2-8位');
        return;
    }
    })

    $('input[name="regu_price"]').blur(function(){
             $(this).next().html('');
    var regu_name = $(this).val();
    var reg = /^[0-9]{2,8}$/;
    if(!reg.test(regu_name)){
        $(this).next().html('价格必须是数字，2-8位');
        return;
    }
    })

</script> -->
</body>
</html>