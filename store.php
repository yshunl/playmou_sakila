<?php
require_once 'dbconfig.php';
include_once 'pagination.php';
?>

<!DOCTYPE html>
<html>
    <?php include_once 'head.php'; ?>
    <body>
        <div id="wrapper" class="toggled">
           <!-- Sidebar -->
              <?php
                 include 'sidebar.php';
                ?>
        <!-- Page Content -->
    
        <div id="page-content-wrapper">    
        
        <div class="animated fadeInLeft mobile-btn">
        <input type="submit" class="btn btn-3" data-toggle="modal" data-target="#insertModal" value="New">
        <input type="submit" class="btn btn-3" form="updateDeleteForm" value="Edit">
        <input type="submit" class="btn btn-3" form="updateDeleteForm" value="Delete">
        </div>
        
        <table class="store" id="<?php echo $tableName ?>">
            <tbody id="headerFilter"></tbody>
            <tbody id="data"></tbody>
        </table>

        <form method="POST">
            <input type="hidden" name="firstRowIndex" value="<?php echo $firstRowIndex; ?>">
            <input type="hidden" name="numberOfRecords" value="<?php echo $numberOfRecords; ?>">
            <span><?php echo 'Showing ' . ($firstRowIndex + 1) . ' to ' . (($firstRowIndex + $resultsPerPage > $numberOfRecords) ? $numberOfRecords : ($firstRowIndex + $resultsPerPage)) . ' of ' . $numberOfRecords . ' records'; ?></span>
            <input type="submit" name="previous" value="Previous">
            <input type="submit" name="next" value="Next">
        </form>

        <div id="insertModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="insertModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Insert New <?php echo ucwords(str_replace('_', ' ', $tableName)); ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="insertForm" action="insert_store.php" method="POST">
                            <input type="hidden" name="tableName" value="<?php echo $tableName; ?>">
                            Manager Staff ID: <input type="number" name="manager_staff_id"><br><br>
                            Address ID: <input type="number" name="address_id"><br><br>
                            <input type="submit" value="Insert">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <form id="updateDeleteForm" method="POST">
            <input type="hidden" name="tableName" value="<?php echo $tableName; ?>">
        </form>

        <?php include_once 'js.php'; ?>
        </div>
        </div>
    </body>
</html>