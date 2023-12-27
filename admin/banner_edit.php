<?php
include "./header.php";
if (isset($_GET['bannerid'])) {
    $section_id = $_GET['bannerid'];
} else {
    echo "<script>
    window.location.href='./add_section';
    </script>";
}
$banner_edit = new Db_functions();
$qry_banner = "SELECT * FROM grt_section_banner";
$qry_banner_res = $banner_edit->data_fetch($qry_banner);
if ($qry_banner_res != 0) {
    foreach ($qry_banner_res as $key => $value) {
    }
    $get_group_name = "SELECT * FROM grt_section_group WHERE id=$value[section_group_id]";
    $get_group_name_res = $banner_edit->data_fetch($get_group_name);
    if ($get_group_name_res != 0) {
        foreach ($get_group_name_res as $key => $group_data) {
        }
    }
}
?>
<div class="row">

    <div class="card col-lg-12 px-5 py-5">


        <div class="mx-2 my-2 text-primary">

            <h3>Create Banner Group</h3>
        </div>
        <form action="./banner_backend.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1"> Group Name</label>
                <input value="<?= $group_data['section_group_title'] ?>" name="group_name" required="" type="text" class="form-control" id="group_title" aria-describedby="emailHelp" placeholder="Group Name">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Group desc</label>
                <input value="<?= $group_data['section_group_desc'] ?>" name="group_desc" required="" type="text" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Group Short Desc">

            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Group Status</label>
                <select name="banner_status" class="form-control" id="group_status">
                    <option <?= $group_data['status'] == 0 ? "selected" : "" ?> value="0">Active</option>
                    <option <?= $group_data['status'] == 1 ? "selected" : "" ?> value="1">Draft</option>
                </select>

            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Banner Text</label>
                <input value="<?= urldecode($value['banner_top_text']) ?>" name="banner_text" required="" type="text" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Text">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Banner Heading</label>
                <input value="<?= urldecode($value['banner_heading']) ?>" name="banner_heading" required="" type="text" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Heading">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Banner Sub Heading</label>
                <input value="<?= urldecode($value['banner_sub_heading']) ?>" name="banner_sub_heading" required="" type="text" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Sub-Heading">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Display Date </label>
                <input value="<?= urldecode($value['banner_date']) ?>" name="banner_date" required="" type="date" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Display Date">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Display Time </label>
                <input value="<?= urldecode($value['banner_time']) ?>" name="banner_time" required="" type="time" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Display Time">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Display Descreption </label>
                <input value="<?= urldecode($value['banner_desc']) ?>" name="banner_desc" required="" type="text" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Display Descreption">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Banner Image </label>
                <input value="<?= $value['banner_filename'] ?>" name="banner_image" type="File" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Banner Image">
                <img class="my-2" width="300px" src="./assets/images/banners/<?= $value['banner_filename'] ?>" alt="">
                <input type="hidden" name="old_image" id="" value="<?= $value['banner_filename'] ?>">
            </div>
            <input type="hidden" name="section_id" value="<?= $section_id ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Event Action </label>
                <input value="<?= $value['banner_bnt_action'] ?>" name="banner_btn_action" required="" type="url" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="URL">

            </div>

            <button type="submit" name="update_banner" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>

<?php
include "./footer.php";
?>