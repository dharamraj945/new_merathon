<?php
include "./header.php";
if (isset($_GET['bannerid'])) {
    $bannerid = $_GET['bannerid'];
} else {
    echo "<script>
    window.location.href='./add_section';
    </script>";
}
$banner_edit = new Db_functions();
$qry_banner = "SELECT * FROM grt_section_banner WHERE id= $bannerid ";
$qry_banner_res = $banner_edit->data_fetch($qry_banner);
if ($qry_banner_res != 0) {
    foreach ($qry_banner_res as $key => $value) {
        $banner_text = $value['banner_top_text'];
        $banner_heading = $value['banner_heading'];
        $banner_filename = $value['banner_filename'];
        $banner_sub_heading = $value['banner_sub_heading'];
        $banner_date = $value['banner_date'];
        $banner_time = $value['banner_time'];
        $banner_desc = $value['banner_desc'];
        $banner_bnt_action = $value['banner_bnt_action'];

    }
    $get_group_name = "SELECT * FROM grt_section_group WHERE id= $value[section_group_id]";
    $get_group_name_res = $banner_edit->data_fetch($get_group_name);
    if ($get_group_name_res != 0) {

        $banner_group_name = $get_group_name_res[0]['section_group_title'];
        $section_group_desc = $get_group_name_res[0]['section_group_desc'];
        $status = $get_group_name_res[0]['status'];
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
                <input value="<?= $banner_group_name ?>" name="group_name" required="" type="text" class="form-control"
                    id="group_title" aria-describedby="emailHelp" placeholder="Group Name">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Group desc</label>
                <input value="<?= $section_group_desc ?>" name="group_desc" required="" type="text" class="form-control"
                    id="group_desc" aria-describedby="emailHelp" placeholder="Group Short Desc">

            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Group Status</label>
                <select name="banner_status" class="form-control" id="group_status">
                    <option <?= $status == 0 ? "selected" : "" ?> value="0">Active</option>
                    <option <?= $status == 1 ? "selected" : "" ?> value="1">Draft</option>
                </select>

            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Banner Text</label>
                <input value="<?= urldecode($banner_text) ?>" name="banner_text" required="" type="text"
                    class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Text">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Banner Heading</label>
                <input value="<?= urldecode($banner_heading) ?>" name="banner_heading" required="" type="text"
                    class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Heading">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Banner Sub Heading</label>
                <input value="<?= urldecode($banner_sub_heading) ?>" name="banner_sub_heading" required="" type="text"
                    class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Sub-Heading">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Display Date </label>
                <input value="<?= urldecode($banner_date) ?>" name="banner_date" required="" type="date"
                    class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Display Date">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Display Time </label>
                <input value="<?= urldecode($banner_time) ?>" name="banner_time" required="" type="time"
                    class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Display Time">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Display Descreption </label>
                <input value="<?= urldecode($banner_desc) ?>" name="banner_desc" required="" type="text"
                    class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Display Descreption">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Banner Image </label>
                <input value="<?= $banner_filename ?>" name="banner_image" type="File" class="form-control"
                    id="group_desc" aria-describedby="emailHelp" placeholder="Banner Image">
                <img class="my-2" width="300px" src="./assets/images/banners/<?= $banner_filename ?>" alt="">
                <input type="hidden" name="old_image" id="" value="<?= $banner_filename ?>">

            </div>
            <input type="hidden" name="banner_id" value="<?= $bannerid ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Event Action </label>
                <input value="<?= $banner_bnt_action ?>" name="banner_btn_action" required="" type="url"
                    class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="URL">

            </div>

            <button type="submit" name="update_banner" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>

<?php
include "./footer.php";
?>