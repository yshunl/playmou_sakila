<?php
    include_once('dbconfig.php');
    $country_id = $_REQUEST['country_id'];
    $sql="DELETE FROM country WHERE country_id='$country_id'";
    $result = $conn->query($sql);
	echo "<meta http-equiv='refresh' content='0;url=select_country.php'>";
?>