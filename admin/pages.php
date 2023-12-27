<?php
include "./header.php";
$data_page = new Db_functions();
$qry = "SELECT * FROM `grt_pages`";
$qry_res = $data_page->data_fetch($qry);

?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Content</h6>
                <a class="btn btn-primary btn-sm" href="./new_page">
                    <i class=" fa fa-plus"></i> Add new
                </a>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Sno</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sno = 0;
                        if ($qry_res != 0) {
                            foreach ($qry_res as $key => $value) {
                                $sno++;

                        ?>
                                <tr>
                                    <td><a href="#"> <?= $sno ?> </a></td>
                                    <td> <?= $value['page_title'] ?> </td>
                                    <td>

                                        <span class="badge badge-<?= $value['is_custom'] == 0 ? "warning" : "primary" ?>"><?= $value['is_custom'] == 0 ? "Section Page" : "Custom Page" ?></span>

                                    </td>

                                    <td> <?= $value['created_date'] ?> </td>

                                    <td>

                                        <a href="../page?page_handler=<?= $value['page_handler'] ?>" class="badge badge-primary">View</a> <span class="badge badge-success">Active</span>

                                    </td>

                                    <td><a href="./page_edit?pageid=<?= $value['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <button data-toggle="modal" data-target="#deleid_<?= $value['id'] ?>" class="btn btn-sm btn-danger">Delete</button>
                                        <button <?= $value['is_index_page'] == 1 ? 'disabled' : ''; ?> class="btn btn-sm btn-<?= $value['is_index_page'] == 1 ? 'success' : 'secondary' ?>" data-toggle="modal" data-target="#home_<?= $value['id'] ?>"> <?= $value['is_index_page'] == 1 ? 'Active Home Page' : 'Mark as HomePage' ?></button>
                                    </td>




                                    <!-- Modal -->
                                    <div class="modal fade" id="home_<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are You Sure !</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <span class="text-success"> This Page Will Marked as Homepage</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="./page_backend.php?pageid=<?= $value['id'] ?>" class="btn btn-success">Mark</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->

                                    <div class="modal fade" id="deleid_<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are You Sure !</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <span class="text-danger"> This Page Will be Removed From Your Store</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="./page_backend.php?deleid=<?= $value['id'] ?>" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->








                                </tr>


                        <?php }
                        } else {
                            echo "No Data Found";
                        }

                        ?>










                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>
<?php
include "./footer.php";
?>