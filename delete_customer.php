<?php
    include_once('dbconfig.php');
    $customer_id = $_REQUEST['customer_id'];
    $sql="DELETE FROM customer WHERE customer_id='$customer_id'";
    $result = $conn->query($sql);
	echo "<meta http-equiv='refresh' content='0;url=select_customer.php'>";
?>