<?php
    include_once('dbconfig.php');
    $inventory_id = $_REQUEST['inventory_id'];
    $sql="DELETE FROM inventory WHERE inventory_id='$inventory_id'";
    $result = $conn->query($sql);
	echo "<meta http-equiv='refresh' content='0;url=select_inventory.php'>";
?>