<?php
include "./header.php";
if (!isset($_GET['section_groupid'])) {
    echo "<script>history.back(-1)</script>";
} else {
    $group_id = $_GET['section_groupid'];
}
$gallery_data = new Db_functions();
$qry = "SELECT * FROM `grt_section_gallery` WHERE section_group_id=$group_id and image_client_id= $_SESSION[active_user]";

$qry_result = $gallery_data->data_fetch($qry);

?>

<div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Gallery View</h6>

    </div>
    <div class="table-responsive">
        <table style="Overflow-x:scroll;" class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th>Sno</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Action</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>


                <?php

                if ($qry_result != 0) {

                    $sno = 0;
                    foreach ($qry_result as $key => $value) {
                        $sno++; ?>
                        <tr>
                            <td><a href="#">1</a></td>
                            <td><img src="./assets/images/uploads/<?= $value['image_name'] ?>" alt="<?= $value['image_alt'] ?>" height="50px" width="50px"></td>
                            <td><?= $value['image_title'] ?></td>
                            <td>
                                <a target="_blank" class="badge badge-primary" href="./assets/images/uploads//<?= $value['image_name'] ?>">View image</a>
                            </td>
                            <td><?= $value['created_date'] ?></td>


                            <td>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#img_del<?= $value['id'] ?>">Delete</button>

                                <!-- Modal -->
                                <div class="modal fade" id="img_del<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are You Sure !</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <span class="text-danger"> You won't be able to revert this !</span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="./gallery_backend.php?img_del=<?= $value['id'] ?>&groupid=<?= $value['section_group_id'] ?>" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->


                            </td>
                        </tr>


                <?php }
                } else {
                    echo "no Images Found";
                }

                ?>




            </tbody>
        </table>
    </div>

</div>

<?php
include "./footer.php";
?>