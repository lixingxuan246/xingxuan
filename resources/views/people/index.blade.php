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

<form action="{{url('people/store')}}" method="post" class="form-horizontal"  role="form" enctype="multipart/form-data">

<!-- @if ($errors->any()) <div class="alert alert-danger"> <ul>
@foreach ($errors->all() as $error)<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
 -->


@csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">名字</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="username"
                   placeholder="请输入名字">
                   <b style="color:red">{{$errors->first('username')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">年龄</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="lastname" name="age"
                   placeholder="请输入年龄">
                       <b style="color:red">{{$errors->first('age')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">身份证</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="lastname" name="card"
                   placeholder="请输入身份证">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">头像</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="lastname" name="head"
                   placeholder="请输入头像">
        </div>
    </div>



    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">登录</button>
        </div>
    </div>
</form>

</body>
</html>