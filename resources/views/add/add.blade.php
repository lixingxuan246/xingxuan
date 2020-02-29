<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <form action="{{route('do')}}" method="post" accept-charset="utf-8">
    @csrf
        <input type="text" name="name">
        <input type="text" name="pwd">
        <input type="submit" value="添加"/>

    </form>
</body>
</html>