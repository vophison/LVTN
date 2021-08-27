<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xác nhận đăng ký tài khoản tại Tiki-Lazada Website</title>
</head>
<body>
    <table>
        <tr><td>Xin chào {{$customer_name}} </td></tr>
        <tr><td>&nbsp; </td></tr>
        <tr><td>Vui lòng click vào đường link bên dưới để đăng ký.<br>
        <tr><td>&nbsp; </td></tr>
        <tr><td><a href="{{URL::to('confirm_register/'.$code)}}">Xác nhận đăng ký</a> </td></tr>
        <tr><td>&nbsp; </td></tr>
        <tr><td>Cảm ơn bạn đã đọc tin !</td></tr>
        <tr><td>Rạp phim Tiki-Lazada </td></tr>

    </table>
</body>
</html>