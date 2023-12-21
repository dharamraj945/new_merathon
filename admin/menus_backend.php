<?php
require "./config/session_manage.php";
require "./config/class.php";
$menu_obj = new Db_functions();
//add New Menu Start
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_menu'])) {

        if ($_POST['menu_name'] != "" && $_POST['menu_type'] != "" && $_POST['menu_status'] != "" && $_POST['menu_action'] != "" && $_POST['menu_sequence'] != "") {


            $menu_name = $_POST['menu_name'];
            $menu_type = $_POST['menu_type'];
            $menu_status = $_POST['menu_status'];
            $menu_action = $_POST['menu_action'];
            $menu_sequence = $_POST['menu_sequence'];
            $menu_action_type = $_POST['menu_action_type'];

            $menu_handler =  $menu_obj->RemoveSpecialChar($menu_name);

            //insert Menu Data in Database

            //check for handler existance
            $is_exist_handler = "SELECT menu_handler FROM `section_menu` WHERE menu_handler= '$menu_handler'";
            $exist_result = $menu_obj->data_fetch($is_exist_handler);

            echo $exist_result;
            if ($exist_result != 0) {

                echo "<script>alert('Handler Aready Exist')
                    window.location.href='./menus';

                </script>";
                exit();
            }



            $qry = "INSERT INTO `section_menu`(`menu_name`, `menu_handler`, `menu_type`, `menu_action`, `menu_status`, `menu_seq`,`menu_action_type`) VALUES ('$menu_name','$menu_handler','$menu_type','$menu_action','$menu_status','$menu_sequence','$menu_action_type')";
            $result = $menu_obj->data_insert($qry);

            if ($result != 0) {
                echo "<script>alert('Menu Added')
                window.location.href='./menus';
                </script>";
            }
        }
    }
    //add New Menu End


    //ajax call for get  pages  start

    if (isset($_POST['data_menu_type'])) {

        $menu_type = $_POST['data_menu_type'];
        // 0 for page 
        // 1 for custom url 

        if ($menu_type == 0) {


            $qry = "SELECT * FROM `pages` WHERE page_status=0";
            $qry_result = $menu_obj->data_fetch($qry);
            if ($qry_result != 0) {
                echo '<label>Select Page</label>';
                echo '<select id="menu_action" name="menu_action" class="form-control mb-3" required=""> ';
                foreach ($qry_result as $key => $value) { ?>


                    <option value="<?= $value['id'] ?>"><?= $value['page_title'] ?></option>



                <?php  }

                echo '</select>';
            } else { ?>

                <label for="">No Page Found</label>
                <a href="./new_page">Add new Page</a>

            <?php }
        } elseif ($menu_type == 1) { ?>

            <label for="">Custom Url</label>
            <input value="" type="url" class="form-control" id="menu_type_value" placeholder="Url" name="menu_action" required>

<?php }
    }
    //ajax call for get  pages  End



    if (isset($_POST['update_menu'])) {

        print_r($_POST);
    }
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['del_menu'])) {
        $del_id = $_GET['del_menu'];

        $qry_delete_menu = "DELETE FROM `section_menu` WHERE id=$del_id";
        $result = $menu_obj->data_delete($qry_delete_menu);

        if ($result != 0) {
            echo "<script>
            window.location.href='./menus.php';
            </script>";
        } else {

            echo "<script>
            alert('fail');
            window.location.href='./menus.php';
            </script>";
        }
    }
}
