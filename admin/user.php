<?php include "./header.php";
$ob1 = new Db_functions();
?>


<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                    <i class=" fa fa-plus"></i> Add new User
                </button>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Sno</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $qry = "SELECT * FROM `users`";
                        $data_users = $ob1->data_fetch($qry);


                        $i = 0;
                        foreach ($data_users as $key => $value) {
                            $i++;
                        ?>
                            <tr>
                                <td><a href="#"><?php echo $i; ?></a></td>
                                <td><?php echo $value['user_name'] ?></td>
                                <td><?php echo $value['user_email'] ?></td>
                                <td><?php echo $value['user_mobile'] ?></td>



                                <td><span class="badge badge-<?php echo  $value['user_status'] == 0 ? "success" : "warning" ?>"><?php echo  $value['user_status'] == 0 ? "Active" : "Disbled" ?></span></td>
                                <td><a href="./profile?profile_id=<?php echo $value['id']; ?>" class="btn btn-sm btn-primary">Edit</a></td>
                            </tr>

                        <?php  }

                        ?>



                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
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
                            <form method="post" action="./config/auth.php">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" id="exampleInputFirstName" name="user_name" placeholder="User Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="exampleInputLastName" placeholder="Email" name="user_email" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" id="exampleInputEmail" placeholder="Phone" name="user_phone" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label>Repeat Password</label>
                                    <input type="password" class="form-control" id="exampleInputPasswordRepeat" placeholder="Repeat Password" name="confirm_password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="add_register" class="btn btn-primary btn-block">Submit</button>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include "./footer.php"; ?>