<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <form action="{{url('cargo/logindo')}}" method="post" accept-charset="utf-8">
    @csrf
            <input type="text" name="username">
            <input type="password" name="pwd">

            <input type="submit" value="登陆"/>

    </form>
</body>
</html>