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
                <form action="./bloge_backend.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Heading</label>
                        <input name="blog_heading" required="" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="" placeholder="Heading" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Content</label>
                        <textarea name="blog_content" id="editor" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Author Name</label>
                        <input name="blog_author" required="" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="" placeholder="Author Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Blog Action</label>
                        <input name="blog_action" required="" type="url" class="form-control" id="exampleInputEmail1"
                            aria-describedby="" placeholder="Action" required>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Blog Date</label>
                        <input name="blog_date" required="" type="date" class="form-control" id="exampleInputEmail1"
                            aria-describedby="" placeholder="Datef" required>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Blog Image</label>
                        <input name="blog_image" required="" type="file" class="form-control" id="exampleInputEmail1"
                            aria-describedby="" placeholder="Image" required>
                    </div>



                    <input type="hidden" name="group_id" value="<?= $group_id ?>">

                    <div class="button">

                        <button name="add_new_blog" class="btn btn-primary" type="submit">Submit</button>
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