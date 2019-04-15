<!DOCTYPE html>
<html>
    <body>

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a href="index.php">
                        Home
                    </a>
        </li>
        <li>
        <a href="actor.php">Actor</a>
        </li>
        <li>
        <a href="address.php">Address</a>
        </li>
        <li>
        <a href="category.php">Category</a>
        </li>
        <li>
        <a href="city.php">City</a>
        </li>
        <li>
        <a href="country.php">Country</a>
        </li>
        <li>
        <a href="customer.php">Customer</a>
        </li>
        <li>
        <a href="film.php">Film</a>
        </li>
         <li>
        <a href="film_actor.php">Film Actor</a>
        </li>
         <li>
        <a href="film_category.php">Film Category</a>
        </li>
         <li>
        <a href="film_text.php">Film Text</a>
        </li>
         <li>
        <a href="inventory.php">Inventory</a>
        </li>
         <li>
        <a href="language.php">Language</a>
        </li>
         <li>
        <a href="payment.php">Payment</a>            
        </li>
        <li>
        <a href="rental.php">Rental</a>
        </li>
        <li>
        <a href="staff.php">Staff</a>
        </li>
        <li>
        <a href="store.php">Store</a>
        </li>
        <!--<li>-->
        <!--<a href="dropDownSearch.php">Search</a>-->
        <!--</li>-->
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            
            <div class="type-1">
    <a href="#menu-toggle" class="btn-3 btnstyle animated slideInLeft" id="menu-toggle">
      <span class="txt">Database</span>
      <span class="round"><i class="fa fa-chevron-right"></i></span>
    </a>
            </div>
              </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  <!-- /#wrapper -->
      <?php
    // takes in result from mysqli_query($conn, $sql) and returns a table
    // for the SQL query
    // added $table parameter for table class/ id
    // $table can be left empty, will return default table style
    /*function returnTable($result, $table)
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
    }*/
?>

 

  <!-- Bootstrap Core JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
</script>
    </body>
</html>
