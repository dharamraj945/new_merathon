<?php
include "./header.php";
$section_create = new Db_functions();
$qry = "SELECT *  FROM `grt_sections`";
$result = $section_create->data_fetch($qry);


?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Customize Store</h6>

            </div>



            <div class="text-center d-flex align-items-center justify-content-center ">

                <form action="" class="form">

                    <div class="form-group ">
                        <select name="" id="section_create" class=" form-control" required>
                            <option selected disabled value="">SELECT Section</option>

                            <?php

                            foreach ($result as $key => $value) { ?>
                                <option id="opt" data-id="<?= $value['id'] ?>" value="<?= $value['section_file'] ?>"><?= $value['section_title'] ?></option>

                            <?php }
                            ?>

                        </select>
                    </div>

                </form>
            </div>

            <div class="card-footer"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {


        $("#section_create").change(function() {

            var select_val = $(this).val();

            var dataId = $('option:selected', this).attr('data-id');


            window.location.href = "./" + select_val + "?sectionid=" + dataId;
        })

    })
</script>
<?php
include "./footer.php";
?>