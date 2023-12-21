<?php include "./header.php";

$obj1 = new Db_functions();

if (isset($_GET['profile_id'])) {
    $sql = "SELECT * FROM `users` WHERE id=$_GET[profile_id]";
} else {
    $sql = "SELECT * FROM `users` WHERE id=$_SESSION[active_user]";
}
$profile_data = $obj1->data_fetch($sql);
$profile_data = $profile_data[0];
?>

<div class="row">


    <div class="col-lg-12">

        <!-- Form Basic -->
        <div class="card mb-4">


            <div class="card-body">
                <div class="row d-flex justify-content-between m-2">

                    <div>
                        Edit Profile
                    </div>
                    <div>

                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal">
                            Change Password
                        </button>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-2 mb-2">
                    <img class="rounded-circle border p-3" width="150px" src="http://localhost/Dashboard/img/boy.png" alt="">
                </div>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input name="new_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Name" value="<?php echo $profile_data['user_name'] ?>">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input name="new_email" type="email" class="form-control" id="exampleInputPassword1" placeholder="Email" value="<?php echo $profile_data['user_email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputphone">Phone</label>
                        <input name="new_phone" type="text" class="form-control" id="exampleInputphone" placeholder="Phone" value="<?php echo $profile_data['user_mobile'] ?>">
                    </div>

                    <button type="submit" name="update_user" class="btn btn-primary">Update </button>
                </form>
            </div>
        </div>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['update_user'])) {

                $new_name = $_POST['new_name'];
                $new_email = $_POST['new_email'];
                $new_phone = $_POST['new_phone'];


                if (isset($_GET['profile_id'])) {
                    $user_update = "UPDATE `users` SET `user_name`='$new_name',`user_email`='$new_email',`user_mobile`='$new_phone' WHERE id= $_GET[profile_id]";
                } else {
                    $user_update = "UPDATE `users` SET `user_name`='$new_name',`user_email`='$new_email',`user_mobile`='$new_phone' WHERE id= $_SESSION[active_user]";
                }
                $update_result = $obj1->data_update($user_update);
                if ($update_result == 1) {
                    echo "
                    <script>
                    alert('User Profile Updated');
                    history.back(-1);
                    </script>
                    ";
                }
            }
        }

        ?>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Password Change</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">New Password</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter New Password" required name="new_password">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" required name="confirm_password">
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="chng_pwd" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['chng_pwd'])) {

    $new_pass = $_POST['new_password'];
    $confirm_pass = $_POST['confirm_password'];
    if ($new_pass == $confirm_pass) {

        if (isset($_GET['profile_id'])) {
            $sql = "UPDATE `users` SET `user_pwd`='$new_pass' WHERE id='$_GET[profile_id]'";
        } else {
            $sql = "UPDATE `users` SET `user_pwd`='$new_pass' WHERE id='$_SESSION[active_user]'";
        }

        echo $sql;
        $result_pwd = $obj1->data_update($sql);
        echo $result_pwd;
        if ($result_pwd != 0) {
            echo "
            <script>
            alert('Password Updated');
            history.back(-1);
            </script>
            ";
        }
    } else {
        echo "
        <script>
        alert('Password Mismatch');
        history.back(-1);
        </script>
        ";
    }
}
?>

<?php include "./footer.php"; ?>