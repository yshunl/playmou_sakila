<?php
require_once 'dbconfig.php';
//require 'sidebar.php';
$tableName = basename(filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_STRING), '.php')
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="stylesheet" href="style.css">-->

        <?php
        $rowperpage = 50;
        $row = 0;
        // Previous Button
        if (isset($_POST['but_prev'])) {
            $row = $_POST['row'];
            $row -= $rowperpage;
            if ($row < 0) {
                $row = 0;
            }
        }
        // Next Button
        if (isset($_POST['but_next'])) {
            $row = $_POST['row'];
            $allcount = $_POST['allcount'];
            $val = $row + $rowperpage;
            if ($val < $allcount) {
                $row = $val;
            }
        }
        ?>
    </head>

    <body>
        <table id="<?php echo $tableName ?>">
            <tbody id="headerFilter"></tbody>
            <tbody id="data"></tbody>
        </table>
        <div class="content">
            <br>
            <!--<div class="center hideform">
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
            </div>-->

            <?php
            //echo basename($_SERVER['PHP_SELF'], '.php');
            //returnTable($result1);
            ?>
            <button id="show">Edit Rental</button><br><br>
            <?php
            //$sql = "SELECT * FROM rental ORDER BY rental_id ASC limit $row," . $rowperpage; // Selecting rows
            //$result = mysqli_query($conn, $sql);
            //returnTable($result, '_table');
            ?>
            <form method="post" action="">
                <div id="div_pagination">
                    <input type="hidden" name="row" value="<?php echo $row; ?>">
                    <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
                    <input type="submit" class="button" name="but_prev" value="Previous">
                    <input type="submit" class="button" name="but_next" value="Next">
                </div>
            </form>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" defer>
            $('#show').on('click', function () {
                $('.center').show();
                $(this).hide();
            });
            $('#close').on('click', function () {
                $('.center').hide();
                $('#show').show();
            });
        </script>
        <script type="text/javascript" defer>
            $(document).ready(function () {

                load_header_filter();
                load_data();

                function load_header_filter() {
                    $.ajax({
                        url: "fetch_header_filter.php",
                        method: "POST",
                        data: {
                            tableName: "<?php echo $tableName ?>"
                        },
                        success: function (data) {
                            $("#headerFilter").html(data);
                        }
                    });
                }

                function load_data(query) {
                    $.ajax({
                        url: "fetch_data.php",
                        method: "POST",
                        data: {
                            tableName: "<?php echo $tableName ?>",
                            query: query
                        },
                        success: function (data) {
                            $("#data").html(data);
                        }
                    });
                }

                $("tbody").on("keyup", "input[name='rental_id']", function () {
                    var query = $(this).val();
                    if (query !== "") {
                        load_data(query);
                    } else {
                        load_data();
                    }
                });
            });
        </script>
    </body>
</html>