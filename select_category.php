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
    <style>
    .center {
        margin:auto;
        width:60%;
        padding:20px;
        box-shadow:0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    }
    .hideform {
        display:none;
    }
    #category_table {
        border:3px solid lavender;
        border-radius:3px;
    }
    .tr_header{
        background-color:dodgerblue;
    }
    .tr_header th{
        color:white;
        padding:10px 0px;
        letter-spacing: 1px;
    }
    #category_table td{
        padding:10px;
    }
    #category_table tr:nth-child(even){
        background-color:lavender;
        color:black;
    }
    #div_pagination{
        width:100%;
        margin-top:5px;
        text-align:center;
    }
    .button{
        border-radius:3px;
        border:0px;
        background-color:teal;
        color:white;
        padding:10px 20px;
        letter-spacing: 1px;
    }
    .divnum_rows{
        display: inline-block;
        text-align: right;
        width: 30%;
    }
    </style>
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
    <br>
    <div class="center hideform">
        
        <button id="close" style="float:right;">X</button>
        <form action="update_category.php" method="POST">
            Category ID To Update: <input type="number" name="category_id"><br><br>
            New Name: <input type="text" name="name"><br><br>
            <input type="submit" name="update" value="Update">
        </form>
        </div>
     <div class="middle hideform">
    <button id="hide" style="float:right;">X</button>
        <form action="delete_category.php" method="POST">
            Category ID To Delete: <input type="number" name="category_id"><br><br>
            <input type="submit" name="delete" value="Delete">
        </form>
        </div>
    <div class="mid hideform">
        <button id="disappear" style="float:right;">X</button>
        <form action="insert_category.php" method="POST">
            Name: <input type="text" name="name"><br><br>
            <input type="submit" name="insert" value="Insert">
        </form>
    </div>
        <div class="row" style="margin-left:20px;">
        <button class="btn btn-default"id="show">Update</button>
        <button class="btn btn-default"id="open">Delete</button>
        <button class="btn btn-default"id="display">Insert</button>
        </div>
    <table id="category_table" width="100%">
        <tr>
            <th>Category ID</th>
            <th>Name</th>
            <th>Last Update</th>
        </tr>
        <?php
            // count total number of rows
            $sql = "SELECT COUNT(*) AS cntrows FROM category";
            $result = $conn->query($sql);
            $fetchresult = $result->fetch_array();
            $allcount = $fetchresult['cntrows'];
            $sql = "SELECT * FROM category ORDER BY category_id ASC limit $row,".$rowperpage; // Selecting rows
            $result = $conn->query($sql);
            while($fetch = $result->fetch_array()) {
                $category_id = $fetch['category_id'];
                $name = $fetch['name'];
                $last_update = $fetch['last_update'];
        ?>
        <tr>
            <td align="center"><?php echo $category_id; ?></td>
            <td align="center"><?php echo $name; ?></td>
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