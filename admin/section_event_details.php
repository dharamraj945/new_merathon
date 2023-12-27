<?php
include "./header.php";
if (isset($_GET['sectionid'])) {
    $section_id = $_GET['sectionid'];
} else {
    echo "<script>
    window.location.href='./add_section';
    </script>";
}
$show_events = new Db_functions();
$qry = "SELECT * FROM `grt_section_group` WHERE section_id= $section_id and client_id= $_SESSION[active_user]";
$result_data = $show_events->data_fetch($qry);




?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Events Group</h6>
                <a href="./section_event_group?sectionid=<?= $section_id ?>" class="btn btn-primary btn-sm">
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
                        $sno = 0;
                        if ($result_data != 0) {

                            foreach ($result_data as $key => $values) {

                                $sno++; ?>

                                <tr>
                                    <td><a href="#">
                                            <?= $sno ?>
                                        </a></td>
                                    <td>
                                        <?= $values['section_group_title'] ?>
                                    </td>
                                    <td>
                                        <?= $values['section_group_desc'] ?>
                                    </td>
                                    <td>

                                        <span class="badge badge-<?= $values['status'] == 0 ? "success" : "warning" ?>">
                                            <?= $values['status'] == 0 ? "Active" : "Draft" ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?= $values['created_date'] ?>
                                    </td>



                                    <td><a href="./section_event_edit?eventgroupid=<?= $values['id'] ?>&sectionid=<?= $section_id ?>"
                                            class="btn btn-sm   btn-primary">Manage</a>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#group_<?= $values['id'] ?>">Delete</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="group_<?= $values['id'] ?>" tabindex="-1" role="dialog"
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
                                                        <a href="./section_backend.php?del_event=<?= $values['id'] ?>&sectionid=<?= $section_id ?>"
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
                            echo "No Result Found";
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