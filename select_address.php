<?php
    include 'dbconfig.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="sidebar.css">

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
<body>
     <div id="wrapper" class="toggled">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a href="index.php">
                        Home
                    </a>
        </li>
        <li>
        <a href="select_actor.php">Actor</a>
        </li>
        <li>
        <a href="select_address.php">Address</a>
        </li>
        <li>
        <a href="select_category.php">Category</a>
        </li>
        <li>
        <a href="select_city.php">City</a>
        </li>
        <li>
        <a href="select_country.php">Country</a>
        </li>
        <li>
        <a href="select_customer.php">Customer</a>
        </li>
        <li>
        <a href="select_film.php">Film</a>
        </li>
         <li>
        <a href="select_film_actor.php">Film Actor</a>
        </li>
         <li>
        <a href="select_film_category.php">Film Category</a>
        </li>
         <li>
        <a href="select_film_text.php">Film Text</a>
        </li>
         <li>
        <a href="select_inventory.php">Inventory</a>
        </li>
         <li>
        <a href="select_language.php">Language</a>
        </li>
         <li>
        <a href="select_payment.php">Payment</a>            
        </li>
        <li>
        <a href="select_rental.php">Rental</a>
        </li>
        <li>
        <a href="select_staff.php">Staff</a>
        </li>
        <li>
        <a href="select_store.php">Store</a>
        </li>
        <li>
        <a href="dropDownSearch.php">Search</a>
        </li>
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Database</a>
            
            </div>
        </div>
      </div>
    </div>
    <div id="page-content-wrapper">
              <div class="center hideform">
        <button id="close" style="float:right;">X</button>
        <form action="update_address.php" method="POST">
            <h4><b>Update Address</b></h4><hr>
            Address ID To Update: <input type="number" name="address_id"><br><br>
            New Address: <input type="text" name="address"><br><br>
            New Address 2: <input type="text" name="address_2"><br><br>
            New District: <input type="text" name="district"><br><br>
            New City ID: <input type="number" name="city_id"><br><br>
            New Postal Code: <input type="number" name="postal_code"><br><br>
            New Phone: <input type="text" name="phone"><br><br>
            <input type="submit" name="update" value="Update">
        </form>
    </div>
    <div class="middle hideform">
    <button id="hide" style="float:right;">X</button>
        <form action="delete_address.php" method="POST">
            <h4><b>Delete Address</b></h4><hr>
            Address ID To Delete: <input type="number" name="address_id"><br><br>
            <input type="submit" name="delete" value="Delete">
        </form>
    </div>
    <div class="mid hideform">
        <button id="disappear" style="float:right;">X</button>
        <form action="insert_address.php" method="POST">
            <h4><b>Insert New Address</b></h4><hr>
            Address: <input type="text" name="address"><br><br>
            Address2: <input type="text" name="address2"><br><br>
            District: <input type="text" name="district"><br><br>
            City ID: <input type="text" name="city_id"><br><br>
            Postal Code: <input type="text" name="postal_code"><br><br>
            Phone: <input type="text" name="phone"><br><br>
            <input type="submit" name="insert" value="Insert">
        </form>
    </div>
    <div class="row" style="margin-left:20px;">
        <button class="btn btn-default"id="show">Update</button>
        <button class="btn btn-default"id="open">Delete</button>
        <button class="btn btn-default"id="display">Insert</button>
    </div>
    <br>
    <table id="_table" width="100%">
        <tr>
            <th>Address ID</th>
            <th>Address</th>
            <th>Address2</th>
            <th>District</th>
            <th>City ID</th>
            <th>Postal Code</th>
            <th>Phone</th>
            <th>Last Update</th>
        </tr>
        <?php
            // count total number of rows
            $sql = "SELECT COUNT(*) AS cntrows FROM address";
            $result = $conn->query($sql);
            $fetchresult = $result->fetch_array();
            $allcount = $fetchresult['cntrows'];
            $sql = "SELECT * FROM address ORDER BY address_id ASC limit $row,".$rowperpage; // Selecting rows
            $result = $conn->query($sql);
            while($fetch = $result->fetch_array()) {
                $address_id = $fetch['address_id'];
                $address = $fetch['address'];
                $address2 = $fetch['address2'];
                $district = $fetch['district'];
                $city_id = $fetch['city_id'];
                $postal_code = $fetch['postal_code'];
                $phone = $fetch['phone'];
                $last_update = $fetch['last_update'];
        ?>
        <tr>
            <td align="center"><?php echo $address_id; ?></td>
            <td align="center"><?php echo $address; ?></td>
            <td align="center"><?php echo $address2; ?></td>
            <td align="center"><?php echo $district; ?></td>
            <td align="center"><?php echo $city_id; ?></td>
            <td align="center"><?php echo $postal_code; ?></td>
            <td align="center"><?php echo $phone; ?></td>
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
            <input type="submit" class="btn btn-default" name="but_prev" value="Previous">
            <input type="submit" class="btn btn-default" name="but_next" value="Next">
        </div>
    </form>
    
            <?php
    // takes in result from mysqli_query($conn, $sql) and returns a table
    // for the SQL query
    // added $table parameter for table class/ id
    // $table can be left empty, will return default table style
    function returnTable($result, $table)
    {
        $col = array_keys($result->fetch_assoc());
    
        echo "<table id=\"$table\">";
        echo "<tr>";
        foreach ($col as $i => $colName)
        {
            echo "<th>".ucfirst($colName)."</th>";
        }
        echo "</tr>";
        $result->data_seek(0);
        while ($row = $result->fetch_object())
        {
            echo "<tr>";  
            foreach ($row as $i => $data)
            {
                echo "<td>$data</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
?>

    
        
    </div>
    <!-- /#page-content-wrapper -->

  </div>

</body>
</html>
<script src="js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
</script>
<script>
    $('#show').on('click',function(){
        $('.center').show();
        $(this).hide();
    })
    $('#close').on('click',function(){
        $('.center').hide();
        $('#show').show();
    })
     $('#open').on('click',function(){
        $('.middle').show();
        $(this).hide();
    })
    $('#hide').on('click',function(){
        $('.middle').hide();
        $('#open').show();
    })
    $('#display').on('click',function(){
        $('.mid').show();
        $(this).hide();
    })
    $('#disappear').on('click',function(){
        $('.mid').hide();
        $('#display').show();
    })
</script>