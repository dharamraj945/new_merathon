<?php
include "./config/session_manage.php";
include "./config/class.php";
$gallery_bacend = new Db_functions();

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['img_del']) and $_GET['groupid']) {
        $group_id = $_GET['groupid'];
        $delete_id = $_GET['img_del'];

        $qry_image_file = "SELECT * FROM `grt_section_gallery` WHERE id= $delete_id";
        $qry_image_file_result = $gallery_bacend->data_fetch($qry_image_file);
        $filename = '';
        if ($qry_image_file_result != 0) {

            foreach ($qry_image_file_result as $key => $value) {
                $filename = $value['image_name'];
            }
        }

        if ($filename != "") {

            $delete_file = "./assets/images/uploads/" . $filename;
            $is_del = unlink($delete_file);
            if ($is_del) {


                $qry = "DELETE FROM `grt_section_gallery` WHERE id=$delete_id";
                $qry_res = $gallery_bacend->data_delete($qry);

                if ($qry_res != 0) {
                    echo "<script>window.location.href='./gallery_view?section_groupid=" . $group_id . "'</script>";
                } else {
                    echo "<script>alert('fail');</script>";
                }
            }
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {



    if (isset($_POST['title'])) {

        $title = $_POST['title'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $sectionid = $_POST['sectionid'];

        if ($title != "" && $description != "" && $status != "" && $sectionid != "") {

            $qry_insertGroup = "INSERT INTO `grt_section_group`( `client_id`, `section_id`, `section_group_title`, `section_group_desc`, `status` ) VALUES ('$_SESSION[active_user]','$sectionid','$title','$description','$status') ";

            $result_gall_dat = $gallery_bacend->data_insert($qry_insertGroup);

            if ($result_gall_dat != 0) {
                $last_id_data = $gallery_bacend->LastId();

                $array_data = array("status" => 0, "lastid" => $last_id_data);
                $jsonResponse = json_encode($array_data);
                header('Content-Type: application/json');
                echo $jsonResponse;
            }
        } else {

            echo "error To get Post Data validatin Failed";
        }
    }
}
