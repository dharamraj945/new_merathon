<?php
session_start();
include "./config/class.php";
$obj_custome_sec = new Db_functions();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_custom_sec'])) {
        if ($_POST['section_title'] != "" && $_POST['section_desc'] != "" && $_POST['section_content'] != "" && $_POST['sectionid']) {

            $section_title = $_POST['section_title'];
            $section_status = $_POST['section_status'];
            $section_desc = $_POST['section_desc'];
            $section_content = urlencode($_POST['section_content']);
            $sectionid = $_POST['sectionid'];

            $qry_create_group = "INSERT INTO `grt_section_group`( `client_id`, `section_id`, `section_group_title`, `section_group_desc`, `status` ) VALUES ('$_SESSION[active_user]','$sectionid','$section_title','$section_desc','$section_status')";

            $qry_custom_res = $obj_custome_sec->data_insert($qry_create_group);
            if ($qry_custom_res != 0) {

                $last_id = $obj_custome_sec->LastId();

                $qry_add_section = "INSERT INTO `grt_section_custom`(`section_group_id`, `section_content` ) VALUES ('$last_id','$section_content')";

                $qry_add_section_res = $obj_custome_sec->data_insert($qry_add_section);
                if ($qry_add_section != 0) { ?>
                    <script>
                        alert("section Added");
                        window.location.href = './section_custom_add?sectionid=<?= $sectionid ?>';
                    </script>
<?php }
            }
        }
    }
}
