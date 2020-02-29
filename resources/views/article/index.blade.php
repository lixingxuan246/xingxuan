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

<form action="{{url('article/store')}}" method="post" class="form-horizontal"  role="form" enctype="multipart/form-data">

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
            <input type="text" class="form-control" id="firstname" name="title"
                   placeholder="请输入标题">
                   <b style="color:red">{{$errors->first('title')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">分类</label>
        <div class="col-sm-10">

            <select name="type" >

                        <option value="3G咨询">3G咨询</option>
                        <option value="手机促销">手机促销</option>
                        <option value="站内快讯">站内快讯</option>



                    </select>
                   <b style="color:red">{{$errors->first('type')}}</b>


        </div>

    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">文章重要性</label>
        <div class="col-sm-10">
            <input type="radio" name="sig" value="普通">普通
            <input type="radio" name="sig" value="置顶">置顶
  <b style="color:red">{{$errors->first('sig')}}</b>
        </div>
    </div>




    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否显示</label>
        <div class="col-sm-10">
                       <input type="radio" name="show" value="显示">显示
            <input type="radio" name="show" value="不显示">不显示
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">文章作者</label>
        <div class="col-sm-10">
                     <input type="text" name="writer">
                      <b style="color:red">{{$errors->first('writer')}}</b>
        </div>
    </div>

        <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">email</label>
        <div class="col-sm-10">
                 <input type="text" name="email">
        </div>
    </div>

   <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">关键字</label>
        <div class="col-sm-10">
                 <input type="text" name="keyword">
        </div>
    </div>

       <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">描述</label>
        <div class="col-sm-10">
        <textarea name="desc"></textarea>
        </div>
    </div>

     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">上传文件</label>
        <div class="col-sm-10">
        <input type="file" name="a_img">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="button" class="btn btn-default" value="确定">
        </div>
    </div>
</form>
<script>
$.ajaxSetup({ headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});

$('input[type="button"]').click(function(){
    var titleflay=true;
     $('input[name="title"]').next().html('');
        var title = $('input[name="title"]').val()
        var reg = /^[\u4e00-\u9fa50-9A-Za-z_]+$/;
        if(!reg.test(title)){
            $('input[name="title"]').next().html("文章标题由中文字母数字组成且不能为空")
            return;
        }
        //验证唯一性
        $.ajax({
            type:'post',
            url:"article/checkOnly",
            data:{title:title},
            dataType:'json',
            success:function(result){
                // alert(result)
                // alert(result.count)
                if(result.count>0){
                    $('input[name="title"]').next().html('标题已存在');
                    titleflay=false;
                }
            }

        })
    if(!titleflay){
        return;
    }


    var writer = $('input[name="writer"]').val();
    var reg = /^[\u4e00-\u9fa50-9A-Za-z_]{2,8}$/;
    if(!reg.test(writer)){
        $('input[name="writer"]').next().html('文章作者由中文字母数字组成且不能为空，长度2-8位');
        return;
    }



    $('form').submit();

})

$('input[name="writer"]').blur(function(){
    $(this).next().html('');
    var writer = $(this).val();
    var reg = /^[\u4e00-\u9fa50-9A-Za-z_]{2,8}$/;
    if(!reg.test(writer)){
        $(this).next().html('文章作者由中文字母数字组成且不能为空，长度2-8位');
        return;
    }
})


    $('input[name="title"]').blur(function(){
        $(this).next().html('');
        var title = $(this).val()
        var reg = /^[\u4e00-\u9fa50-9A-Za-z_]+$/;
        if(!reg.test(title)){
            $(this).next().html("文章标题由中文字母数字组成且不能为空")
            return;
        }


        //验证唯一性
        $.ajax({
            type:'post',
            url:"article/checkOnly",
            data:{title:title},
            dataType:'json',
            success:function(result){
                // alert(result)
                // alert(result.count)
                if(result.count>0){
                    $('input[name="title"]').next().html('标题已存在');
                }
            }

        })

    })



</script>
</body>
</html>