<?php
    include "sidebar.php";
    include 'dbconfig.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <?php
    $rowperpage = 50;
    $row = 0;
    // Previous Button
    if(isset($_POST['but_prev'])) {
        $row = $_POST['row'];
        $row -= $rowperpage;
        if($row < 0) {
            $row = 0;
        }
    }
    // Next Button
    if(isset($_POST['but_next'])){
        $row = $_POST['row'];
        $allcount = $_POST['allcount'];
        $val = $row + $rowperpage;
        if( $val < $allcount ){
            $row = $val;
        }
    }
    ?>
</head>

</head>
<body>
<div class="content">
    <br>
    <div class="center hideform">
        <button id="close" style="float:right;">X</button>
        <form action="update_store.php" method="POST">
            <h4><b>Update Store</b></h4><hr>
            Store ID To Update: <input type="number" name="rental_id"><br><br>
            Manager Staff ID: <input type="number" name="manager_staff_id"><br><br>
            Address ID: <input type="number" name="address_id"><br><br>
            <input type="submit" name="update" value="Update">
        </form>
        <form action="delete_store.php" method="POST">
            <h4><b>Delete Store</b></h4><hr>
            Store ID To Delete: <input type="number" name="store_id"><br><br>
            <input type="submit" name="delete" value="Delete">
        </form>
        <form action="insert_store.php" method="POST">
            <h4><b>Insert New Store</b></h4><hr>
            Manager Staff ID: <input type="number" name="manager_staff_id"><br><br>
            Address ID: <input type="number" name="address_id"><br><br>
            <input type="submit" name="insert" value="Insert">
        </form>
    </div>
    <button id="show">Edit Store</button><br><br>
    <table id="_table" width="100%">
        <tr>
            <th>Store ID</th>
            <th>Manager Staff ID</th>
            <th>Address ID</th>
            <th>Last Update</th>
        </tr>
        <?php
            // count total number of rows
            $sql = "SELECT COUNT(*) AS cntrows FROM store";
            $result = $conn->query($sql);
            $fetchresult = $result->fetch_array();
            $allcount = $fetchresult['cntrows'];
            $sql = "SELECT * FROM store ORDER BY store_id ASC limit $row,".$rowperpage; // Selecting rows
            $result = $conn->query($sql);
            while($fetch = $result->fetch_array()) {
                $store_id = $fetch['store_id'];
                $manager_staff_id = $fetch['manager_staff_id'];
                $address_id = $fetch['address_id'];
                $last_update = $fetch['last_update'];
        ?>
        <tr>
            <td align="center"><?php echo $store_id; ?></td>
            <td align="center"><?php echo $manager_staff_id; ?></td>
            <td align="center"><?php echo $address_id; ?></td>
            <td align="center"><?php echo $last_update; ?></td>
        </tr>
        <?php
            }
        ?>
        </table>
        
        <form method="post" action="">
        <div id="div_pagination">
            <input type="hidden" name="row" value="<?php echo $row; ?>">
            <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
            <input type="submit" class="button" name="but_prev" value="Previous">
            <input type="submit" class="button" name="but_next" value="Next">
        </div>
    </form>


</div>
</div>
</body>
</html>

<script>
    $('#show').on('click',function(){
        $('.center').show();
        $(this).hide();
    })
    $('#close').on('click',function(){
        $('.center').hide();
        $('#show').show();
    })
</script>