<?php
include_once 'get_column_names.php';

$checkbox = filter_input(INPUT_POST, 'checkbox', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

$oldData = array();
for ($i = 0; $i < count($columnNames); $i++) {
    $oldData = explode(';', $checkbox[0]);
}
?>

<!DOCTYPE html>
<html>
    <?php include_once 'head.php'; ?>
    <body>
        <div id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit <?php echo ucwords(str_replace('_', ' ', $tableName)); ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="updateForm" action="update_data.php" method="POST">
                            <input type="hidden" name="tableName" value="<?php echo $tableName; ?>">
                            <?php
                            foreach ($columnNames as $index => $columnName) {
                                echo "<input type=\"hidden\" name=\"old_$columnName\"  value=\"$oldData[$index]\">";
                            }
                            ?>
                            <?php echo ucwords(str_replace(array('_', 'id'), array(' ', 'ID'), $columnNames[0])) . ": "; ?><input type="number" name="<?php echo $columnNames[0]; ?>" value="<?php echo $oldData[0]; ?>"><br><br>
                            <?php echo ucwords(str_replace(array('_', 'id'), array(' ', 'ID'), $columnNames[1])) . ": "; ?><input type="text" name="<?php echo $columnNames[1]; ?>" value="<?php echo $oldData[1]; ?>"><br><br>
                            <?php echo ucwords(str_replace(array('_', 'id'), array(' ', 'ID'), $columnNames[2])) . ": "; ?><input type="number" name="<?php echo $columnNames[2]; ?>" value="<?php echo $oldData[2]; ?>"><br><br>
                            <?php echo ucwords(str_replace(array('_', 'id'), array(' ', 'ID'), $columnNames[3])) . ": "; ?><input type="number" name="<?php echo $columnNames[3]; ?>" value="<?php echo $oldData[3]; ?>"><br><br>
                            <?php echo ucwords(str_replace(array('_', 'id'), array(' ', 'ID'), $columnNames[4])) . ": "; ?><input type="number" name="<?php echo $columnNames[4]; ?>" value="<?php echo $oldData[4]; ?>"><br><br>
                            <?php echo ucwords(str_replace(array('_', 'id'), array(' ', 'ID'), $columnNames[5])) . ": "; ?><input type="number" name="<?php echo $columnNames[5]; ?>" value="<?php echo $oldData[5]; ?>"><br><br>
                            <?php echo ucwords(str_replace(array('_', 'id'), array(' ', 'ID'), $columnNames[6])) . ": "; ?><input type="number" step="0.01" name="<?php echo $columnNames[6]; ?>" value="<?php echo $oldData[6]; ?>"><br><br>
                            <?php echo ucwords(str_replace(array('_', 'id'), array(' ', 'ID'), $columnNames[7])) . ": "; ?><input type="number" name="<?php echo $columnNames[7]; ?>" value="<?php echo $oldData[7]; ?>"><br><br>
                            <?php echo ucwords(str_replace(array('_', 'id'), array(' ', 'ID'), $columnNames[8])) . ": "; ?><input type="number" step="0.01" name="<?php echo $columnNames[8]; ?>" value="<?php echo $oldData[8]; ?>"><br><br>
                            <?php echo ucwords(str_replace(array('_', 'id'), array(' ', 'ID'), $columnNames[9])) . ": "; ?><select name="<?php echo $columnNames[9]; ?>" value="<?php echo $oldData[9]; ?>">
                                <option value="G">G</option>
                                <option value="PG">PG</option>
                                <option value="PG-13">PG-13</option>
                                <option value="R">R</option>
                                <option value="NC-17">NC-17</option>
                            </select><br><br>
                            <?php echo ucwords(str_replace(array('_', 'id'), array(' ', 'ID'), $columnNames[10])) . ": "; ?><select name="<?php echo $columnNames[10]; ?>" value="<?php echo $oldData[10]; ?>">
                                <option value="Trailers">Trailers</option>
                                <option value="Commentaries">Commentaries</option>
                                <option value="Deleted Scenes">Deleted Scenes</option>
                                <option value="Behind the Scenes">Behind the Scenes</option>
                            </select><br><br>
                            <input type="submit" value="Save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.0/dist/jquery.min.js" type="text/javascript" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" type="text/javascript" integrity="sha256-CjSoeELFOcH0/uxWu6mC/Vlrc1AARqbm/jiiImDGV3s=" crossorigin="anonymous"></script>
        <script>
            $("#updateModal").modal("show");
            $("#updateModal").on("hidden.bs.modal", function (e) {
                $("body").html("<meta http-equiv=\"refresh\" content=\"0; url=<?php echo $tableName; ?>.php\">");
            });
            var value_<?php echo $columnNames[9]; ?> = $("select[name=<?php echo $columnNames[9]; ?>]").attr("value");
            $("select[name=<?php echo $columnNames[9]; ?>] option[value=\"" + value_<?php echo $columnNames[9]; ?> + "\"]").prop("selected", true);
            var value_<?php echo $columnNames[10]; ?> = $("select[name=<?php echo $columnNames[10]; ?>]").attr("value");
            $("select[name=<?php echo $columnNames[10]; ?>] option[value=\"" + value_<?php echo $columnNames[10]; ?> + "\"]").prop("selected", true);
        </script>
    </body>
</html>