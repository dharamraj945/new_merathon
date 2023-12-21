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
        $banner_desc = $_POST['banner_desc'];
        $banner_btn_action = $_POST['banner_btn_action'];
        $banner_image = $_FILES['banner_image']['name'];
        $section_id = $_POST['section_id'];

        if ($group_name != "" &&  $group_desc != "" && $banner_status != "" && $banner_text != "" && $banner_heading != "" && $banner_sub_heading != "" &&  $banner_date != "" && $banner_time != "" && $banner_btn_action != "" && $banner_image != "" && $section_id != "") {
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
                                window.location.href = './banner_group?sectionid=<?= $section_id ?>'
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
                <?php   }
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
}
