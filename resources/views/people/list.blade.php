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
<form action="{{url('people/create')}}" method="get" accept-charset="utf-8">
    <input type="text" name="username" placeholder="请输入搜索内容" />
    <input type="submit" value="搜索"/>
</form>
<table class="table" border=1>
    <tr>
        <td>id</td>
        <td>名字</td>
        <td>年龄</td>

        <td>时间</td>
        <td>是否接触武汉</td>
         <td>头像</td>
        <td>操作</td>

    </tr>
    @foreach($data as $k=>$v)
    <tr @if($k%2==0) class="active" @else class="success" @endif>
        <td>{{$v->p_id}}</td>
        <td>{{$v->username}}</td>
        <td>{{$v->age}}</td>
        <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
        <td>{{$v->is_hubei==1?"√":"×"}}</td>
        <td><img src="{{env('UPLOAD_URL')}}{{$v->head}}" width="40" height="40"></td>
        <td><a href="{{url('people/edit/'.$v->p_id)}}">编辑</a>
            <a href="{{url('people/destroy/'.$v->p_id)}}">删除</a>
        </td>
    </tr>
    @endforeach




</table>
<tr><td colspan="7">{{$data->appends(['username'=>$username])->links()}}</td></tr>
</body>
</html>