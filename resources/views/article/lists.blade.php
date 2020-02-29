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