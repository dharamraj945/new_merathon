<?php
session_start();
include "./config/class.php";
$sec_back = new Db_functions();

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (isset($_POST['create_section'])) {

        if (($_POST['page_content'] != "")) {

            $page_contant = $_POST['page_content'];


            foreach ($page_contant as $key => $values) {


                $qry = "INSERT INTO `front_sections`( `section_id`,`client_id`, `section_seq`) VALUES ('$values','$_SESSION[active_user]','0')";
                $result = $sec_back->data_insert($qry);
            }

            if ($result != 0) {

                echo "<script>alert('section Updated');
                window.location.href='./front_home';
                </script>";
            } else {
                echo "fail";
            }
        }
    }

    //section new event 



    if (isset($_POST['add_new_event'])) {

        print_r($_POST);
        if ($_POST['text'] != "" && $_POST['heading_text'] != '' && $_POST['group_id'] != "") {

            $text = $_POST['text'];

            $richtext = $_POST['richtext'];
            $richtext = urlencode($richtext);
            $client_id = $_SESSION['active_user'];
            $group_id = $_POST['group_id'];
            $heading_text = $_POST['heading_text'];

            $qry_event = "INSERT INTO `grt_section_events`(`section_group_id`, `section_text`, `section_heading`, `section_richtext`,`section_sequence`) VALUES ('$group_id','$text',
            '$heading_text','$richtext','0')";


            $qry_res = $sec_back->data_insert($qry_event);


            if ($qry_res != 0) {

                echo "<script>alert('added')
                window.location.href='./section_event_details.';
                </script>";
            }
        }
    }



    if (isset($_POST['add_event_group'])) {

        print_r($_POST);
        if ($_POST['event_title'] != "" && $_POST['event_desc'] != '' && $_POST['event_status'] != "") {

            $event_title = $_POST['event_title'];
            $event_desc = $_POST['event_desc'];
            $event_status = $_POST['event_status'];
            $client_id = $_SESSION['active_user'];
            $sectionid = $_POST['sectionid'];

            $qry_event = "INSERT INTO `grt_section_group`( `client_id`, `section_id`, `section_group_title`, `section_group_desc`, `status`) VALUES ('$_SESSION[active_user]','$sectionid','$event_title','$event_desc','$event_status')";
            $qry_res = $sec_back->data_insert($qry_event);


            if ($qry_res != 0) { ?>
                <script>
                    alert("group Created");
                    window.location.href = './section_event_details?sectionid=<?= $sectionid ?>';
                </script>
<?php   }
        }
    }


    if (isset($_POST['inputValues'])) {
        $update_data = $_POST['inputValues'];

        foreach ($update_data as $key => $value) {

            $section_id = $value['section_id'];
            $seq_number = $value['seq_number'];

            if ($section_id != "" and $seq_number != "") {

                $qry_seq = "UPDATE `front_sections` SET `section_seq`='$seq_number' WHERE id = $section_id and client_id= $_SESSION[active_user]";


                $qry_sec_res = $sec_back->data_update($qry_seq);
            }
        }
        if ($qry_sec_res != 0) {
            echo "true";
        }
    }
}


// Get Request Handle
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['del_section'])) {
        $del_id = $_GET['del_section'];

        $qry_delete_menu = "DELETE FROM `front_sections` WHERE id=$del_id";
        $result = $sec_back->data_delete($qry_delete_menu);


        if ($result != 0) {
            echo "<script>
            window.location.href='./front_home';
            </script>";
        } else {

            echo "<script>
            alert('fail');
            window.location.href='./front_home';
            </script>";
        }
    }
}
