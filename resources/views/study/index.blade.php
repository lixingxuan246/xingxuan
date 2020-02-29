<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <form action="{{url('study/insert')}}" method="post" accept-charset="utf-8">
@csrf
        <table>
                <tr>
                    <td>学生姓名</td>
                    <td><input type="text" name="username"><b style="color:red">{{$errors->first('username')}}</b></td>

                </tr>
                <tr>
                    <td>学生性别</td>
                    <td><input type="radio" name="sex" value="男"/>男
<input type="radio" name="sex" value="女"/>女
                    </td>
                    </td>

                </tr>
                <tr>
                    <td>班级</td>
                    <td><select name="c_id" >
                    @foreach($res as $k=>$v)
                        <option value="{{$v->c_id}}">{{$v->c_name}}</option>
                        @endforeach
                    </select>
                        <!-- <input type="text" name="c_id"> -->
                    </td>
                </tr>
                <tr>
                    <td>成绩</td>
                    <td><input type="text" name="cheng"/> <b style="color:red">{{$errors->first('cheng')}}</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="添加"></td>
                </tr>

        </table>
    </form>
</body>
</html>