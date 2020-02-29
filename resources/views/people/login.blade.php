<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 水平表单</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
</head>
<body>

<form action="{{url('/logindo')}}" method="get" class="form-horizontal"  role="form" enctype="multipart/form-data">

<!-- @if ($errors->any()) <div class="alert alert-danger"> <ul>
@foreach ($errors->all() as $error)<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
 -->


@csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">账号</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="username"
                   placeholder="请输入账号">
                   <b style="color:red">{{$errors->first('username')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="lastname" name="pwd"
                   placeholder="请输入密码">
                       <b style="color:red">{{$errors->first('pwd')}}</b>
        </div>




    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">登录</button>
        </div>
    </div>
</form>

</body>
</html>