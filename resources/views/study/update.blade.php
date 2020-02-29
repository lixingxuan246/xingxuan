<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <form action="{{url('/study/update/'.$res->s_id)}}" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
@csrf
        <table>
                <tr>
                    <td>学生姓名</td>
                    <td><input type="text" name="username" value="{{$res->username}}"><b style="color:red">{{$errors->first('username')}}</b></td>
                </tr>
                <tr>
                    <td>学生姓别</td>
                    <td><input type="radio" name="sex" value="男" @if($res->sex=='男') checked @endif/>男
<input type="radio" name="sex" value="女" @if($res->sex=='女') checked @endif/>女
                    </td>
                </tr>
                <tr>
                    <td>学生班级</td>
                    <td><select name="c_id" >
                    @foreach($data as $k=>$v)
                        <option value="{{$v->c_id}}">{{$v->c_name}}</option>
                        @endforeach
                    </select></td>
                </tr>
                <tr>
                    <td>学生成绩</td>
                    <td><input type="text" name="cheng"  value="{{$res->cheng}}"/><b style="color:red">{{$errors->first('cheng')}}</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="编辑"></td>
                </tr>

        </table>
    </form>
</body>
</html>