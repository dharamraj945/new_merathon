<?php
include "./header.php";
if (isset($_GET['sectionid'])) {
    $sectionid = $_GET['sectionid'];
} else {
    echo "<script>window.location.href='./dashboard'</script>";
}
?>
<div class="row">
    <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

            </div>
            <div class="card-body">
                <form action="./section_custom_backend.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Section Title</label>
                        <input name="section_title" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Title">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Section Description</label>
                        <input name="section_desc" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Description" </div>


                        <div class=" form-group">
                            <label for="exampleInputEmail1">Section Status</label>

                            <select class="form-control" name="section_status" id="" required>

                                <option value="0">Active</option>
                                <option value="1">Draft</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Html Content</label>

                            <textarea placeholder="Paste Your HTML Code Here.." name="section_content" id="editor" cols="30" rows="10" style="display: none;"></textarea>



                        </div>

                        <input type="hidden" name="sectionid" value="<?= $sectionid ?>">

                        <div class="button">

                            <button name="add_custom_sec" class="btn btn-primary" type="submit">Submit</button>
                        </div>

                </form>
            </div>
        </div>
    </div>

</div>
<?php
include "./footer.php";
?>