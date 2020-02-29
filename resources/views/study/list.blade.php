<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 上下文类</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
     <style>
        ul li{
            float: left;
            margin-left: 20px;
            list-style: none;
            color: orange;
        }
    </style>
</head>
<body>
<form action="{{url('study/create')}}" method="get" accept-charset="utf-8">

    <input type="text" name="username" placeholder="请输入搜索内容" />
    <input type="submit" value="搜索"/>
</form>
<table class="table" border=1>
    <tr>
        <td>id</td>
        <td>学生姓名</td>
        <td>学生性别</td>

        <td>学生班级</td>
        <td>成绩</td>

        <td>操作</td>

    </tr>
    @foreach($res as $k=>$v)
    <tr >
        <td>{{$v->s_id}}</td>
        <td>{{$v->username}}</td>
        <td>{{$v->sex}}</td>
        <td>{{$v->c_id}}</td>

        <td>{{$v->cheng}}</td>


        <td>
        <a href="{{url('/study/edit/'.$v->s_id)}}">编辑</a>
            <a href="{{url('study/destroy/'.$v->s_id)}}">删除</a>
        </td>
    </tr>
    @endforeach




</table>
<tr><td colspan="7">{{$res->appends(['username'=>$username])->links()}}</td></tr>

</body>
</html>