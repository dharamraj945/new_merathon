<?php
include "./header.php";
$menu_update_obj = new Db_functions();

if (isset($_GET['menu_id'])) {
    $menu_id = $_GET['menu_id'];
} else {
    echo "Parmetor Error !";
}


$qry_fetch_menus = "SELECT * FROM `section_menu` WHERE id=$menu_id";
$result = $menu_update_obj->data_fetch($qry_fetch_menus);

$result = $result[0];
print_r($result);

?>
<div class="row">
    <div class="col-lg-6">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

            </div>
            <div class="card-body">
                <form action="./menus_backend.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input value="<?= $result['menu_name'] ?>" name="new_menu_name" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Menu Name">

                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Menu Type</label>

                        <select name="new_menu_type" class="form-control mb-3" required="">
                            <option disabled value="">SELECT </option>
                            <option <?= $result['menu_type'] == 0 ? "selected" : "" ?> value="0">Header Menu</option>
                            <option <?= $result['menu_type'] == 1 ? "selected" : "" ?> value="1">Footer Menu </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Menu Status</label>

                        <select name="new_menu_status" class="form-control mb-3" required="">
                            <option disabled value="">SELECT </option>

                            <option <?= $result['menu_type'] == 0 ? "selected" : "" ?> value="0">Active</option>
                            <option <?= $result['menu_type'] == 1 ? "selected" : "" ?> value="1">Draft </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Menu handler</label>
                        <input value="<?= $result['menu_handler'] ?>" name="new_menu_handler" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Menu Handler" required>

                    </div>


            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">Menu Action</label>

                    <select id="new_menu_action" name="menu_action_type" class="form-control mb-3" required>
                        <option value="" disabled>SELECT</option>
                        <option <?php echo ($result['menu_action_type'] == 0 ? "selected" : ""); ?> value="0">Assign Page</option>
                        <option <?php echo ($result['menu_action_type'] == 1 ? "selected" : ""); ?> value="1">Custom Url</option>
                    </select>
                </div>


                <div id="result_ajax" class="form-group">

                    <!-- ajax data apppends here  -->
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Sequence </label>
                    <input value="<?= $result['menu_seq'] ?>" name="new_menu_sequence" required="" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                </div>

            </div>
            <button type="submit" name="update_menu" class="btn btn-primary">Updae</button>

        </div>
        </form>
    </div>

</div>

<script>
    $(document).ready(function() {

        // Make an AJAX call to the server

        var selected_val = $('#new_menu_action').find(":selected").val();
        ajax_call_type(selected_val);



        $('#new_menu_action').change(function() {

            var selectedval = $(this).val();

            ajax_call_type(selectedval);
            // Make an AJAX call to the server




        })

    })

    function ajax_call_type(action_type) {

        $.ajax({
            url: './menus_backend.php', // URL to the PHP file
            type: 'POST', // HTTP method
            dataType: 'html', // Data type expected from the server
            data: {
                data_menu_type: action_type
            }, // Data to send to the server

            success: function(response) {
                // Handle the successful response from the server
                $('#result_ajax').html(response);


                <?php
                if ($result['menu_action_type'] == 0) { ?>

                    $("#menu_action option[value='<?php echo $result['menu_action'] ?>']").attr("selected", "selected");
                <?php } else { ?>
                    $("#menu_type_value").val("<?php echo $result['menu_action'] ?>");

                <?php }
                ?>


            },

            error: function(error) {
                // Handle errors
                console.log('Error:', error);
            }
        });

    }
</script>
<?php
include "./footer.php";
?>