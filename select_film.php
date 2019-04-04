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
<body>
<div id="page-content-wrapper">
    <div class="container-fluid">
    <div class="row">    
    <div class="col-lg-12">
    <div class="center hideform">
        <button id="close" style="float:right;">X</button>
        <form action="update_film.php" method="POST">
            <h4><b>Update Film</b></h4>
            <hr>
            Film ID To Update: <input type="number" name="film_id"><br><br>
            New Title: <input type="text" name="title"><br><br>
            New Description: <textarea maxlength="500"></textarea>
            New Release Year: <input type="year" name="release_year"><br><br>
            New Language ID: <input type="number" name="language_id"><br><br>
            New Original Language ID: <input type="number" name="original_language_id"><br><br>
            New Rental Duration: <input type="number" name="rental_duration"><br><br>
            New Rental Rate: <input type="number" name="rental_rate"><br><br>
            New Length: <input type="number" name="length"><br><br>
            New Replacement Cost: <input type="number" name="replacement_cost"><br><br>
            New Rating: <select name="rating">
                <option value="PG">PG</option>
                <option value="G">G</option>
                <option value="NC-17">NC-17</option>
                <option value="PG-13">PG-13</option>
                <option value="R">R</option>
            </select>
            <input type="submit" name="update" value="Update">
        </form>
    </div>
    <div class="middle hideform">
        <button id="hide" style="float:right;">X</button>
        <form action="delete_film.php" method="POST">
            <h4><b>Delete Film</b></h4>
            <hr>
            Film ID To Delete: <input type="number" name="film_id"><br><br>
            <input type="submit" name="delete" value="Delete">
        </form>
    </div>
    <div class="middle hideform">
        <button id="hide" style="float:right;">X</button>
        <form action="delete_actor.php" method="POST">
            <h4><b>Delete Actor</b></h4>
            <hr>
            Actor ID To Delete: <input type="number" name="actor_id"><br><br>
            <input type="submit" name="delete" value="Delete">
        </form>
    </div>
    <div class="mid hideform">
        <button id="disappear" style="float:right;">X</button>
        <form action="insert_film.php" method="POST">
        <h4><b>Insert Film</b></h4>
            <hr>
            Title: <input type="text" name="title"><br><br>
            Description: <textarea maxlength="500"></textarea>
            Release Year: <input type="year" name="release_year"><br><br>
            Language ID: <input type="number" name="language_id"><br><br>
            Original Language ID: <input type="number" name="original_language_id"><br><br>
            Rental Duration: <input type="number" name="rental_duration"><br><br>
            Rental Rate: <input type="number" name="rental_rate"><br><br>
            Length: <input type="number" name="length"><br><br>
            Replacement Cost: <input type="number" name="replacement_cost"><br><br>
            Rating: <select name="rating">
                <option value="PG">PG</option>
                <option value="G">G</option>
                <option value="NC-17">NC-17</option>
                <option value="PG-13">PG-13</option>
                <option value="R">R</option>
            </select>
            <input type="submit" name="Insert" value="Insert">
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
            <th>Film ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Release Year</th>
            <th>Language ID</th>
            <th>Original Language ID</th>
            <th>Rental Duration</th>
            <th>Rental Rate</th>
            <th>Length</th>
            <th>Replacement Cost</th>
            <th>Rating</th>
            <th>Special Features</th>
            <th>Last Update</th>
        </tr>
        <?php
            // count total number of rows
            $sql = "SELECT COUNT(*) AS cntrows FROM film";
            $result = $conn->query($sql);
            $fetchresult = $result->fetch_array();
            $allcount = $fetchresult['cntrows'];
            $sql = "SELECT * FROM film ORDER BY film_id ASC limit $row,".$rowperpage; // Selecting rows
            $result = $conn->query($sql);
            while($fetch = $result->fetch_array()) {
                $film_id = $fetch['film_id'];
                $title = $fetch['title'];
                $description = $fetch['description'];
                $release_year = $fetch['release_year'];
                $language_id = $fetch['language_id'];
                $original_language_id = $fetch['original_language_id'];
                $rental_duration = $fetch['rental_duration'];
                $rental_rate = $fetch['rental_rate'];
                $length = $fetch['length'];
                $replacement_cost = $fetch['replacement_cost'];
                $rating = $fetch['rating'];
                $special_features = $fetch['special_features'];
                $last_update = $fetch['last_update'];
        ?>
        <tr>
            <td align="center"><?php echo $film_id; ?></td>
            <td align="center"><?php echo $title; ?></td>
            <td align="center"><?php echo $description; ?></td>
            <td align="center"><?php echo $release_year; ?></td>
            <td align="center"><?php echo $language_id; ?></td>
            <td align="center"><?php echo $original_language_id; ?></td>
            <td align="center"><?php echo $rental_duration; ?></td>
            <td align="center"><?php echo $rental_rate; ?></td>
            <td align="center"><?php echo $length; ?></td>
            <td align="center"><?php echo $replacement_cost; ?></td>
            <td align="center"><?php echo $rating; ?></td>
            <td align="center"><?php echo $special_features; ?></td>
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
</div>
</div>
</body>
</html>

<script>
    /* Update */
    $('#show').on('click',function(){
        $('.center').show();
        $(this).hide();
    })
    $('#close').on('click',function(){
        $('.center').hide();
        $('#show').show();
    })
    /* Delete */
    $('#open').on('click',function(){
        $('.middle').show();
        $(this).hide();
    })
    $('#hide').on('click',function(){
        $('.middle').hide();
        $('#open').show();
    })
    /* Insert */
    $('#display').on('click',function(){
        $('.mid').show();
        $(this).hide();
    })
    $('#disappear').on('click',function(){
        $('.mid').hide();
        $('#display').show();
    })
</script>