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
        <form action="update_rental.php" method="POST">
            <h4><b>Update Rental</b></h4><hr>
            Rental ID To Update: <input type="number" name="rental_id"><br><br>
            Rental Date: <input type="text" name="rental_date"><br><br>
            Inventory ID: <input type="number" name="inventory_id"><br><br>
            Customer ID: <input type="number" name="customer_id"><br><br>
            Return Date: <input type="text" name="return_date"><br><br>
            Staff ID: <input type="number" name="staff_id"><br><br>
            <input type="submit" name="update" value="Update">
        </form>
        <form action="delete_rental.php" method="POST">
            <h4><b>Delete Rental</b></h4><hr>
            Rental ID To Delete: <input type="number" name="rental_id"><br><br>
            <input type="submit" name="delete" value="Delete">
        </form>
        <form action="insert_rental.php" method="POST">
            <h4><b>Insert New Rental</b></h4><hr>
            Rental Date: <input type="text" name="rental_date"><br><br>
            Inventory ID: <input type="number" name="inventory_id"><br><br>
            Customer ID: <input type="number" name="customer_id"><br><br>
            Return Date: <input type="text" name="return_date"><br><br>
            Staff ID: <input type="number" name="staff_id"><br><br>
            <input type="submit" name="insert" value="Insert">
        </form>
    </div>
    <button id="show">Edit Rental</button><br><br>
    <table id="_table" width="100%">
        <tr>
            <th>Rental ID</th>
            <th>Rental Date</th>
            <th>Inventory ID</th>
            <th>Customer ID</th>
            <th>Return Date</th>
            <th>Staff ID</th>
            <th>Last Update</th>
        </tr>
        <?php
            // count total number of rows
            $sql = "SELECT COUNT(*) AS cntrows FROM rental";
            $result = $conn->query($sql);
            $fetchresult = $result->fetch_array();
            $allcount = $fetchresult['cntrows'];
            $sql = "SELECT * FROM rental ORDER BY rental_id ASC limit $row,".$rowperpage; // Selecting rows
            $result = $conn->query($sql);
            while($fetch = $result->fetch_array()) {
                $rental_id = $fetch['rental_id'];
                $rental_date = $fetch['rental_date'];
                $inventory_id = $fetch['inventory_id'];
                $customer_id = $fetch['customer_id'];
                $return_date = $fetch['return_date'];
                $staff_id = $fetch['staff_id'];
                $last_update = $fetch['last_update'];
        ?>
        <tr>
            <td align="center"><?php echo $rental_id; ?></td>
            <td align="center"><?php echo $rental_date; ?></td>
            <td align="center"><?php echo $inventory_id; ?></td>
            <td align="center"><?php echo $customer_id; ?></td>
            <td align="center"><?php echo $return_date; ?></td>
            <td align="center"><?php echo $staff_id; ?></td>
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