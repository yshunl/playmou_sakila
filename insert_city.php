<?php

include_once("dbconfig.php");
if(isset($_POST['insert']))
{
    $city = $_POST['city'];
    $country_id = $_POST['country_id'];
    if($conn->query("INSERT INTO city VALUES (NULL,'$city','$country_id',CURRENT_TIMESTAMP)")) {
        echo "<meta http-equiv='refresh' content='0;url=select_city.php'>";
    }
}
?>