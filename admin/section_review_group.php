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
                <form action="./testimonial_backend.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Group Title</label>
                        <input name="section_title" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="title">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Short Desc</label>
                        <input name="section_desc" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Descreption">

                    </div>

                    <div class="form-group">
                        <select class="form-control" name="section_status" id="">
                            <option value="0">Active</option>
                            <option value="0">Draft</option>

                        </select>

                    </div>

                    <input type="hidden" name="sectionid" value="<?= $section_id ?>">

                    <div class="button">

                        <button name="add_testimonial_group" class="btn btn-primary" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

<?php
include "./footer.php";
?>