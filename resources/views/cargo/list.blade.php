<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <table>
      <tr>
          <td>用户id</td>
          <td>用户名称</td>
          <td>身份</td>
          <td>操作</td>
      </tr>
      @foreach($res as $k=>$v)
      <tr>
          <td>{{$v->l_id}}</td>
          <td>{{$v->username}}</td>
          <td>@if($v->level==1) 超级管理 @endif  @if($v->level==2) 普通管理@endif</td>
          <td><a href="{{url('cargo/'.$v->l_id)}}">添加</a>
          <a href="{{url('cargo/delete')}}">删除</a></td>
      </tr>
      @endforeach
    </table>
</body>
</html>