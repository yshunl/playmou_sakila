<?php    
  include_once ("dbconfig.php");
  include_once ("sidebar.php");
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
<div class="content">
<form action="" method="post">    
  <select id="dropDownOption" name="value">         
        <option value="" selected disabled hidden>Select option</option>
        <option value="customer">Customer</option> 
        <option value="film">Film</option> 
        <option value="staff">Staff</option> 
        <option value="storeSales">Sales by store</option> 
        <option value="filmCategorySales">Sales by film category</option> 
        <option value="rental">Rental</option>
    </select>     
<input type="submit" value="search"/>
</form>   


<?php    

if(isset($_POST['value']) && !empty($_POST['value'])) {
    echo "<h1>".ucfirst($_POST['value'])."</h1>";
    $dropDownOption = trim(strip_tags($_POST['value']));

    if (mysqli_connect_errno()) {
        printf("Can't connect: %s\n", mysqli_connect_error());
        exit();
    }

    switch ($dropDownOption)
    {
        case "customer":
            $sql = 
                "SELECT cu.customer_id AS ID, CONCAT(cu.first_name, _utf8' ', cu.last_name) AS name, a.address AS address, a.postal_code AS `zipcode`,
                    a.phone AS phone, cu.email AS email, city.city AS city, country.country AS country, IF(cu.active, _utf8'active',_utf8'') AS notes, cu.store_id AS SID
                FROM customer AS cu JOIN address AS a ON cu.address_id = a.address_id JOIN city ON a.city_id = city.city_id
                    JOIN country ON city.country_id = country.country_id
                ORDER BY customer_id;";
            break;

        case "film":
            $sql = 
                "SELECT film.film_id AS FID, film.title AS title, film.description AS description, category.name AS category, film.rental_rate AS price,
                    film.length AS length, film.rating AS rating, GROUP_CONCAT(CONCAT(CONCAT(UCASE(SUBSTR(actor.first_name,1,1)),
                    LCASE(SUBSTR(actor.first_name,2,LENGTH(actor.first_name))),_utf8' ',CONCAT(UCASE(SUBSTR(actor.last_name,1,1)),
                    LCASE(SUBSTR(actor.last_name,2,LENGTH(actor.last_name)))))) SEPARATOR ', ') AS actors
                FROM category LEFT JOIN film_category ON category.category_id = film_category.category_id LEFT JOIN film ON film_category.film_id = film.film_id
                        JOIN film_actor ON film.film_id = film_actor.film_id
                    JOIN actor ON film_actor.actor_id = actor.actor_id
                GROUP BY film.film_id, category.name;";
            break;

        case "staff":
            $sql = 
                "SELECT s.staff_id AS ID, CONCAT(s.first_name, _utf8' ', s.last_name) AS name, a.address AS address, a.postal_code AS `zip code`, a.phone AS phone,
                    city.city AS city, country.country AS country, s.store_id AS SID
                FROM staff AS s JOIN address AS a ON s.address_id = a.address_id JOIN city ON a.city_id = city.city_id
                    JOIN country ON city.country_id = country.country_id;";
            break;

        case "storeSales":
            $sql = 
                "SELECT CONCAT(c.city, _utf8',', cy.country) AS store, CONCAT(m.first_name, _utf8' ', m.last_name) AS manager
                , SUM(p.amount) AS total_sales
                FROM payment AS p
                INNER JOIN rental AS r ON p.rental_id = r.rental_id
                INNER JOIN inventory AS i ON r.inventory_id = i.inventory_id
                INNER JOIN store AS s ON i.store_id = s.store_id
                INNER JOIN address AS a ON s.address_id = a.address_id
                INNER JOIN city AS c ON a.city_id = c.city_id
                INNER JOIN country AS cy ON c.country_id = cy.country_id
                INNER JOIN staff AS m ON s.manager_staff_id = m.staff_id
                GROUP BY s.store_id
                ORDER BY cy.country, c.city;";
            break;

        case "filmCategorySales":
            $sql = 
                "SELECT c.name AS category, SUM(p.amount) AS total_sales
                FROM payment AS p
                INNER JOIN rental AS r ON p.rental_id = r.rental_id
                INNER JOIN inventory AS i ON r.inventory_id = i.inventory_id
                INNER JOIN film AS f ON i.film_id = f.film_id
                INNER JOIN film_category AS fc ON f.film_id = fc.film_id
                INNER JOIN category AS c ON fc.category_id = c.category_id
                GROUP BY c.name
                ORDER BY total_sales DESC;";
            break;
            
        case "rental":
            $sql =
                "SELECT rental_id AS RentalID, CONCAT(cu.first_name, _utf8' ', cu.last_name) AS name, film.title AS item,  return_date AS dueDate
                FROM rental 
                JOIN inventory ON inventory.inventory_id = rental.inventory_id JOIN customer AS cu ON cu.customer_id = rental.customer_id JOIN film ON film.film_id = inventory.film_id
                ORDER BY RentalID;";
            break;
        
    }

    $result = mysqli_query($conn, $sql);
    
    returnTable($result, "search_table");
    // returnTable($result);
    
    $result->free();

}

?>



</div>

</body>
</html>