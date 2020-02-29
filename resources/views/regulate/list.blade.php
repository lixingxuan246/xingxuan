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
<form action="{{url('regulate/index')}}" method="get" accept-charset="utf-8">
    <input type="text" name="regu_name" placeholder="请输入搜索内容" />
    <!-- <input type="text" name="" placeholder="请搜索"/> -->
    <input type="submit" value="搜索"/>
</form>
<table class="table" border=1>
    <tr>
        <td>id</td>
        <td>商品名称</td>
        <td>品牌</td>
        <td>商品货号</td>
        <td>商品价格</td>
        <td>商品库存</td>
        <td>是否精品</td>
        <td>是否热销</td>
        <td>商品详情</td>

        <td>商品照片</td>

        <td>操作</td>

    </tr>
    @foreach($res as $k=>$v)
    <tr >
        <td>{{$v->r_id}}</td>
        <td>{{$v->regu_name}}</td>
        <td>{{$v->b_name}}</td>
        <td>{{$v->numbers}}</td>
        <td>{{$v->regu_price}}</td>
        <td>{{$v->inventory}}</td>
        <td>{{$v->is_jing}}</td>
        <td>{{$v->is_xiao}}</td>
        <td>{{$v->regu_desc}}</td>

     <!--    <td><img src="{{env('UPLOAD_URL')}}{{$v->regu_img}}" width="40" height="40"></td> -->
<td>
    @if($v->regu_img)
    @php $photo = explode('|',$v->regu_img);@endphp
    @foreach($photo as $vv)
    <img src="{{env('UPLOAD_URL')}}{{$vv}}"  width="40" height="40"/>
    @endforeach
    @endif
</td>
        <td>{{$v->desc}}</td>





        <td>
        <a href="{{url('article/edit/'.$v->c_id)}}">编辑</a>
<a href="javascript:void(0)" onclick="dele({{$v->r_id}})" >删除</a>
        </td>
    </tr>
    @endforeach




</table>
<tr><td colspan="7">{{$res->appends(['regu_name'=>$regu_name])->links()}}</td></tr>
<!-- <script src="static/js/jquery.min.js"></script> -->
<script>
   function dele(id){
    if(!id){
        return;
    }
   if(confirm('是否要删除此条记录')){
    // alert(1)
    // ajax删除
    $.get('/regulate/destroy/'+id,function(result){
        if(result.code=='00000'){
            location.reload();
        }
    },'json')
   }
}
</script>





</body>

</html>