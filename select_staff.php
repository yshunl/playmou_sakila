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
        <form action="update_staff.php" method="POST">
            <h4><b>Update Staff</b></h4><hr>
            Staff ID To Update: <input type="number" name="payment_id"><br><br>
            First Name: <input type="text" name="first_name"><br><br>
            Last Name: <input type="text" name="last_name"><br><br>
            Address ID: <input type="number" name="address_id"><br><br>
            Email: <input type="text" name="email"><br><br>
            Store ID: <input type="number" name="store_id"><br><br>
            Active: <input type="number" name="active"><br><br>
            Username: <input type="text" name="username"><br><br>
            Password: <input type="text" name="password"><br><br>
            <input type="submit" name="update" value="Update">
        </form>
        <form action="delete_staff.php" method="POST">
            <h4><b>Delete Staff</b></h4><hr>
            Staff ID To Delete: <input type="number" name="staff_id"><br><br>
            <input type="submit" name="delete" value="Delete">
        </form>
        <form action="insert_staff.php" method="POST">
            <h4><b>Insert New Staff</b></h4><hr>
            First Name: <input type="text" name="first_name"><br><br>
            Last Name: <input type="text" name="last_name"><br><br>
            Address ID: <input type="number" name="address_id"><br><br>
            Email: <input type="text" name="email"><br><br>
            Store ID: <input type="number" name="store_id"><br><br>
            Active: <input type="number" name="active"><br><br>
            Username: <input type="text" name="username"><br><br>
            Password: <input type="text" name="password"><br><br>
            <input type="submit" name="insert" value="Insert">
        </form>
    </div>
    <button id="show">Edit Staff</button><br><br>
    <table id="_table" width="100%">
        <tr>
            <th>Staff ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address ID</th>
            <th>Email</th>
            <th>Store ID</th>
            <th>Active</th>
            <th>Username</th>
            <th>Password</th>
            <th>Last Update</th>
        </tr>
        <?php
            // count total number of rows
            $sql = "SELECT COUNT(*) AS cntrows FROM staff";
            $result = $conn->query($sql);
            $fetchresult = $result->fetch_array();
            $allcount = $fetchresult['cntrows'];
            $sql = "SELECT * FROM staff ORDER BY staff_id ASC limit $row,".$rowperpage; // Selecting rows
            $result = $conn->query($sql);
            while($fetch = $result->fetch_array()) {
                $staff_id = $fetch['staff_id'];
                $first_name = $fetch['first_name'];
                $last_name = $fetch['last_name'];
                $address_id = $fetch['address_id'];
                $email = $fetch['email'];
                $store_id = $fetch['store_id'];
                $active = $fetch['active'];
                $username = $fetch['username'];
                $password = $fetch['password'];
                $last_update = $fetch['last_update'];
        ?>
        <tr>
            <td align="center"><?php echo $staff_id; ?></td>
            <td align="center"><?php echo $first_name; ?></td>
            <td align="center"><?php echo $last_name; ?></td>
            <td align="center"><?php echo $address_id; ?></td>
            <td align="center"><?php echo $email; ?></td>
            <td align="center"><?php echo $store_id; ?></td>
            <td align="center"><?php echo active; ?></td>
            <td align="center"><?php echo $username; ?></td>
            <td align="center"><?php echo $password; ?></td>
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