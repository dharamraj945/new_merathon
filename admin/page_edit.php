<?php include "./header.php";
$obj_fetch_section = new Db_functions();
if (isset($_GET['pageid'])) {
    $pageid = $_GET['pageid'];
    $qry_page_data = "SELECT * FROM grt_pages WHERE id=$pageid ";
    $qry_page_data_res = $obj_fetch_section->data_fetch($qry_page_data);
    if ($qry_page_data_res != 0) {

        foreach ($qry_page_data_res as $key => $values) {
            $page_title = $values['page_title'];
            $page_short_desc = $values['page_short_desc'];
            $is_custom = $values['is_custom'];
            if ($is_custom == 1) {
                $custon_content = $values['page_content'];
            }
        }
    }
}
?>

<?php
if ($is_custom == 0) { ?>
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
                                $seleced_section = "SELECT grtst.section_group_id  FROM grt_page_section_trans grtst INNER JOIN grt_pages grtp on grtp.id = grtst.page_id WHERE grtp.is_custom=0 ";

                                $seleced_section_res = $obj_fetch_section->data_fetch($seleced_section);
                                if ($seleced_section_res != 0) {

                                    $selected_array = [];
                                    foreach ($seleced_section_res as $key => $value) {

                                        array_push($selected_array, $value['section_group_id']);
                                    }
                                }


                                $all_sections = "SELECT * FROM grt_section_group WHERE status=0";
                                $all_sections_res = $obj_fetch_section->data_fetch($all_sections);
                                if ($all_sections_res != 0) {
                                    foreach ($all_sections_res as $key => $value_data) {
                                        $get_sectionid = "SELECT * FROM grt_sections WHERE id= $value_data[section_id]";
                                        $get_sectionid_res = $obj_fetch_section->data_fetch($get_sectionid);
                                        if ($get_sectionid_res != 0) {

                                            $section_title = $get_sectionid_res[0]['section_title'];
                                        }



                                ?>
                                        <option <?= in_array($value_data['id'], $selected_array) ? "selected" : "" ?> value="<?= $value_data['id'] ?>"><?= $section_title . " => " . $value_data['section_group_title'] ?></option>

                                <?php }
                                }


                                ?>



                            </select>

                            <input type="hidden" value="<?= $pageid ?>" name="pageid">
                        </div>

                        <div class="button">

                            <button name="update_page" class="btn btn-primary" type="submit">Update</button>
                        </div>

                    </form>
                </div>

                <div class="card-body">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Sequence</h6>
                        <div>
                            <button id="edit_btn" class="btn btn-primary btn-sm">
                                <i class=" fa fa-edit"></i> Edit
                            </button>
                            <button name="update_seq" id="saveButton" class="btn btn-success btn-sm" style="display: none">
                                <i class=" fa fa-save"></i> Save
                            </button>
                        </div>
                    </div>

                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Sno</th>
                                <th>Sections</th>
                                <th>Sequence</th>

                        </thead>
                        <tbody>
                            <?php

                            $qry_seq = "SELECT * FROM grt_page_section_trans WHERE page_id= $pageid ORDER BY `section_seq` ";
                            $qry_seq_run = $obj_fetch_section->data_fetch($qry_seq);
                            if ($qry_seq_run != 0) {

                                $sno = 0;
                                foreach ($qry_seq_run as $key => $value_sec) {
                                    $sno++;
                            ?>

                                    <tr>
                                        <td><a href="#"><?= $sno ?> </a></td>
                                        <?php
                                        $qry_getsecname = "SELECT * FROM grt_section_group WHERE id = $value_sec[section_group_id] ";
                                        $qry_getsecname_res = $obj_fetch_section->data_fetch($qry_getsecname);
                                        if ($qry_getsecname_res != 0) {
                                            $sec_name = $qry_getsecname_res[0]['section_group_title'];
                                        }
                                        ?>
                                        <td> <?= $sec_name ?> </td>
                                        <td>
                                            <form action="./page_backend.php" method="post" id="update_page">
                                                <input disabled="disabled" style="width: 50px;" class="form-control input-sm seqNumber" type="number" name="" id="seqNumber" value="<?= $value_sec['section_seq']; ?>">
                                                <input class="groupId" type="hidden" name="" id="groupId" value="<?= $value_sec['id'] ?>">
                                            </form>
                                        </td>
                                    </tr>
                            <?php    }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

<?php } else { ?>


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
                            <label for="exampleInputEmail1">Content</label>

                            <textarea class="form-control" name="page_content" id="editor" cols="30" rows="10" style="display: none;"><?php
                                                                                                                                        if (isset($custon_content)) {
                                                                                                                                            echo urldecode($custon_content);
                                                                                                                                        }
                                                                                                                                        ?></textarea>

                        </div>

                        <input type="hidden" value="<?= $pageid ?>" name="pageid">

                        <div class="button">

                            <button name="update_page" class="btn btn-primary" type="submit">Update</button>
                        </div>

                    </form>
                </div>


            </div>
        </div>

    </div>





<?php }
?>






<script>
    $('.js-example-basic-single').select2({
        placeholder: 'Select an option'
    });
</script>

<script>
    $(document).ready(function() {
        var groupId = $("#groupId");
        var seqNumber = $(".seqNumber");
        var edit_btn = $("#edit_btn");
        var saveButton = $("#saveButton");

        edit_btn.click(function() {

            seqNumber.removeAttr('disabled');
            edit_btn.prop('disabled', true);
            edit_btn.css('display', 'none');

            saveButton.css('display', 'inline-block');

            saveButton.click(function() {

                var inputPairs = [];

                // Loop through each pair of input elements
                $('.seqNumber').each(function(index) {
                    var sequence = $(this).val();
                    var pageId = $('.groupId').eq(index).val();

                    // Push the pair of values into the array
                    inputPairs.push({
                        sequence: sequence,
                        pageId: pageId
                    });



                });

                $.ajax({
                    url: 'page_backend.php', // Replace with your server-side script
                    method: 'POST',
                    data: {
                        inputPairs: inputPairs
                    },
                    success: function(response) {

                        if (response.status === "success") {
                            alert("updated");
                            location.reload(true);

                        }
                    },
                    error: function(error) {
                        // Handle error
                        console.error('Error sending data:', error);
                    }
                });

            })


        })







    })
</script>


<?php include "./footer.php" ?>