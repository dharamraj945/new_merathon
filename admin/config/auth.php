<?php
session_start();
include "./db_config.php";
include "./class.php";

$obj1 = new Db_functions();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['log_in'])) {

        $username = $_POST['email_id'];
        $password = $_POST['password'];



        if ($username != "") {

            if ($password != "") {


                $check_user = "SELECT * FROM `users` WHERE user_email='$username' AND user_pwd='$password'";
                echo $check_user;
                $check_user_run = $conn->query($check_user);

                if (mysqli_num_rows($check_user_run) > 0) {

                    $data = mysqli_fetch_assoc($check_user_run);

                    $_SESSION['active_user'] = $data['id'];
                    $_SESSION['user_name'] = $data['user_name'];
                    $_SESSION['user_status'] = $data['user_status'];
                    $_SESSION['user_type'] = $data['user_type'];

                    header("location:../dashboard");
                } else {
                    echo "
                    <script>
                    alert('Invalid User');
                    history.back(-1);
                    </script>
                    ";
                }
            } else {

                echo "
                <script>
                alert('please Enter password');
                history.back(-1);
                </script>
                ";
            }
        } else {
            echo "
            <script>
            alert('please Enter Username');
            history.back(-1);
            </script>
            ";
        }
    }


    if (isset($_POST['add_register'])) {
        // print_r($_POST);

        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_phone = $_POST['user_phone'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        $user_existance = "SELECT * FROM `users` WHERE user_email= '$user_email'";
        $user_existance_run = $obj1->data_fetch($user_existance);

        if ($user_existance_run == 0) {

            if ($password == $confirm_password) {

                $user_insert = "INSERT INTO `users`( `user_name`, `user_email`, `user_mobile`, `user_pwd`) VALUES ('$user_name','$user_email','$user_phone','$password')";

                $response = $obj1->data_insert($user_insert);
                if ($response == 1) {

                    echo "
                    <script>
                    alert('User Added');
                    window.location.href='../user';
                    </script>
                    ";
                }
            } else {
                echo "
                <script>
                alert('Password mismatch');
                history.back(-1);
                </script>
                ";
            }
        } else {
            echo "
            <script>
            alert('User Already exist ');
            history.back(-1);
            </script>
            ";
        }
    }
}
