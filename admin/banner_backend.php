<?php
include "./config/session_manage.php";
include "./config/class.php";
$banner_backend = new Db_functions();
if (isset($_SERVER["REQUEST_METHOD"]) == "POST") {

    if (isset($_POST['add_banner']) && isset($_FILES['banner_image']['name'])) {
        $group_name = $_POST['group_name'];
        $group_desc = $_POST['group_desc'];
        $banner_status = $_POST['banner_status'];
        $banner_text = $_POST['banner_text'];
        $banner_heading = $_POST['banner_heading'];
        $banner_sub_heading = $_POST['banner_sub_heading'];
        $banner_date = $_POST['banner_date'];
        $banner_time = $_POST['banner_time'];
        $banner_desc = urlencode($_POST['banner_desc']);
        $banner_btn_action = $_POST['banner_btn_action'];
        $banner_image = $_FILES['banner_image']['name'];
        $section_id = $_POST['section_id'];

        if ($group_name != "" && $group_desc != "" && $banner_status != "" && $banner_text != "" && $banner_heading != "" && $banner_sub_heading != "" && $banner_date != "" && $banner_time != "" && $banner_btn_action != "" && $banner_image != "" && $section_id != "") {
            $qry_group = "INSERT INTO `grt_section_group`( `client_id`, `section_id`, `section_group_title`, `section_group_desc`, `status`) VALUES ('$_SESSION[active_user]','$section_id','$group_name','$group_desc','$banner_status')";
            $qry_group_res = $banner_backend->data_insert($qry_group);
            if ($qry_group_res != 0) {
                $extention = pathinfo($banner_image, PATHINFO_EXTENSION);
                $valid_extention = array("jpg", "jpeg", "png");


                if (in_array($extention, $valid_extention)) {
                    $banner_image = rand(9, 99999) . rand(9, 99999) . "_banner." . $extention;
                    $path = "./assets/images/banners/" . $banner_image;


                    $result = move_uploaded_file($_FILES['banner_image']['tmp_name'], $path);


                    if ($result) {

                        $last_id = $banner_backend->LastId();
                        $qry_banner_data = "INSERT INTO `grt_section_banner`(`section_group_id`, `banner_top_text`, `banner_heading`, `banner_filename`, `banner_sub_heading`, `banner_date`, `banner_time`, `banner_desc`, `banner_bnt_action`) VALUES ('$last_id','$banner_text','$banner_heading','$banner_image','$banner_sub_heading','$banner_date','$banner_time','$banner_desc','$banner_btn_action')";

                        $qry_banner_data_res = $banner_backend->data_insert($qry_banner_data);
                        if ($qry_banner_data_res != 0) { ?>

                            <script>
                                alert("Banner Added !");
                                window.location.href = './section_banner?sectionid=<?= $section_id ?>'
                            </script>
                        <?php }
                    } else {
                        echo "failed to move Images";
                    }
                } else { ?>
                    <script>
                        alert("Only JPG PNG JPEG Type Accepted !");
                        history.back(-1);
                    </script>
                <?php }
            } else { ?>
                <script>
                    alert("Fail TO create Group !");
                    history.back(-1);
                </script>
            <?php }
        } else { ?>
            <script>
                alert("all Fields are Required !");
                history.back(-1);
            </script>

        <?php }
    }


    //update banner

    if (isset($_POST['update_banner'])) {


        if (isset($_POST['update_banner'])) {
            $group_name = $_POST['group_name'];
            $group_desc = $_POST['group_desc'];
            $banner_status = $_POST['banner_status'];
            $banner_text = $_POST['banner_text'];
            $banner_heading = $_POST['banner_heading'];
            $banner_sub_heading = $_POST['banner_sub_heading'];
            $banner_date = $_POST['banner_date'];
            $banner_time = $_POST['banner_time'];
            $banner_desc = urlencode($_POST['banner_desc']);
            $banner_btn_action = $_POST['banner_btn_action'];
            $banner_id = $_POST['banner_id'];


            if ($group_name != "" && $group_desc != "" && $banner_status != "" && $banner_text != "" && $banner_heading != "" && $banner_sub_heading != "" && $banner_date != "" && $banner_time != "" && $banner_btn_action != "" && $banner_id != "") {


                $qry_banner = "SELECT * FROM `grt_section_banner` WHERE id= $banner_id";
                $qry_banner_res = $banner_backend->data_fetch($qry_banner);
                if ($qry_banner_res != 0) {
                    $banner_group_id = $qry_banner_res[0]['section_group_id'];

                    $update_section_group = "UPDATE `grt_section_group` SET `section_group_title`='$group_name',`section_group_desc`='$group_desc',`status`='$banner_status' WHERE id = $banner_group_id";
                    $update_section_group_res = $banner_backend->data_update($update_section_group);
                    if ($update_section_group_res != 0) {

                        if ($_FILES['banner_image']['name'] != "") {
                            $banner_image = $_FILES['banner_image']['name'];
                            $extention = pathinfo($banner_image, PATHINFO_EXTENSION);
                            $valid_extention = array("jpg", "jpeg", "png");
                            if (in_array($extention, $valid_extention)) {
                                $banner_image = rand(9, 99999) . rand(9, 99999) . "_banner." . $extention;
                                $path = "./assets/images/banners/" . $banner_image;
                                $result = move_uploaded_file($_FILES['banner_image']['tmp_name'], $path);

                                if ($result) {

                                    $qry_update_banner_data = "UPDATE `grt_section_banner` SET `banner_top_text`='$banner_text',`banner_heading`='$banner_heading',`banner_filename`='$banner_image',`banner_sub_heading`='$banner_sub_heading',`banner_date`='$banner_date',`banner_time`='$banner_time',`banner_desc`='$banner_desc',`banner_bnt_action`='$banner_btn_action' WHERE id=$banner_id";

                                    $qry_update_banner_data_res = $banner_backend->data_update($qry_update_banner_data);


                                    if ($qry_update_banner_data_res != 0) { ?>

                                        <script>
                                            alert("Updated");
                                            window.location.href = 'banner_edit.php?bannerid=<?= $banner_id ?>';
                                        </script>

                                    <?php }

                                }

                            }

                        } else {
                            $banner_image = $_POST['old_image'];

                            $qry_update_banner_data = "UPDATE `grt_section_banner` SET `banner_top_text`='$banner_text',`banner_heading`='$banner_heading',`banner_filename`='$banner_image',`banner_sub_heading`='$banner_sub_heading',`banner_date`='$banner_date',`banner_time`='$banner_time',`banner_desc`='$banner_desc',`banner_bnt_action`='$banner_btn_action' WHERE id=$banner_id";

                            $qry_update_banner_data_res = $banner_backend->data_update($qry_update_banner_data);


                            if ($qry_update_banner_data_res != 0) { ?>

                                <script>
                                    alert("Updated");
                                    window.location.href = 'banner_edit.php?bannerid=<?= $banner_id ?>';
                                </script>

                            <?php }

                        }




                    }


                }




            }
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['del_banner']) && isset($_GET['sectionid'])) {

        $banner_id = $_GET['del_banner'];
        $section_id = $_GET['sectionid'];

        $qry = "SELECT * FROM `grt_section_banner` WHERE id = $banner_id";

        $qry_res = $banner_backend->data_fetch($qry);
        if ($qry_res != 0) {

            $section_group_id = $qry_res[0]['section_group_id'];
            $banner_filename = $qry_res[0]['banner_filename'];

            $path = "./assets/images/banners/$banner_filename";
            $res_imgdel = unlink($path);
            if ($res_imgdel) {
                $qry_del_group = "DELETE FROM `grt_section_group` WHERE id=$section_group_id";
                $qry_del_group_res = $banner_backend->data_delete($qry_del_group);
                if ($qry_del_group_res != 0) {

                    $qry_del_banner = "DELETE FROM `grt_section_banner` WHERE id=$banner_id";
                    $qry_del_banner_res = $banner_backend->data_delete($qry_del_banner);
                    if ($qry_del_banner != 0) { ?>

                        <script>
                            window.location.href = "section_banner.php?sectionid=<?= $section_id ?>";
                        </script>
                    <?php }

                }
            }



        }

    }
}
