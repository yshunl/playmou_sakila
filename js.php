<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.0/dist/jquery.min.js" type="text/javascript" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" type="text/javascript" integrity="sha256-CjSoeELFOcH0/uxWu6mC/Vlrc1AARqbm/jiiImDGV3s=" crossorigin="anonymous"></script>
<script type="text/javascript" defer>
    $(document).ready(function () {

        load_header_filter();
        load_data();
        //load_form_fields();

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

        function load_data(columnQuery) {
            $.ajax({
                url: "fetch_data.php",
                method: "POST",
                data: {
                    tableName: "<?php echo $tableName ?>",
                    columnQuery: JSON.stringify(columnQuery),
                    firstRowIndex: <?php echo $firstRowIndex; ?>,
                    resultsPerPage: <?php echo $resultsPerPage; ?>
                },
                success: function (data) {
                    $("#data").html(data);
                }
            });
        }

        function load_form_fields() {
            $.ajax({
                url: "fetch_form_fields.php",
                method: "POST",
                data: {
                    tableName: "<?php echo $tableName ?>"
                },
                success: function (data) {
                    $("#insertForm").html(data);
                }
            });
        }

        var columnQuery = {};
        $("tbody").on("keyup", "input[type=text]", function () {
            columnQuery[$(this).attr("name")] = $(this).val();
//                    columns.push($(this).attr('name'));
//                    query.push($(this).val());
//                    var query = $(this).val();
//                    console.log(JSON.stringify(columnQuery));
//                    console.log(query);
            if (columnQuery !== "") {
                load_data(columnQuery);
            } else {
                load_data();
            }
        });

        if ($("input:checkbox[name]:checked").length !== 1) {
            $("input:submit[value=Edit]").prop("disabled", true);
        } else {
            $("input:submit[value=Edit]").prop("disabled", false);
        }

        if ($("input:checkbox[name]:checked").length === 0) {
            $("input:submit[value=Delete]").prop("disabled", true);
        } else {
            $("input:submit[value=Delete]").prop("disabled", false);
        }

        $("tbody").on("click", "input:checkbox[value=selectAll]", function () {
            $("input:checkbox").not(this).prop("checked", this.checked);

            if ($("input:checkbox[name]:checked").length !== 1) {
                $("input:submit[value=Edit]").prop("disabled", true);
            } else {
                $("input:submit[value=Edit]").prop("disabled", false);
            }

            if ($("input:checkbox[name]:checked").length === 0) {
                $("input:submit[value=Delete]").prop("disabled", true);
            } else {
                $("input:submit[value=Delete]").prop("disabled", false);
            }
        });

        $("tbody").on("click", "input:checkbox[name]", function () {
            if ($("input:checkbox[name]:checked").length !== 1) {
                $("input:submit[value=Edit]").prop("disabled", true);
            } else {
                $("input:submit[value=Edit]").prop("disabled", false);
            }

            if ($("input:checkbox[name]:checked").length === 0) {
                $("input:submit[value=Delete]").prop("disabled", true);
            } else {
                $("input:submit[value=Delete]").prop("disabled", false);
            }

            if ($("input:checkbox[name]").length === $("input:checkbox[name]:checked").length) {
                $("input:checkbox[value=selectAll]").prop("checked", true);
            } else {
                $("input:checkbox[value=selectAll]").prop("checked", false);
            }
        });

        $("body").click(function (event) {
            if ($(event.target).is("input[value=Edit]")) {
                $("#updateDeleteForm").prop("action", "<?php echo $tableName ?>_form.php");
            } else if ($(event.target).is("input[value=Delete]")) {
                $("#updateDeleteForm").prop("action", "delete_data.php");
            }
        });
    });
</script>