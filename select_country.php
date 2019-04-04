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
<div id="page-content-wrapper">
      <div class="container-fluid">
        <div class="row">    
        <div class="col-lg-12">
        <br>
        <div class="center hideform">
        <button id="close" style="float:right;">X</button>
        <form action="update_country.php" method="POST">
            <h4><b>Update Country</b></h4>
            <hr>
            Country ID To Update: <input type="number" name="country_id"><br><br>
            New Country: <input type="text" name="country"><br><br>
            <input type="submit" name="update" value="Update">
        </form>
    </div>
    <div class="middle hideform">
        <button id="hide" style="float:right;">X</button>
        <form action="delete_country.php" method="POST">
            <h4><b>Delete Country</b></h4>
            <hr>
            Country ID To Delete: <input type="number" name="country_id"><br><br>
            <input type="submit" name="delete" value="Delete">
        </form>
    </div>
    <div class="mid hideform">
        <button id="disappear" style="float:right;">X</button
        <form action="insert_country.php" method="POST">
        <h4><b>Insert Country</b></h4><hr>
            Country: <input type="text" name="country"><br><br>
            <input type="submit" name="insert" value="Insert">
        </form>
    </div>
        <div class="row" style="margin-left:20px;">
        <button class="btn btn-default"id="show">Update</button>
        <button class="btn btn-default"id="open">Delete</button>
        <button class="btn btn-default"id="display">Insert</button>
        </div>
    <table id="_table" width="100%">
        <tr>
            <th>Country ID</th>
            <th>Country</th>
            <th>Last Update</th>
        </tr>
        <?php
            // count total number of rows
            $sql = "SELECT COUNT(*) AS cntrows FROM country";
            $result = $conn->query($sql);
            $fetchresult = $result->fetch_array();
            $allcount = $fetchresult['cntrows'];
            $sql = "SELECT * FROM country ORDER BY country_id ASC limit $row,".$rowperpage; // Selecting rows
            $result = $conn->query($sql);
            while($fetch = $result->fetch_array()) {
                $country_id = $fetch['country_id'];
                $country = $fetch['country'];
                $last_update = $fetch['last_update'];
        ?>
        <tr>
            <td align="center"><?php echo $country_id; ?></td>
            <td align="center"><?php echo $country; ?></td>
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