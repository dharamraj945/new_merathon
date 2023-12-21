<?php

include "./header.php";
?>





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
                        <input name="Page_title" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Title">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Page Descreptopn</label>
                        <input name="Page_descreption" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Descreption">

                    </div>




                    <div class="form-group">
                        <label for="exampleInputEmail1">Content</label>

                        <textarea class="form-control" name="page_content" id="editor" cols="30" rows="10"></textarea>
                    </div>

                    <div class="button">

                        <button name="add_custom_page" class="btn btn-primary" type="submit">Submit</button>
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