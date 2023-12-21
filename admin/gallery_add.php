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

<link rel="stylesheet" href="./css/dropzone.css">

<div class="row">

    <div class="card col-lg-12">
        <div id="result_alert" class="d-none flex-column  justify-content-center align-items-center bg-success text-white my-2">
            <h3>Image Uploaded</h3>
            <a class="text-white" href="./gallery?sectionid=<?= $section_id ?>">Go Back</a>
        </div>

        <div class="mx-2 my-2 text-primary">

            <h1>Upload Image Gallary</h1>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Group Name</label>
            <input name="grouo_name" required="" type="text" class="form-control" id="group_title" aria-describedby="emailHelp" placeholder="Group Name">

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Group desc</label>
            <input name="grouo_desc" required="" type="text" class="form-control" id="group_desc" aria-describedby="emailHelp" placeholder="Group Short Desc">

        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Group Status</label>
            <select class="form-control" id="group_status">
                <option value="0">Active</option>
                <option value="1">Draft</option>
            </select>

        </div>

        <form id="dropzone" class="dropzone"></form>

        <button id="upload_btn" class="btn btn-primary">Upload</button>
    </div>

</div>

<script src="./js/dropzone.js"></script>

<script>
    Dropzone.autoDiscover = false;


    var section_lastid = '';

    var myDropzone = new Dropzone("#dropzone", {

        url: "./gallery_upload.php",
        params: {
            section_lastid: section_lastid,


            // Add more additional data as needed
        },
        parallelUploads: 100,
        uploadMultiple: true,
        acceptedFiles: '.jpg,.png,.jpeg',
        autoProcessQueue: false,
        success: (file, response) => {
            if (response == "true") {
                $("#result_alert").addClass("d-flex");
                $("#upload_btn").hide();

                var groupTitle = $("#group_title").val(null);
                var groupDesc = $("#group_desc").val(null);

            } else {

                console.log("error on calling image ajax");
            }
        }
    })



    $("#upload_btn").click(function() {

        var groupTitle = $("#group_title").val();
        var groupDesc = $("#group_desc").val();
        var groupStatus = $("#group_status").val();

        if (groupTitle != '' && groupDesc != '' && groupStatus != '') {
            var files = myDropzone.getQueuedFiles();

            if (files.length === 0) {
                alert("Gallery is empty. Please add files.");
            } else {
                ajax_add_details(groupTitle, groupDesc, groupStatus);

            }


        } else {
            alert("All Field Required");
        }


    })


    function ajax_add_details(name, desc, status) {

        var section_id = <?php echo $section_id ?>

        var postData = {
            title: name,
            description: desc,
            status: status,
            sectionid: section_id

        };

        $.ajax({
            url: 'gallery_backend.php',
            method: 'POST', // or 'PUT', 'GET', etc. depending on your API
            data: postData,
            dataType: 'json', // the type of data you're expecting back from the server
            success: function(response) {
                // handle the successful response here
                if (response.status == 0 && response.lastid) {


                    section_lastid = response.lastid;
                    myDropzone.options.params.section_lastid = section_lastid;
                    myDropzone.processQueue();



                } else {
                    alert("error to fetch response");
                }


            },
            error: function(error) {
                // handle errors here
                console.log('Error:', error);
            }
        });


    }
</script>
<?php
include "./footer.php";
?>