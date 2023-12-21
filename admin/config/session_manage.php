<?php
session_start();
if (isset($_SESSION['active_user'])) {

    // print_r($_SESSION);
} else {
    header("location:./login");
}
