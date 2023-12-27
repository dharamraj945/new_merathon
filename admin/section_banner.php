<?php
include "./header.php";
$section_banner = new Db_functions();
if (isset($_GET['sectionid'])) {
    $section_id = $_GET['sectionid'];
} else {
    echo "<script>
    window.location.href='./add_section';
    </script>";
}
$banner_obj = new Db_functions();

?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Events Group</h6>
                <a href="./banner_group?sectionid=<?= $section_id ?>" class="btn btn-primary btn-sm">
                    <i class=" fa fa-plus"></i> Create Group
                </a>
            </div>
            <div class="table-responsive">
                <table style="Overflow-x:scroll;" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Sno</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th> Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $qry = "SELECT * FROM grt_section_banner";
                        $qry_res = $banner_obj->data_fetch($qry);
                        if ($qry_res != 0) {
                            $sno = 0;
                            foreach ($qry_res as $key => $value) {
                                $sno++;

                        ?>
                                <tr>
                                    <td><a href="#"><?= $sno ?></a></td>
                                    <td><img height="80px" width="80px" src="./assets/images/banners/<?= $value['banner_filename'] ?>" alt=""></td>
                                    <td><?php
                                        $qry_group_name = "SELECT * FROM grt_section_group WHERE id= $value[section_group_id] ";
                                        $qry_group_name_res = $banner_obj->data_fetch($qry_group_name);
                                        if ($qry_group_name_res != 0) {
                                            $banner_group_name = $qry_group_name_res[0]['section_group_title'];
                                            $banner_group_status = $qry_group_name_res[0]['status'];
                                        }
                                        echo $banner_group_name;
                                        ?></td>
                                    <td>

                                        <span class="badge badge-<?= $banner_group_status == 0 ? "success" : "secondary" ?>"><?= $banner_group_status == 0 ? "Active" : "Draft" ?></span>

                                    </td>
                                    <td><?= $value['created_date'] ?></td>



                                    <td><a href="./banner_edit.php?bannerid=<?= $value['id'] ?>" class="btn btn-sm   btn-primary">Edit</a>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#event_section_del">Delete</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="menu_del50" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <a href="./menus_backend.php?del_menu=50" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->


                                    </td>
                                </tr>

                        <?php
                            }
                        } else {
                            echo "no Data Found";
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