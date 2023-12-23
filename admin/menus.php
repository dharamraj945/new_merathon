<?php
include "./header.php";
$menu_data = new Db_functions();
?>

<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                    <i class=" fa fa-plus"></i> Add New Menus
                </button>
            </div>
            <div class="table-responsive">
                <table style="Overflow-x:scroll;" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Sno</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Menu Action</th>
                            <th>Menu Status</th>
                            <th>Menu Sequence</th>
                            <th>Handler</th>


                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $qry_menu_data = "SELECT * FROM `grt_menu`";

                        $qry_result = $menu_data->data_fetch($qry_menu_data);

                        if ($qry_result != 0) {
                            $sno = 0;
                            foreach ($qry_result as $key => $value) {
                                $sno++;
                                ?>

                                <tr>
                                    <td><a href="#">
                                            <?= $sno ?>
                                        </a></td>
                                    <td>
                                        <?= $value['menu_name'] ?>
                                    </td>
                                    <td>
                                        <?= ($value['menu_type'] == 0) ? "Header Menu" : "Footer Menu" ?>
                                    </td>
                                    <td>
                                        <?php
                                        // 0 for page assignement
                                        // 1 for custom Url                                        
                                        if ($value['menu_action_type'] == 0) {

                                            $qry_page_name = "SELECT `page_title` FROM `pages` WHERE id=$value[menu_action]";
                                            $qry_result_page = $menu_data->data_fetch($qry_page_name);

                                            foreach ($qry_result_page as $key => $value_pageName) {
                                                echo "<button class='badge badge-primary mx-2'>Page</button>" . $value_pageName['page_title'];
                                            }
                                        } elseif ($value['menu_action_type'] == 1) {


                                            echo "<button class='badge badge-success mx-2'>URL</button>" . substr($value['menu_action'], 0, 30) . "...";
                                        } else {
                                            echo "invalid Data";
                                        }
                                        ?>


                                    </td>
                                    <td>

                                        <?php

                                        if ($value['menu_status'] == 0) { ?>
                                            <span class="badge badge-success">Active</span>

                                        <?php } else { ?>

                                            <span class="badge badge-warning">Draft</span>

                                        <?php }
                                        ?>
                                    </td>

                                    <td>
                                        <?= $value['menu_seq'] ?>
                                    </td>
                                    <td>
                                        <?= $value['menu_handler'] ?>
                                    </td>


                                    <td><a href="./menu_update?menu_id=<?= $value['id'] ?>"
                                            class="btn btn-sm   btn-primary">Edit</a>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#menu_del<?= $value['id'] ?>">Delete</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="menu_del<?= $value['id'] ?>" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are You Sure !</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span class="text-danger"> You won't be able to revert this !</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="./menus_backend.php?del_menu=<?php echo $value['id'] ?>"
                                                            class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->


                                    </td>
                                </tr>

                            <?php }
                        } else {
                            echo "No Menu Added";
                        }

                        ?>




                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="text-center">

                            </div>
                            <form method="post" action="./menus_backend.php">
                                <div class="form-group">
                                    <label>Menu Name</label>
                                    <input type="text" class="form-control" id="exampleInputFirstName" name="menu_name"
                                        placeholder="Name" required="">
                                </div>
                                <div class="form-group">
                                    <label>Menu Type</label>
                                    <select class="form-control" id="" name="menu_type" required>

                                        <option value="0">Header Menu</option>
                                        <option value="1">Footer Menu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Menu Status</label>
                                    <select class="form-control" id="" name="menu_status" required>

                                        <option value="0">Active</option>
                                        <option value="1">Draft</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Menu Action</label>

                                    <select id="menu_action" name="menu_action_type" class="form-control mb-3" required>
                                        <option value="" disabled selected>SELECT</option>
                                        <option value="0">Assign Page</option>
                                        <option value="1">Custom Url</option>
                                    </select>
                                </div>


                                <div id="result_ajax" class="form-group">


                                </div>
                                <div class="form-group">
                                    <label>Sequence Number</label>
                                    <input type="number" class="form-control" id="exampleInputPasswordRepeat"
                                        placeholder="Sequence" name="menu_sequence" required="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="add_menu"
                                        class="btn btn-primary btn-block">Submit</button>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $('#menu_action').change(function () {

            var selectedval = $(this).val();

            // Make an AJAX call to the server
            $.ajax({
                url: './menus_backend.php', // URL to the PHP file
                type: 'POST', // HTTP method
                dataType: 'html', // Data type expected from the server
                data: {
                    data_menu_type: selectedval
                }, // Data to send to the server

                success: function (response) {
                    // Handle the successful response from the server
                    $('#result_ajax').html(response);

                },

                error: function (error) {
                    // Handle errors
                    console.log('Error:', error);
                }
            });



        })

    })
</script>
<?php
include "./footer.php";
?>