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
                <form action="./section_backend.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Text</label>
                        <input name="text" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Text">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Heading Text</label>
                        <input name="heading_text" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Heading Text">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Rich Text</label>

                        <textarea name="richtext" id="editor" cols="30" rows="10"></textarea>


                    </div>

                    <input type="hidden" name="group_id" value="<?= $group_id ?>">

                    <div class="button">

                        <button name="add_new_event" class="btn btn-primary" type="submit">Submit</button>
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