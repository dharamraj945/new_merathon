<?php
include "./header.php";
if (isset($_GET['group_id'])) {
    $group_id = $_GET['group_id'];
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
                        <label for="exampleInputEmail1">Rating</label>
                        <input name="review_rating" required="" type="number" max="5" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Ratiing">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input name="review_desc" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Description">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Reviwer Name</label>
                        <input type="text" name="review_cus_name" id="" class="form-control" required placeholder="Reviewer Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Reviwer Position</label>
                        <input type="text" name="review_position" id="" class="form-control" required placeholder="Review Position">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Reviwer Image</label>
                        <input type="File" name="review_image" id="" class="form-control" required>
                    </div>

                    <input type="hidden" name="group_id" value="<?= $group_id ?>">

                    <div class="button">

                        <button name="add_new_review" class="btn btn-primary" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

<?php
include "./footer.php";
?>