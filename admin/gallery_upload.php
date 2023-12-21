<?php
session_start();
include "./config/class.php";

$gallery_upload = new Db_functions();


if ($_FILES['file']['name'] != "" and $_POST['section_lastid']) {

    $section_last_id = $_POST['section_lastid'];
    $total = count($_FILES['file']['name']);

    for ($i = 0; $i < $total; $i++) {

        $file_name = $_FILES['file']['name'][$i];
        $extention = pathinfo($file_name, PATHINFO_EXTENSION);
        $valid_extention = array("jpg", "jpeg", "png");

        if (in_array($extention, $valid_extention)) {
            $new_name = "user_" . $_SESSION['active_user'] . "_" . rand(99, 9999) . "." . $extention;
            $path = "./assets/images/uploads/" . $new_name;
            $result = move_uploaded_file($_FILES['file']['tmp_name'][$i], $path);

            if ($result) {
                $qry_section_group = "INSERT INTO `grt_section_group`( `client_id`, `section_id`, `section_group_title`, `section_group_desc`, ) VALUES ('$_SESSION[active_user]','1','[value-3]','[value-4]','[value-5]')";

                $qry = "INSERT INTO `grt_section_gallery`(`image_alt`,section_group_id, `image_title`, `image_name`, `image_sequence`, `image_client_id`) VALUES ('$new_name','$section_last_id','$new_name','$new_name','0','$_SESSION[active_user]')";

                $gallery_upload_result = $gallery_upload->data_insert($qry);
            }
        }
    }

    if ($gallery_upload_result != 0) {

        echo "true";
    } else {
        echo  "false";
    }
}
