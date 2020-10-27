<?php
function load_province()
{
    $conn = mysqli_connect("localhost", "root", "", "location");
    $output = '';
    $sql1 = "SELECT * FROM nv4_vi_location_province ORDER BY alias";
    $r1 = mysqli_query($conn,$sql1);
    while ($row1 = mysqli_fetch_array($r1)){
        $output .= '<option value="'.$row1["id"].'">'.$row1["title"].'</option>';
    }
    return $output;
}

$conn = mysqli_connect("localhost", "root", "", "location");
$nameErr = $phoneErr = $emailErr = $provinceErr = $districtErr = $wardErr ='';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["name"])){
            $nameErr = "Nhập tên của bạn.";
        } else{
            $name = ($_POST["name"]);
        }

        if(empty($_POST["phone"])){
            $phoneErr = "Nhập số điện thoại của bạn.";
        } else{
            $phone = ($_POST["phone"]);
        }

        if(empty($_POST["email"])){
            $emailErr = "Nhập email của bạn.";
        } else{
            $email = ($_POST["email"]);
        }

        if(empty($_POST["province"])){
            $provinceErr = "Nhập province của bạn.";
        } else{
            $province = ($_POST["province"]);
        }

        if(empty($_POST["district"])){
            $districtErr = "Nhập quận huyện của bạn.";
        } else{
            $district = ($_POST["district"]);
        }

        if(empty($_POST["ward"])){
            $wardErr = "Nhập phường xã của bạn.";
        } else{
            $ward = ($_POST["ward"]);
        }
    }


    $sql = "INSERT INTO user ( name, phone, email, id_district, id_province, id_ward) VALUES ('$name', '$phone', '$email', '$province', '$district', '$ward')";
    mysqli_query($conn,$sql);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="jquery.js"></script>
</head>
<body>
<form action="" method="post">
    <table>
        <caption><b>Thêm Thành Viên</b></caption>
        <tr>
            <td>Họ Tên</td>
            <td>
                <input type="text" name="name" id="name">
                <td style="color: red"><?php echo $nameErr;?></td>
            </td>
        </tr>
        <tr>
            <td>Điện Thoại</td>
            <td><input type="number" name="phone" id="phone"></td>
            <td style="color: red"><?php echo $phoneErr;?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" id="email"></td>
            <td style="color: red"><?php echo $emailErr;?></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td>
                <select onchange="province_id()" name="province" id="province">
                    <?php echo load_province(); ?>
                </select>
                <select onchange="district_id()" name="district" id="district">

                </select>
                <select name="ward" id="ward">

                </select>
            </td>
            <td style="color: red"><?php echo $provinceErr;?></td>
            <td style="color: red"><?php echo $districtErr;?></td>
            <td style="color: red"><?php echo $wardErr;?></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Thêm"></td>
        </tr>
    </table>
</form>

</body>
</html>


<script>

    function province_id() {
        var idprovince = document.getElementById('province').value;
        return idprovince;
    }
    $(document).ready(function () {
        $('#province').change(function () {
            var idprovince = province_id();
            $.ajax({
                url:"fetch_district.php",
                method:"POST",
                data:{provinceId:idprovince},
                dataType:"text",
                success:function (r) {
                    $('#district').html(r);
                }
            });
        });
    });
</script>

<script>

    function district_id() {
        var iddistrict = document.getElementById('district').value;
        return iddistrict;
    }
    $(document).ready(function () {
        $('#district').change(function () {
            var iddistrict = district_id();
            $.ajax({
                url:"fetch_ward.php",
                method:"POST",
                data:{districtId:iddistrict},
                dataType:"text",
                success:function (r) {
                    $('#ward').html(r);
                }
            });
        });
    });
</script>
