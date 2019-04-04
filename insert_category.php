<?php

include_once("dbconfig.php");
if(isset($_POST['insert']))
{
    $name = $_POST['name'];
    if($conn->query("INSERT INTO category VALUES (NULL,'$name',CURRENT_TIMESTAMP)")) {
        echo "<meta http-equiv='refresh' content='0;url=select_category.php'>";
    }
}
?>