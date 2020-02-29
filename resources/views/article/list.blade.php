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
        <td>文章标题</td>
        <td>分类</td>

        <td>文章重要性</td>

        <td>是否显示</td>
        <td>文章作者</td>
         <td>email</td>
         <td>关键字</td>
         <td>描述</td>
         <td>图片</td>


        <td>操作</td>

    </tr>
    @foreach($res as $k=>$v)
    <tr @if($k%2==0) class="active" @else class="success" @endif>
        <td>{{$v->a_id}}</td>
        <td>{{$v->title}}</td>
        <td>{{$v->type}}</td>
        <td>{{$v->sig}}</td>
        <td>{{$v->show=="显示"?"√":"×"}}</td>
        <td>{{$v->writer}}</td>
        <td>{{$v->email}}</td>
        <td>{{$v->keyword}}</td>
        <td>{{$v->desc}}</td>




        <td><img src="{{env('UPLOAD_URL')}}{{$v->a_img}}" width="40" height="40"></td>
        <td>
        <a href="{{url('article/edit/'.$v->a_id)}}">编辑</a>
<a href="javascript:void(0)" onclick="dele({{$v->a_id}})" >删除</a>
        </td>
    </tr>
    @endforeach




</table>
<!-- <script src="static/js/jquery.min.js"></script> -->
<script>
//ajax分页
 $(document).on('click','.pagination a',function(){   //绑定事件
    var url = $(this).attr('href');
    if(!url){
        return;
    }
    $.get(url,function(result){
        $('table').html(result);
    });
    return false;
 })



//ajax删除
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


<tr><td colspan="4">{{$res->appends(['title'=>$title,'type'=>$type])->links()}}</td></tr>



</body>



</html>