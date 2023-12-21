<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "grt_cms";


$conn = new mysqli($servername, $username, $password, $db_name);


if ($conn) {

    // echo "connection Succesfull";
} else {
    echo "connection fail";
}
