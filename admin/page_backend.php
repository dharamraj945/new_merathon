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


    if (isset($_POST['inputPairs'])) {

        foreach ($_POST['inputPairs'] as $key => $value) {

            $page_id = $value['pageId'];
            $seq_number = $value['sequence'];

            $qry_sq = "UPDATE `grt_page_section_trans` SET`section_seq`='$seq_number' WHERE id=$page_id";
            $qry_se_res = $page_backend->data_update($qry_sq);
            if ($qry_se_res != 0) {

                $array = array("status" => "success");
                $array_json = json_encode($array);
                header('Content-Type: application/json');
            }
        }
        echo $array_json;
    }

    if (isset($_POST['update_page'])) {


        if ($_POST['Page_title'] != "" && $_POST['page_content'] != "" && $_POST['pageid'] != "") {


            $page_title = $_POST['Page_title'];
            $page_content = $_POST['page_content'];
            $pageid = $_POST['pageid'];

            $page_descreption = $_POST['Page_descreption'];



            $page_is_custom = "SELECT * FROM grt_pages WHERE id=$pageid";



            $page_is_custom_res = $page_backend->data_fetch($page_is_custom);
            if ($page_is_custom_res != 0) {

                $is_custom = $page_is_custom_res[0]['is_custom'];
            }


            if ($is_custom == 0) {

                $assigned_section = implode(',', $page_content);


                // Update data into page 
                $sql_page_update = "UPDATE `grt_pages` SET`page_title`='$page_title',`page_short_desc`='$page_descreption' WHERE id = $pageid";



                $result = $page_backend->data_update($sql_page_update);

                if ($result != 0) {

                    $delete_old_sec = "DELETE FROM `grt_page_section_trans` WHERE page_id=$pageid";

                    $delete_old_sec_res = $page_backend->data_delete($delete_old_sec);
                    if ($delete_old_sec != 0) {
                        foreach ($page_content as $key => $value) {

                            $qry_assign = "INSERT INTO `grt_page_section_trans`( `page_id`, `section_group_id`,`status`) VALUES ('$pageid','$value','0')";

                            $assigned_section = $page_backend->data_insert($qry_assign);
                        }
                        if ($assigned_section != 0) { ?>
                            <script>
                                alert("updated");
                                window.location.href = "./page_edit?pageid=<?= $pageid ?>";
                            </script>
                    <?php }
                    }
                }
            } elseif ($is_custom == 1) {

                $page_content = urlencode($page_content);
                $sql_page_update = "UPDATE `grt_pages` SET`page_title`='$page_title',`page_short_desc`='$page_descreption',`page_content`='$page_content' WHERE id = $pageid";
                $result = $page_backend->data_update($sql_page_update);
                if ($result != 0) { ?>
                    <script>
                        alert("updated");
                        window.location.href = "./page_edit?pageid=<?= $pageid ?>";
                    </script>
                <?php }
            } else {
                echo "undefined Page";
            }
        }
    }

    if (isset($_POST['update_seq'])) {
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
                $sql_page_create = "INSERT INTO `grt_pages`(`page_title`,`page_type`, `page_handler`, `page_short_desc`,page_content,is_custom) VALUES ('$page_title','1','$urlhandler','$page_descreption','$page_content','1')";

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


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['pageid'])) {
        $pageid = $_GET['pageid'];

        $qry_ishome = "SELECT * FROM `grt_pages` WHERE is_index_page=1";
        $qry_ishome_res = $page_backend->data_fetch($qry_ishome);
        if ($qry_ishome_res == 0) {

            $qry_add_homepage = "UPDATE `grt_pages` SET`is_index_page`='1' WHERE id= $pageid";
            $qry_add_homepage_res = $page_backend->data_update($qry_add_homepage);
            if ($qry_add_homepage_res != 0) { ?>
                <script>
                    window.location.href = "./pages";
                </script>
                <?php  }
        } else {
            $currunt_homepage_id = $qry_ishome_res[0]['id'];

            $qry_rem_homepage = "UPDATE `grt_pages` SET`is_index_page`='0' WHERE id= $currunt_homepage_id";
            $qry_rem_homepage_res = $page_backend->data_update($qry_rem_homepage);
            if ($qry_rem_homepage_res != 0) {

                $qry_add_homepage = "UPDATE `grt_pages` SET`is_index_page`='1' WHERE id= $pageid";
                $qry_add_homepage_res = $page_backend->data_update($qry_add_homepage);
                if ($qry_add_homepage_res != 0) { ?>
                    <script>
                        window.location.href = "./pages";
                    </script>
                <?php  }
            }
        }
    }


    if (isset($_GET['deleid'])) {
        $delete_id = $_GET['deleid'];

        $check_trans = "SELECT * FROM grt_page_section_trans WHERE page_id=$delete_id";

        $check_trans_res = $page_backend->data_fetch($check_trans);
        if ($check_trans_res != 0) {
            $qry_delete_page = "DELETE FROM grt_pages WHERE id = $delete_id";
            $page_del = $page_backend->data_delete($qry_delete_page);
            if ($page_del != 0) {
                $qry_delete_section = "DELETE FROM grt_page_section_trans WHERE page_id = $delete_id";
                $page_section_del = $page_backend->data_delete($qry_delete_section);
                if ($page_section_del != 0) { ?>
                    <script>
                        window.location.href = './pages';
                    </script>
                <?php }
            }
        } else {
            $qry_delete_page = "DELETE FROM grt_pages WHERE id = $delete_id";
            $page_del = $page_backend->data_delete($qry_delete_page);
            if ($page_del != 0) { ?>
                <script>
                    window.location.href = './pages';
                </script>
<?php }
        }
    }
}
