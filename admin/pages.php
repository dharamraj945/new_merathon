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
                            <th>Desreption</th>
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
                                        <?= $value['page_short_desc'] ?>
                                    </td>
                                    <td> <?= $value['created_date'] ?> </td>
                                    <td><span class="badge badge-success">Active</span></td>
                                    <td><a href="" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="./page_backend?page_id=<?= $value['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
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