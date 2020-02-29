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
<form action="{{url('article/create')}}" method="get" accept-charset="utf-8">
    <input type="text" name="title" placeholder="请输入搜索内容" />
    <input type="text" name="type" placeholder="请搜索"/>
    <input type="submit" value="搜索"/>
</form>
<table class="table" border=1>
    <tr>
        <td>id</td>
        <td>管理员账号</td>
        <td>密码</td>

        <td>头像</td>

        <td>手机号</td>



        <td>操作</td>

    </tr>
    @foreach($res as $k=>$v)
    <tr >
        <td>{{$v->m_id}}</td>
        <td>{{$v->mana_name}}</td>
        <td>{{$v->pwd}}</td>
        <td><img src="{{env('UPLOAD_URL')}}{{$v->mana_img}}"  width="40" height="40"/></td>


        <td>{{$v->shou}}</td>





        <td>
        <a href="{{url('manage/edit/'.$v->m_id)}}">编辑</a>
<a href="javascript:void(0)" onclick="dele({{$v->a_id}})" >删除</a>
        </td>
    </tr>
    @endforeach




</table>
<!-- <script src="static/js/jquery.min.js"></script> -->
<script>
   function dele(id){
    if(!id){
        return;
    }
   if(confirm('是否要删除此条记录')){
    // alert(1)
    // ajax删除
    $.get('/article/destroy/'+id,function(result){
        if(result.code=='00000'){
            location.reload();
        }
    },'json')
   }
}
</script>


<tr><td colspan="7">{{$res->links()}}</td></tr>



</body>

</html>