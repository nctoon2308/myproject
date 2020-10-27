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
<form action="">
    <table>
        <caption><b>Thêm Thành Viên</b></caption>
        <tr>
            <td>Họ Tên</td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td>Điện Thoại</td>
            <td><input type="number" name="phone" id="phone"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" id="email"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td>
                <select name="province" id="province"></select>
                <select name="district" id="district"></select>
                <select name="ward" id="ward"></select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Thêm"></td>
        </tr>
    </table>
</form>

</body>
</html>
