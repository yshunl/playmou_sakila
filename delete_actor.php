<?php
    include_once('dbconfig.php');
    $actor_id = $_REQUEST['actor_id'];
    $sql="DELETE FROM actor WHERE actor_id='$actor_id'";
    $result = $conn->query($sql);
    echo "<meta http-equiv='refresh' content='0;url=select_actor.php'>";
?>