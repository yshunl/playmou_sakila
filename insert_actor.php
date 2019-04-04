<?php

include_once("dbconfig.php");
if(isset($_POST['insert']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    if($conn->query("INSERT INTO actor VALUES (NULL,'$first_name','$last_name',CURRENT_TIMESTAMP)")) {
        echo "<meta http-equiv='refresh' content='0;url=select_actor.php'>";
    }
}
?>