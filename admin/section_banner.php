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
                            <th>Title</th>
                            <th>Descreption</th>
                            <th>Status</th>
                            <th> Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td><a href="#">1</a></td>
                            <td>Event 2022</td>
                            <td>Event 2022</td>
                            <td>0</td>
                            <td>2023-12-21 22:04:01</td>


                            <td><a href="./section_event_edit?eventgroupid=74&amp;sectionid=3" class="btn btn-sm   btn-primary">Edit</a>
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