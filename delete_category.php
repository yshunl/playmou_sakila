<?php
    include_once('dbconfig.php');
    $category_id = $_REQUEST['category_id'];
    $sql="DELETE FROM category WHERE category_id='$category_id'";
    $result = $conn->query($sql);
	echo "<meta http-equiv='refresh' content='0;url=select_category.php'>";
?>