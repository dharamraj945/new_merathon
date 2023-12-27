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
    <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

            </div>
            <div class="card-body">
                <form action="./section_backend.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Event Group Title</label>
                        <input name="event_title" required="" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="" placeholder="title">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Event Short Desc</label>
                        <input name="event_desc" required="" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="" placeholder="Descreption">

                    </div>

                    <div class="form-group">
                        <select class="form-control" name="event_status" id="">
                            <option value="0">Active</option>
                            <option value="1">Draft</option>

                        </select>

                    </div>

                    <input type="hidden" name="sectionid" value="<?= $section_id ?>">

                    <div class="button">

                        <button name="add_event_group" class="btn btn-primary" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

<?php
include "./footer.php";
?>