<?php
    include_once('dbconfig.php');
    $city = $_REQUEST['city_id'];
    $sql="DELETE FROM city WHERE city_id='$city_id'";
    $result = $conn->query($sql);
	echo "<meta http-equiv='refresh' content='0;url=select_city.php'>";
?>