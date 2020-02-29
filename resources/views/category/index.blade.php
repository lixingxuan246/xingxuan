<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 水平表单</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>

<!-- <meta name="csrf-token" content="{{csrf_token()}}"> -->

</head>
<body>

<form action="{{url('/category/store')}}" method="post" class="form-horizontal"  role="form" enctype="multipart/form-data">

<!-- @if ($errors->any()) <div class="alert alert-danger"> <ul>
@foreach ($errors->all() as $error)<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
 -->


@csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">文章标题</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="cate_name"
                   placeholder="请输入标题">

        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">分类</label>
        <div class="col-sm-10">

            <select name="parent_id" >


                        <option value="0">--请选择--</option>

                        @foreach($data as $v)
                        <option value="{{$v->c_id}}">{{str_repeat('|__',$v->level)}}{{$v->cate_name}}</option>
                        @endforeach


                    </select>



        </div>

    </div>











       <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">描述</label>
        <div class="col-sm-10">
        <textarea name="desc"></textarea>
        </div>
    </div>



    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-default" value="确定">
        </div>
    </div>
</form>

</body>
</html>
