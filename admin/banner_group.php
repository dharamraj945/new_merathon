<?php
include "./header.php";
if (isset($_GET['sectionid'])) {
    $section_id = $_GET['sectionid'];
} else {
    echo "<script>
    window.location.href='./add_section';
    </script>";
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
                <input name="group_name" required="" type="text" class="form-control" id="group_title" aria-describedby="emailHelp" placeholder="Group Name">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Group desc</label>
                <input name="group_desc" required="" type="text" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Group Short Desc">

            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Group Status</label>
                <select name="banner_status" class="form-control" id="group_status">
                    <option value="0">Active</option>
                    <option value="1">Draft</option>
                </select>

            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Banner Text</label>
                <input name="banner_text" required="" type="text" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Text">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Banner Heading</label>
                <input name="banner_heading" required="" type="text" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Heading">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Banner Sub Heading</label>
                <input name="banner_sub_heading" required="" type="text" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Sub-Heading">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Display Date </label>
                <input name="banner_date" required="" type="date" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Display Date">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Display Time </label>
                <input name="banner_time" required="" type="time" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Display Time">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Display Descreption </label>
                <input name="banner_desc" required="" type="text" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Display Descreption">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Banner Image </label>
                <input name="banner_image" required="" type="File" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Banner Image">

            </div>
            <input type="hidden" name="section_id" value="<?= $section_id ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Event Action </label>
                <input name="banner_btn_action" required="" type="url" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="URL">

            </div>

            <button type="submit" name="add_banner" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>

<?php
include "./footer.php";
?>