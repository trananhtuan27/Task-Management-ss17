<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="{{route('customers.store')}}">
    @csrf
    <table>
<tr>
    <td> Nhập tên :<input type="text" name="name"></td>
</tr>
   <tr>
      <td> Nhập ngày tháng năm sinh:  <input type="date" name="bob"></td>
   </tr>
        <tr>
            <td>   Nhập email: <input type="email" name="email"></td>
        </tr>
<tr>
    <td><button type="submit" class="btn btn-primate">Thêm</button></td>
</tr>
    </table>
</form>
</body>
</html>
