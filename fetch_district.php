<?php

$conn = mysqli_connect("localhost", "root", "", "location");

$output = '';
$sql = "SELECT * FROM nv4_vi_location_district WHERE idprovince = '".$_POST["provinceId"]."' ORDER BY alias";
$r1 = mysqli_query($conn,$sql);
$output = '<option value="">Chon quan huyen</option>';
while ($row1 = mysqli_fetch_array($r1)){
    $output .= '<option value="'.$row1["id"].'">'.$row1["title"].'</option>';
}
echo $output;

?>