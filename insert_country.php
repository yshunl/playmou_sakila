<?php

include_once("dbconfig.php");
if(isset($_POST['insert']))
{
    $country = $_POST['country'];
    if($conn->query("INSERT INTO country VALUES (NULL,'$country',CURRENT_TIMESTAMP)")) {
        echo "<meta http-equiv='refresh' content='0;url=select_country.php'>";
    }
}
?>