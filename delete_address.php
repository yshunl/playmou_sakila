<?php
    include_once('dbconfig.php');
    $address_id = $_REQUEST['address_id'];
    $sql="DELETE FROM address WHERE address_id='$address_id'";
    $result = $conn->query($sql);
	echo "<meta http-equiv='refresh' content='0;url=select_address.php'>";
?>