<?php
include "./header.php";
$obj_frontPage = new Db_functions();

$qry = "SELECT *  FROM `grt_section_group` WHERE client_id =$_SESSION[active_user] ";


?>


<div class="row">
    <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

            </div>
            <div class="card-body">
                <form action="./section_backend.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <h2>Manage Homepage</h2>
                    </div>

                    <div class="form-group">
                        <label for="">Select Section Name</label>
                        <select class="form-control" name="" id="section_name">
                            <option value="" selected disabled>SELECT A SECTION</option>
                            <?php

                            $qty_section = "SELECT * FROM `grt_sections`";
                            $qry_section_res = $obj_frontPage->data_fetch($qty_section);
                            if ($qry_section_res != 0) {

                                foreach ($qry_section_res as $key => $value) { ?>
                                    <option value="<?= $value['id']  ?>"><?= $value['section_title'] ?></option>

                            <?php }
                            }
                            ?>


                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"></label>

                        <select required name="page_content[]" class="form-control mb-3 js-example-basic-single" multiple="multiple">
                            <option disabled="" value="-1">Select Category</option>

                            <?php


                            $qry_fire = $obj_frontPage->data_fetch($qry);

                            echo $qry_fire;

                            if ($qry_fire != 0) {

                                foreach ($qry_fire as $key => $option_data) { ?>

                                    <option <?php ?> value="<?= $option_data['id'] ?>">
                                        <?= $option_data['section_group_title'] ?>
                                    </option>


                            <?php }
                            }
                            ?>


                        </select>


                    </div>
                    <div class="button">

                        <button name="create_section" class="btn btn-primary" type="submit">Add HomePage</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

<script>
    $('.js-example-basic-single').select2({
        placeholder: 'Select an Section'
    });
</script>

<script>
    $(document).ready(function() {

        $("#section_name").change(function() {
            var opt_val = $(this).val();





            const requestData = {
                section_id: opt_val

            };


            $.ajax({
                url: "./front_backend.php",
                type: "POST",
                data: requestData,
                dataType: "json",
                success: function(response) {
                    // Handle the successful response here
                    console.log("Success:", response);
                },
                error: function(error) {
                    // Handle errors here
                    console.error("Error:", error);
                },

            });



        })
    })
</script>
<?php
include "./footer.php";
?>