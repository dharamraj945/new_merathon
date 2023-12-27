<?php include "./header.php";
$obj_homepage = new Db_functions();

$qry = "SELECT * FROM `grt_pages` gp INNER JOIN  grt_page_section_trans gpst on gp.id = gpst.page_id WHERE gp.is_index_page = 1  and gpst.status=0 ORDER BY section_seq";

$home_qry = $obj_homepage->data_fetch($qry);




?>

<main>
    <?php

    if ($home_qry != 0) {
        foreach ($home_qry as $key => $values) {

            $section_group_id = $values['section_group_id'];
            $get_section_group = "SELECT * FROM `grt_section_group` WHERE id = $section_group_id and status=0";
            $get_section_res = $obj_homepage->data_fetch($get_section_group);
            if ($get_section_res != 0) {


                $section_id = $get_section_res[0]['section_id'];
                $section_data_id = $get_section_res[0]['id'];
                $section_group_title = $get_section_res[0]['section_group_title'];
                $section_group_desc = $get_section_res[0]['section_group_desc'];

                $get_section_class = "SELECT * FROM `grt_sections` WHERE id = $section_id ";
                $get_section_class_res = $obj_homepage->data_fetch($get_section_class);
                if ($get_section_class_res != 0) {
                    foreach ($get_section_class_res as $key => $value_classname) {

                        $render_className = $value_classname['section_class'];
                        $obj_homepage->$render_className($section_group_title, $section_group_desc, $section_data_id);
                    }
                }
            }
        }
    }
    ?>

</main>

<?php include "./footer.php" ?>