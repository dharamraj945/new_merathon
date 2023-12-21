<?php
session_start();
require "./config/class.php";
$page_backend = new Db_functions();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['add_page'])) {

        if ($_POST['Page_title'] != "" && $_POST['page_content'] != "") {

            $page_title = $_POST['Page_title'];
            $page_content = $_POST['page_content'];

            $page_descreption = $_POST['Page_descreption'];
            $assigned_section = implode(',', $page_content);


            $urlhandler = $page_backend->RemoveSpecialChar($page_title);

            //check halder existance
            $qry_check_handler = "SELECT * FROM `grt_pages` WHERE page_handler='$urlhandler'";
            $handler_result = $page_backend->checkForUrlHandler($qry_check_handler);

            if ($handler_result == 0) {

                // insert data into page 
                $sql_page_create = "INSERT INTO `grt_pages`(`page_title`, `page_type`,`page_handler`, `page_short_desc`) VALUES ('$page_title','0','$urlhandler','$page_descreption')";


                $result = $page_backend->data_insert($sql_page_create);

                if ($result != 0) {
                    $lastid = $page_backend->LastId();


                    foreach ($page_content as $key => $value) {

                        $qry_assign = "INSERT INTO `grt_page_section_trans`( `page_id`, `section_group_id`,`status`) VALUES ('$lastid','$value','0')";

                        $assigned_section = $page_backend->data_insert($qry_assign);
                    }
                    if ($assigned_section != 0) {
                        echo "<script>alert('section added');
                    window.location.href='./new_page';
                    </script>";
                    }
                }
            } else {
                echo "<script>alert('Handler Or Title Is Already Exist');
                    window.location.href='./new_page';
                    </script>";
            }
        }
    }


    if (isset($_POST['add_custom_page'])) {

        if ($_POST['Page_title'] != "" && $_POST['page_content'] != "") {

            $page_title = $_POST['Page_title'];
            $page_content = urlencode($_POST['page_content']);

            $page_descreption = $_POST['Page_descreption'];



            $urlhandler = $page_backend->RemoveSpecialChar($page_title);

            //check halder existance
            $qry_check_handler = "SELECT * FROM `grt_pages` WHERE page_handler='$urlhandler'";
            $handler_result = $page_backend->checkForUrlHandler($qry_check_handler);

            if ($handler_result == 0) {

                // insert data into page 
                $sql_page_create = "INSERT INTO `grt_pages`(`page_title`,`page_type`, `page_handler`, `page_short_desc`,page_content) VALUES ('$page_title','1','$urlhandler','$page_descreption','$page_content')";

                $result = $page_backend->data_insert($sql_page_create);

                if ($result != 0) {
                    echo "<script>alert('Page Added');
                    window.location.href='./custom_page';
                    </script>";
                }
            } else {
                echo "<script>alert('Handler Or Title Is Already Exist');
                    window.location.href='./custom_page';
                    </script>";
            }
        }
    }
}
