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
        <td>分类名称</td>
        <td>父分类</td>

        <td>分类描述</td>

        <td>操作</td>

    </tr>
    @foreach($res as $k=>$v)
    <tr >
        <td>{{$v->c_id}}</td>
        <td>{{$v->cate_name}}</td>
        <td>{{str_repeat('|__',$v->level)}}{{$v->parent_id}}</td>

        <td>{{$v->desc}}</td>





        <td>
        <a href="{{url('article/edit/'.$v->c_id)}}">编辑</a>
<a href="javascript:void(0)" onclick="dele({{$v->c_id}})" >删除</a>
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
    $.get('/category/destroy/'+id,function(result){
        if(result.code=='00000'){
            location.reload();
        }
    },'json')
   }
}
</script>





</body>

</html>