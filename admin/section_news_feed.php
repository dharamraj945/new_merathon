<?php
include "./header.php";
$review_obj = new Db_functions();

if (isset($_GET['sectionid'])) {
    $sectionid = $_GET['sectionid'];
}


$qry_review = "SELECT * FROM `grt_section_group` WHERE section_id=$sectionid";
$result = $review_obj->data_fetch($qry_review);
?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Bloge Groups</h6>
                <a href="./blog_group?sectionid=<?= $sectionid ?>" class="btn btn-primary btn-sm">
                    <i class=" fa fa-plus"></i> Create Group
                </a>
            </div>
            <div class="table-responsive">
                <table style="Overflow-x:scroll;" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Sno</th>
                            <th>Title</th>
                            <th>Descreption</th>
                            <th>Status</th>
                            <th> Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result != 0) {
                            $sno = 0;
                            foreach ($result as $key => $value) {
                                $sno++;
                                ?>

                                <tr>
                                    <td><a href="#">
                                            <?= $sno ?>
                                        </a></td>
                                    <td>
                                        <?= urldecode($value['section_group_title']) ?>
                                    </td>
                                    <td>
                                        <?= urldecode($value['section_group_desc']) ?>
                                    </td>
                                    <td>0</td>
                                    <td>2023-12-21 22:04:01</td>


                                    <td><a href="./blog_edit?groupid=<?= $value['id'] ?>&sectionid=<?= $value['section_id'] ?>"
                                            class="btn btn-sm   btn-primary">Edit</a>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#event_section_del">Delete</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="menu_del50" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are You Sure !</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span class="text-danger"> You won't be able to revert this !</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="./menus_backend.php?del_menu=50"
                                                            class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->


                                    </td>
                                </tr>

                            <?php }
                        } else {
                            echo "No Record Found !";
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