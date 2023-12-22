<?php
session_start();
include "./config/class.php";
$testimonial_obj = new Db_functions();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    if (isset($_POST['add_testimonial_group'])) {

        print_r($_POST);
        if ($_POST['section_title'] != "" && $_POST['section_desc'] != '' && $_POST['section_status'] != "") {

            $section_title = urlencode($_POST['section_title']);
            $section_desc = urlencode($_POST['section_desc']);
            $section_status = $_POST['section_status'];
            $client_id = $_SESSION['active_user'];
            $sectionid = $_POST['sectionid'];

            $qry_event = "INSERT INTO `grt_section_group`( `client_id`, `section_id`, `section_group_title`, `section_group_desc`, `status`) VALUES ('$_SESSION[active_user]','$sectionid','$section_title','$section_desc','$section_status')";
            $qry_res = $testimonial_obj->data_insert($qry_event);


            if ($qry_res != 0) { ?>
                <script>
                    alert("group Created");
                    window.location.href = './section_review_group?sectionid=<?= $sectionid ?>';
                </script>
            <?php }
        }
    }


    if (isset($_POST['add_new_review']) && isset($_FILES['review_image']['name'])) {

        $review_rating = $_POST['review_rating'];
        $review_desc = urlencode($_POST['review_desc']);
        $review_cus_name = urlencode($_POST['review_cus_name']);
        $review_position = urlencode($_POST['review_position']);
        $group_id = $_POST['group_id'];
        $review_image = $_FILES['review_image']['name'];




        if ($review_rating != "" && $review_desc != ""  && $review_cus_name != "" && $review_position != "" && $group_id != "") {


            $extention = pathinfo($review_image, PATHINFO_EXTENSION);
            $valid_extention = array("jpg", "jpeg", "png");


            if (in_array($extention, $valid_extention)) {
                $new_name = "Testimonials_" . $_SESSION['active_user'] . "_" . rand(99, 9999) . "." . $extention;
                $path = "./assets/images/testimonials/" . $new_name;
                $result = move_uploaded_file($_FILES['review_image']['tmp_name'], $path);

                if ($result) {
                    $qry_add_review = "INSERT INTO `grt_section_testimonials`( `section_group_id`, `section_image`, `section_rating`, `section_desc`, `section_cus_name`, `section_cus_position`) VALUES ('$group_id','$new_name','$review_rating','$review_desc','$review_cus_name','$review_position')";

                    $qry_review_res = $testimonial_obj->data_insert($qry_add_review);
                    echo $qry_review_res;
                    if ($qry_review_res != 0) {
                        echo "<script>alert('Testimonials Added')
                                    window.location.href='./section_review_add?group_id=$group_id';
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

        $qry_del = "DELETE FROM `grt_section_testimonials` WHERE id = $delete_id";

        $qry_del_res = $testimonial_obj->data_delete($qry_del);
        if ($qry_del_res != 0) { ?>
            <script>
                window.location.href = './section_review_edit?groupid=<?= $group_id ?>&sectionid=<?= $section_id ?>';
            </script>
<?php }
    }
}
