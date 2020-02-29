<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 水平表单</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>

<meta name="csrf-token" content="{{csrf_token()}}">

</head>
<body>

<form action="{{url('regulate/store')}}" method="post" class="form-horizontal"  role="form" enctype="multipart/form-data">

<!-- @if ($errors->any()) <div class="alert alert-danger"> <ul>
@foreach ($errors->all() as $error)<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
 -->


@csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品名字</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="regu_name"
                   placeholder="请输入名字">
                   <b style="color:red">{{$errors->first('regu_name')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">品牌
        </label>
        <div class="col-sm-10">

            <select name="b_id" >
<option value="0">--请选择--</option>}

        @foreach($data as $k=>$v)
                        <option value="{{$v->b_id}}">{{$v->b_name}}</option>
        @endforeach


                    </select>
                   <!-- <b style="color:red">{{$errors->first('type')}}</b> -->


        </div>

    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品价格</label>
        <div class="col-sm-10">
            <input type="text" name="regu_price">

  <b style="color:red">{{$errors->first('regu_price')}}</b>
        </div>
    </div>




    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品库存</label>
        <div class="col-sm-10">
                       <input type="text" name="inventory" >

        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否精品</label>
        <div class="col-sm-10">
                     <!-- <input type="text" name="is_jing"> -->
                     <input type="radio" name="is_jing" value="是"/>是
                     <input type="radio" name="is_jing" value="否"/>否

                    <!--   <b style="color:red">{{$errors->first('writer')}}</b> -->
        </div>
    </div>

        <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">
        是否热销</label>
        <div class="col-sm-10">
                 <input type="radio" name="is_xiao" value="是"/>是
                     <input type="radio" name="is_xiao" value="否"/>否

        </div>
    </div>

   <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品详情</label>
        <div class="col-sm-10">
        <textarea name="regu_desc"></textarea>

        </div>
    </div>

     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品照片</label>
        <div class="col-sm-10">
        <input type="file" name="regu_img[]" multiple="multiple">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-default" value="确定">
        </div>
    </div>
</form>
<script>
$.ajaxSetup({ headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});

    $('input[name="regu_name"]').blur(function(){
         $(this).next().html('');
    var regu_name = $(this).val();
    var reg = /^[\u4e00-\u9fa50-9A-Za-z_]{2,8}$/;
    if(!reg.test(regu_name)){
        $(this).next().html('商品名称由中文字母数字组成且不能为空，长度2-8位');
        return;
    }
    })

    $('input[name="regu_price"]').blur(function(){
             $(this).next().html('');
    var regu_name = $(this).val();
    var reg = /^[0-9]{2,8}$/;
    if(!reg.test(regu_name)){
        $(this).next().html('价格必须是数字，2-8位');
        return;
    }
    })

</script>
</body>
</html>