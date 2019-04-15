<?php
require_once 'dbconfig.php';
?>

<!DOCTYPE html>
<html>
    <?php include_once 'head.php'; ?>
    
    <body>
        <div class="foo animated fadeIn">
            <span class="letter" data-letter="S">S</span>
            <span class="letter" data-letter="A">A</span>
            <span class="letter" data-letter="K">K</span>
            <span class="letter" data-letter="I">I</span>
            <span class="letter" data-letter="L">L</span>
            <span class="letter" data-letter="A">A</span>
        </div>
        
        <div class="container-fluid animated fadeIn ">
            <div class="row row1">
                <div class="col-sm-3">
                    <a href="actor.php" class="button"><span>Actor</span></a>
					<a href="address.php" class="button"><span>Address</span></a>
					<a href="category.php" class="button"><span>Category</span></a>
					<a href="city.php" class="button"><span>City</span></a>
                </div>
                
                <div class="col-sm-3">
                    <a href="country.php" class="button"><span>Country</span></a>
                    <a href="customer.php" class="button"><span>Customer</span></a>
					<a href="film.php" class="button"><span>Film</span></a>
					<a href="film_actor.php" class="button"><span>Film Actor</span></a>  
                </div>
                
                <div class="col-sm-3">
                    <a href="film_category.php" class="button"><span>Film Category</span></a>
					<a href="film_text.php" class="button"><span>Film Text</span></a>
                    <a href="inventory.php" class="button"><span>Inventory</span></a>
					<a href="language.php" class="button"><span>Language</span></a>
                </div>
                
                <div class="col-sm-3">
					<a href="payment.php" class="button"><span>Payment</span></a>
                    <a href="rental.php" class="button"><span>Rental</span></a>
                    <a href="staff.php" class="button"><span>Staff</span></a>
                    <a href="store.php" class="button"><span>Store</span></a>
                </div>
                
            </div>
        </div>

        
        <?php include_once 'js.php'; ?>
    </body>
   
</html>
