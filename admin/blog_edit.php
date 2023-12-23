<?php
include "./header.php";
if (isset($_GET['groupid']) and isset($_GET['sectionid'])) {
    $groupid = $_GET['groupid'];
    $sectionid = $_GET['sectionid'];
} else {
    echo "<script>window.location.href='./'</script>";
}
$show_bloge = new Db_functions();

$qry = "SELECT * FROM `grt_section_blog` WHERE section_group_id=$groupid";

$result_data = $show_bloge->data_fetch($qry);



?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Events</h6>
                <a href="./blog_add?group_id=<?= $groupid ?>" class="btn btn-primary btn-sm">
                    <i class=" fa fa-plus"></i> Add New Blog
                </a>
            </div>
            <div class="table-responsive">
                <table style="Overflow-x:scroll;" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Sno</th>
                            <th>Image</th>
                            <th>Heading</th>
                            <th>Author Name</th>

                            <th>Bloge Action</th>

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
                                    <td>
                                        <a href="#">
                                            <?= $sno ?>
                                        </a>


                                    </td>
                                    <td class="mx-2">
                                        <img height="80px" width="80px"
                                            src="./assets/images/bloge/<?= $values['bloge_image'] ?>" alt="">
                                    </td>
                                    <td>
                                        <?= urldecode(substr($values['bloge_heading'], 0, 50)) . ".." ?>
                                    </td>
                                    <td>
                                        <?= urldecode(substr($values['bloge_author'], 0, 50)) ?>
                                    </td>

                                    <td>

                                        <a target="_blank" class="btn btn-sm btn-success"
                                            href="<?= urldecode($values['bloge_action']) ?>">Check</a>

                                    </td>



                                    <td>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#bloge_del<?= $values['id'] ?>">Delete</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="bloge_del<?= $values['id'] ?>" tabindex="-1" role="dialog"
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
                                                        <a href="./bloge_backend.php?del_id=<?= $values['id'] ?>&groupid=<?= $groupid ?>&sectionid=<?= $sectionid ?>"
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
                            echo "no event found";
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