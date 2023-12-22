<?php
include "./header.php";
if (isset($_GET['sectionid'])) {
    $sectionid = $_GET['sectionid'];
} else {
    echo "<script>window.location.href='./dashboard'</script>";
}
?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Events</h6>
                <a href="./section_custom_add?sectionid=<?= $sectionid ?>" class="btn btn-primary btn-sm">
                    <i class=" fa fa-plus"></i> Add New Event
                </a>
            </div>
            <div class="table-responsive">
                <table style="Overflow-x:scroll;" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Sno</th>

                            <th>Text</th>
                            <th>Heading Text</th>

                            <th> Sequence</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td><a href="#">1</a></td>
                            <td>01</td>
                            <td>Trail-a-thon-2023 is to be held on the 29th of Jan 2023</td>
                            <td>0</td>


                            <td>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#menu_del50">Delete</button>

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