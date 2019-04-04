<?php

include_once("dbconfig.php");
if(isset($_POST['insert']))
{
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $district = $_POST['district'];
    $city_id = $_POST['city_id'];
    $postal_code = $_POST['postal_code'];
    $phone = $_POST['phone'];
    if($conn->query("INSERT INTO address VALUES (NULL,'$address','$address2','$district','$city_id','$postal_code','$phone',CURRENT_TIMESTAMP)")) {
        echo "<meta http-equiv='refresh' content='0;url=select_address.php'>";
    }
}
?>