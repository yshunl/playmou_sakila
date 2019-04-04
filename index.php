<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="sidebar.css">
        <link rel="stylesheet" href="style.css">


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
            <a href="#menu-toggle" class="btn btn-default bounceInDown" id="menu-toggle">Database</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

 

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
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