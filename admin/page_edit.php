<?php include "./header.php";
$obj_fetch_section = new Db_functions();
if (isset($_GET['pageid'])) {
    $pageid = $_GET['pageid'];
    $qry_page_data = "SELECT * FROM grt_pages WHERE id=$pageid";
    $qry_page_data_res = $obj_fetch_section->data_fetch($qry_page_data);

    foreach ($qry_page_data_res as $key => $values) {
        $page_title = $values['page_title'];
        $page_short_desc = $values['page_short_desc'];
    }
}
?>

<div class="row">
    <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

            </div>
            <div class="card-body">
                <form action="./page_backend.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Page Title</label>
                        <input value="<?= $page_title ?>" name="Page_title" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Title">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Page Descreptopn</label>
                        <input value="<?= $page_short_desc ?>" name="Page_descreption" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Descreption">

                    </div>




                    <div class="form-group">
                        <label for="exampleInputEmail1"></label>

                        <select required name="page_content[]" id="section_data" class="form-control mb-3 js-example-basic-single" multiple="multiple">
                            <option disabled="" value="-1">Select Category</option>


                            <?php


                            $section_name = "SELECT * FROM grt_section_group";

                            $section_name_res = $obj_fetch_section->data_fetch($section_name);

                            foreach ($section_name_res as $key => $value) {

                                $get_main_section = "SELECT * FROM `grt_sections` WHERE id = $value[section_id]";

                                $get_main_section_res = $obj_fetch_section->data_fetch($get_main_section);
                                if ($get_main_section_res != 0) {

                                    $main_section = $get_main_section_res[0]['section_title'];

                                    $qry_page_section = "SELECT * FROM grt_page_section_trans WHERE page_id=$pageid ";

                                    echo $qry_page_section;

                                    $qry_page_section_res = $obj_fetch_section->data_fetch($qry_page_section);
                                    if ($qry_page_section_res != 0) {
                                        foreach ($qry_page_section_res as $key => $value_section_id) {
                                            $seleted_section_id = $value_section_id['section_group_id'];
                            ?>

                                            <option <?= $seleted_section_id == $value['id'] ? "selected" : "" ?> value="<?= $value['id'] ?>"><?= $main_section . " => " . $value['section_group_title'] ?></option>

                                    <?php                                      }
                                    }

                                    ?>




                            <?php } else {
                                    $main_section = "Section Name Not Found";
                                }
                            }



                            ?>

                            <?php

                            ?>



                        </select>

                        <input type="hidden" value<?= $pageid ?> name="pageid">
                    </div>

                    <div class="button">

                        <button name="update_page" class="btn btn-primary" type="submit">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
<script>
    $('.js-example-basic-single').select2({
        placeholder: 'Select an option'
    });
</script>


<?php include "./footer.php" ?>