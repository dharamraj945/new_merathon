<?php
include("./header.php");
$add_aanouncment = new Db_functions();
?>

<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Announcment</h6>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                    <i class=" fa fa-plus"></i> New Announcment
                </button>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Announcment Name</th>
                            <th>Announcment Text</th>
                            <th>URL</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sno = 0;
                        $qry = "SELECT * FROM `dvs_store_announcment`";
                        $show_anmnt = $add_aanouncment->data_fetch($qry);

                        foreach ($show_anmnt as $key => $value) {
                            $sno++;
                        ?>

                            <tr>

                                <td><a href="#"><?= $sno; ?></a></td>
                                <td><?= $value['ancmnt_name']; ?></td>
                                <td><?= $value['ancmnt_text']; ?></td>
                                <td><?= $value['ancmnt_url']; ?></td>
                                <td>

                                    <button class="btn btn-success btn-sm ">
                                        Active </button>
                                </td>
                                <th> <button class="btn btn-danger btn-sm">Delete</button></th>

                            </tr>
                        <?php }
                        ?>





                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Announcment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="text-center">

                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Announcmnet Name</label>
                                    <input type="text" class="form-control" id="exampleInputFirstName" name="announcmnet_name" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label>Announcmnet Text</label>
                                    <input type="text" class="form-control" id="exampleInputFirstName" name="announcmnet_text" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label>Redirect Url</label>
                                    <input type="url" class="form-control" id="exampleInputFirstName" name="announcmnet_url" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="add_announcment" class="btn btn-primary btn-block">Submit</button>
                                </div>

                            </form>


                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["add_announcment"])) {

        $anmnt_name = $_POST['announcmnet_name'];
        $anmnt_text = $_POST['announcmnet_text'];
        $anmnt_url = $_POST['announcmnet_url'];

        if ($anmnt_name != "" && $anmnt_text != "") {

            $qry_anmnt = "INSERT INTO `dvs_store_announcment`(`ancmnt_name`, `ancmnt_text`,`ancmnt_url`) VALUES ('$anmnt_name','$anmnt_text','$anmnt_url')";
            $new_announcment = $add_aanouncment->data_insert($qry_anmnt);
            if ($new_announcment == 1) {
                echo "<script>alert('Announcment Added')
                window.location.href='./announcment_bar';
                </script>";
            } else {
                echo "<script>alert('Announcment Fail')
                window.location.href='./announcment_bar';
                </script>";
            }
        }
    }
}

?>
<?php
include("./footer.php");
?>