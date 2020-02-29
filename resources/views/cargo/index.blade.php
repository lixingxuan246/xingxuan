<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <form action="{{url('cargo/insert')}}" method="post" accept-charset="utf-8">
    @csrf
        <table>
           <tr>
               <td>用户添加</td>
               <td><input type="text" name="username"/></td>
               <td><input type="password" name="pwd"/></td>

           </tr>
           <tr>
               <td></td>
               <td><input type="submit" value="添加"/></td>
           </tr>
        </table>

    </form>
</body>
</html>