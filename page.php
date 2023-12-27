<?php
include './header.php';
if (isset($_GET['page_handler'])) {
    $page_handler = $_GET['page_handler'];
} else {
    echo "<script>
    window.location.href='./';
    </script>";
}
$page_obj = new Db_functions();


$qry_main = "SELECT * FROM grt_pages  WHERE page_handler='$page_handler'";
$qry_main_res = $page_obj->data_fetch($qry_main);
if ($qry_main_res != 0) {

    $is_custom = $qry_main_res[0]['is_custom'];
    $page_name = $qry_main_res[0]['page_title'];
}

if ($is_custom != 1) {
    $qry = "SELECT * FROM `grt_pages` gp INNER JOIN  grt_page_section_trans gpst on gp.id = gpst.page_id WHERE gp.page_handler='$page_handler' ORDER BY section_seq";
} else {

    $qry = "SELECT * FROM `grt_pages` WHERE page_handler='$page_handler' ";
}


$qry_run = $page_obj->data_fetch($qry);
?>


<main>

    <div class="container">
        <div class="row py-5">

            <h2><?= $page_name ?></h2>
        </div>
        <?php



        if ($qry_run != 0) {

            if ($is_custom != 1) {

                foreach ($qry_run as $key => $values) {

                    $section_group_id = $values['section_group_id'];
                    $get_section_group = "SELECT * FROM `grt_section_group` WHERE id = $section_group_id and status=0";
                    $get_section_res = $page_obj->data_fetch($get_section_group);
                    if ($get_section_res != 0) {


                        $section_id = $get_section_res[0]['section_id'];
                        $section_data_id = $get_section_res[0]['id'];
                        $section_group_title = $get_section_res[0]['section_group_title'];
                        $section_group_desc = $get_section_res[0]['section_group_desc'];

                        $get_section_class = "SELECT * FROM `grt_sections` WHERE id = $section_id ";
                        $get_section_class_res = $page_obj->data_fetch($get_section_class);
                        if ($get_section_class_res != 0) {
                            foreach ($get_section_class_res as $key => $value_classname) {


                                $render_className = $value_classname['section_class'];
                                $page_obj->$render_className($section_group_title, $section_group_desc, $section_data_id);
                            }
                        }
                    }
                }
            } else {



                $get_section_group = "SELECT * FROM `grt_pages`WHERE  page_handler= '$page_handler' and is_custom=1";

                $get_section_res = $page_obj->data_fetch($get_section_group);
                if ($get_section_res != 0) {
                    $custom_section_data = urldecode($get_section_res[0]['page_content']); ?>
                    <div class="container">

                        <?=
                        html_entity_decode($custom_section_data);

                        ?>
                    </div>
            <?php }
            }
        } else { ?>
            <div class="container">
                <div class="d-flex align-items-center justify-content-center vh-100">
                    <div class="text-center">
                        <h1 class="display-1 fw-bold">404</h1>
                        <p class="fs-3"> <span class="text-danger">Opps!</span> Page not found.</p>
                        <p class="lead">
                            The page you’re looking for doesn’t exist.
                        </p>
                        <a href="./index" class="btn btn-primary">Go Home</a>
                    </div>
                </div>
            <?php }
            ?>
            </div>
</main>


<?php
include './footer.php';
?>