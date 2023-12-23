<?php
session_start();
include "./config/class.php";
$blog_obj = new Db_functions();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    if (isset($_POST['add_blog_group']) && isset($_POST['sectionid'])) {

        if ($_POST['section_title'] != "" && $_POST['section_desc'] != '' && $_POST['section_status'] != "") {
            $section_title = urlencode($_POST['section_title']);
            $section_desc = urlencode($_POST['section_desc']);
            $section_status = $_POST['section_status'];
            $client_id = $_SESSION['active_user'];
            $sectionid = $_POST['sectionid'];

            $qry_blog = "INSERT INTO `grt_section_group`( `client_id`, `section_id`, `section_group_title`, `section_group_desc`, `status`) VALUES ('$_SESSION[active_user]','$sectionid','$section_title','$section_desc','$section_status')";
            $qry_res = $testimonial_obj->data_insert($qry_blog);
            echo $qry_blog;



            if ($qry_res != 0) { ?>
                <script>
                    alert("group Created");
                    window.location.href = './blog_group?sectionid=<?= $sectionid ?>';
                </script>
            <?php }
        }
    }


    if (isset($_POST['add_new_blog']) && isset($_FILES['blog_image']['name'])) {

        $blog_heading = urlencode($_POST['blog_heading']);
        $blog_content = urlencode($_POST['blog_content']);
        $blog_author = urlencode($_POST['blog_author']);
        $blog_date = urlencode($_POST['blog_date']);
        $blog_action = urlencode($_POST['blog_action']);
        $group_id = $_POST['group_id'];
        $bloge_image = $_FILES['blog_image']['name'];




        if ($blog_heading != "" && $blog_content != "" && $blog_author != "" && $blog_date != "" && $group_id != "") {


            $extention = pathinfo($bloge_image, PATHINFO_EXTENSION);
            $valid_extention = array("jpg", "jpeg", "png");


            if (in_array($extention, $valid_extention)) {
                $new_name = "Bloge_" . $_SESSION['active_user'] . "_" . rand(99, 9999) . "." . $extention;
                $path = "./assets/images/Bloge/" . $new_name;
                $result = move_uploaded_file($_FILES['blog_image']['tmp_name'], $path);

                if ($result) {
                    $qry_add_blog = "INSERT INTO `grt_section_blog`(`section_group_id`, `bloge_date`, `bloge_image`, `bloge_heading`, `bloge_author`, `bloge_content`, `bloge_action`) VALUES ('$group_id','$blog_date','$new_name','$blog_heading','$blog_author','$blog_content','$blog_action')";

                    $qry_bloge_res = $blog_obj->data_insert($qry_add_blog);

                    if ($qry_bloge_res != 0) {
                        echo "<script>alert('Bloge Added')
                                    window.location.href='./blog_add?group_id=$group_id';
                                </script>";
                    }
                }
            } else {
                echo "<script>alert('only jpg png & jpeg images accepted')
            history.back(-1);
            </script>";
            }
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['del_id'])) {
        $delete_id = $_GET['del_id'];
        $group_id = $_GET['groupid'];
        $section_id = $_GET['sectionid'];

        $qry_del = "DELETE FROM `grt_section_blog` WHERE id = $delete_id";

        $qry_del_res = $blog_obj->data_delete($qry_del);
        if ($qry_del_res != 0) { ?>
            <script>
                window.location.href = './blog_edit?groupid=<?= $group_id ?>&sectionid=<?= $section_id ?>';
            </script>
        <?php }
    }
}
