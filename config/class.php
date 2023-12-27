<?php


class Db_functions
{

    /// connection with database  start
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "grt_cms";

    protected $conn = "";
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db_name);
        if ($this->conn) {
            // echo "connection Success";
        } else {
            echo "fail";
        }
    }


    /// connection with database end 


    // Sql Query Resolver Start 
    function exe_query($sql_qry)
    {

        $qry = $this->conn->query($sql_qry);
        return $qry;
    }

    // Sql Query Resolver End 

    // Data Fetch Fnction Start

    function data_fetch($qry)
    {

        $qry_exe = $this->exe_query($qry);

        if (mysqli_num_rows($qry_exe) > 0) {




            while ($data = mysqli_fetch_assoc($qry_exe)) {

                $array[] = $data;
            }
        } else {
            $array = 0;
        }
        return $array;
    }
    // Data Fetch Fnction end 


    // Data Store Into Db Function Start
    function data_insert($qry)
    {
        $qry = "$qry";
        $response = $this->exe_query($qry);
        return $response;
    }

    // Data Store Into Db Function Start

    // Data update into Db function 
    function data_update($query)
    {
        $sql = "$query";
        $result = $this->exe_query($sql);
        return $result;
    }

    // Data update into Db function 


    function RemoveSpecialChar($str)
    {

        // Using str_replace() function 
        // to replace the word 
        $res = str_replace(array(
            '\'', '"',
            ',', ';', '<', '>', ' ', '_'
        ), '-', $str);

        // Returning the result 
        return strtolower($res);
    }

    function LastId()
    {
        return $this->conn->insert_id;
    }


    function checkForUrlHandler($qry)
    {

        $result = $this->exe_query($qry);
        $result_rows = mysqli_num_rows($result);
        if ($result_rows > 0) {
            return mysqli_num_rows($result);
        } else {
            return 0;
        }
    }


    function data_delete($qry)
    {

        $result = $this->exe_query($qry);
        if ($result == 1) {
            return 1;
        } else {
            return 0;
        }
    }








    // banner section 

    function section_banner($title, $des, $sectionid)
    { ?>

        <?php
        $qry_banner = "SELECT * FROM `grt_section_banner` WHERE section_group_id= $sectionid";
        $banner_data = $this->data_fetch($qry_banner);
        if ($banner_data != 0) {
            $banner_data = $banner_data[0];

            $banner_top_text = $banner_data['banner_top_text'];
            $banner_heading = $banner_data['banner_heading'];
            $banner_filename = $banner_data['banner_filename'];
            $banner_sub_heading = $banner_data['banner_sub_heading'];
            $banner_date = $banner_data['banner_date'];
            $banner_time = $banner_data['banner_time'];
            $banner_desc = $banner_data['banner_desc'];
            $banner_bnt_action = $banner_data['banner_bnt_action'];

            ?>

            <div class="hero col-12"
                style="background:url(./admin/assets/images/banners/<?= $banner_filename ?>); background-size: cover; background-position: center center; background-repeat: no-repeat; padding-top: 77px; padding-bottom: 77px; ">
                <div class="container">
                    <div class="row">
                        <p class="top-sub-heading">
                            <?= $banner_top_text ?>
                        </p>
                        <h1 class="hero-heading">
                            <?= $banner_heading ?>
                        </h1>
                        <p class="sub-heading">
                            <?= $banner_sub_heading ?>
                        </p>
                        <p class="event-date"> <img src="./marathon-images/calendar.png" alt="Calendar">
                            <?= $banner_date ?>
                        </p>
                        <p class="event-time"> <img src="./marathon-images/clock.png" alt="Clock">
                            <?= $banner_time ?>
                        </p>
                        <p class="hero-para">
                            <?= urldecode($banner_desc) ?>
                        </p>
                        <div class="button-container my-5">
                            <a href="<?= $banner_bnt_action ?>" class="btn event-link">Enroll Now</a>
                        </div>

                    </div>
                </div>
            </div>
        <?php }

        ?>



    <?php }


    // banner section 


    // area of run 


    function section_area_of_run()
    { ?>
        <div class="area-of-run">
            <div class="container">
                <div class="row">
                    <div class="area-inr d-flex">
                        <div class="area-img-conteiner col-12 col-lg-3 d-flex align-items-stretch">
                            <img src="./marathon-images/area-of-run.png" alt="area-of-run">
                        </div>
                        <div class="area-text col-12 col-lg-9 d-flex align-items-stretch">
                            <p class="title-top">Total Run</p>
                            <h2 class="section-title">Area Of Run</h2>
                            <p class="area-address">Manger to Damdama Lake, off Gurgaon Faridabad Road</p>
                            <ul class="area-list">
                                <li>The distances may be increased or decreased a little. You are in for a
                                    fun
                                    filled
                                    running experience like past editions of Trail-A-Thon</li>
                                <li>Ultra Runners won't be allowed to run without head torch or proper
                                    lighting
                                    arrangements.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php }


    // area of run 

    //events 
    function section_event($title, $desc, $group_id)
    { ?>

        <div class="event-details-section">
            <div class="container">
                <div class="row">
                    <p class="title-top">
                        <?= $desc ?>
                    </p>
                    <h2 class="section-title">
                        <?= $title ?>
                    </h2>

                    <?php


                    $qry_event = "SELECT * FROM `grt_section_events` WHERE section_group_id= $group_id";

                    $event_data = $this->data_fetch($qry_event);

                    if ($event_data != 0) {

                        foreach ($event_data as $key => $value) {
                            $event_text = $value['section_text'];
                            $event_title = urldecode($value['section_heading']);
                            $event_richtext = $value['section_richtext'];
                            ?>

                            <div class="event-details-container">
                                <div class="event-details-content">
                                    <div class="event-left-section col-12 col-lg-5 d-flex align-items-stretch">
                                        <p class="event-points col-2">
                                            <?= $event_text ?>
                                        </p>
                                        <p class="event-heading col-10">
                                            <?= $event_title ?>
                                        </p>
                                    </div>
                                    <div class="event-right-section col-12 col-lg-7 d-flex align-items-stretch">
                                        <p class="event-para">
                                            <?= urldecode($event_richtext) ?>
                                        </p>

                                    </div>
                                </div>

                            </div>

                        <?php }
                    }


                    ?>



                </div>
            </div>
        </div>
        <?php

    }
    //events 
    //gallery
    function section_gallery($title, $desc, $group_id)
    { ?>
        <div class="event-gallery-section">
            <div class="container">
                <div class="row">
                    <p class="title-top">
                        <?= $desc ?>
                    </p>
                    <h2 class="section-title">
                        <?= $title ?>
                    </h2>
                    <div class="gallery-details">
                        <a class="see-all active btn" href="#">See All </a>
                        <a class="past-events btn" href="#">Past Events</a>
                        <a class="upcoming-marathons btn" href="#">Upcoming Marathons</a>
                    </div>
                    <div class="gallery-container">
                        <div class="no-gutters">

                            <?php

                            $qry_gallery = "SELECT * FROM `grt_section_gallery` WHERE  section_group_id = $group_id";

                            $gallery_data = $this->data_fetch($qry_gallery);
                            if ($gallery_data != 0) {

                                foreach ($gallery_data as $key => $value_gallery) {
                                    $image_title = $value_gallery['image_title'];
                                    $image_name = $value_gallery['image_name'];
                                    $image_alt = $value_gallery['image_alt'];
                                    $image_name = "admin/assets/images/uploads/" . $image_name; ?>

                                    <div class="col-12 col-md-6 col-lg-4 p-1">
                                        <a href="#" class="img" id="imageresource" id="pop">
                                            <img src="<?= $image_name ?>" alt="<?= $image_alt ?>" title="<?= $image_title ?>"
                                                id="imageresource" s>
                                        </a>
                                    </div>


                                <?php }
                            }

                            ?>


                        </div>
                    </div>
                    <div class="button-container">
                        <a href="#" class="btn load-more">Load More</a>
                    </div>
                </div>
            </div>
        </div>

    <?php }

    //gallery

    //testmonils

    function section_testimonial($title, $des, $groupid)
    { ?>
        <?php
        $qry_testimonial = "SELECT * FROM   `grt_section_testimonials` WHERE section_group_id=$groupid";
        $qry_res = $this->data_fetch($qry_testimonial);

        ?>
        <!-- testimonial-section -->
        <div class="testimonial-section">
            <div class="container">
                <div class="row">
                    <p class="title-top">Testimonials</p>
                    <h2 class="section-title">What Client Say’s</h2>
                    <div class="testimonials-side-images">
                        <span class="testimonials-images-top-left"><img src="./marathon-images/testimonial-image-right.png"
                                alt=""></span>
                        <span class="testimonials-images-top-right"><img src="./marathon-images/testimonial-image-right.png"
                                alt=""></span>
                        <span class="testimonials-images-bottom-left"><img src="./marathon-images/testimonial-image-right.png"
                                alt=""></span>
                        <span class="testimonials-images-bottom-right"><img src="./marathon-images/testimonial-image-right.png"
                                alt=""></span>
                    </div>
                    <div class="swiper testimonial">
                        <div class="swiper-container">
                            <div class="swiper-wrapper ">
                                <?php

                                if ($qry_res != 0) {

                                    foreach ($qry_res as $key => $value) { ?>

                                        <div class="swiper-slide">
                                            <div class="wrapper">
                                                <img class="user-image"
                                                    src="./admin/assets/images/testimonials/<?= $value['section_image'] ?>" alt=""
                                                    style="width:100px; height:100px;">
                                                <div class="">
                                                    <?php

                                                    for ($i = 0; $i < $value['section_rating']; $i++) { ?>

                                                        <object class="star" data="./admin/assets/images/svg/star-fill.svg"
                                                            type="image/svg+xml"></object>
                                                    <?php }
                                                    ?>

                                                </div>



                                                <div class="testimonial-content">
                                                    <p class="testimonial-para">
                                                        <?= urldecode($value['section_desc']) ?>
                                                    </p>
                                                    <div class="testimonial-reference">
                                                        <p class="review-author">
                                                            <?= urldecode($value['section_cus_name']) ?>
                                                        </p>
                                                        <p class="review-position">
                                                            <?= urldecode($value['section_cus_position']) ?>


                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php }
                                }
                                ?>


                            </div>
                            <!-- <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>     -->
                            <div class="slider-controls">
                                <div class="slider__pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php }
    //testmonils


    //blogs

    function section_blog($title, $desc, $groupid)
    { ?>

        <div class="news-feed-section">
            <div class="container">
                <div class="row">
                    <p class="title-top">
                        <?= $desc ?>
                    </p>
                    <h2 class="section-title">
                        <?= $title ?>
                    </h2>
                    <div class="news-feed-container">
                        <?php
                        $qry_blog = "SELECT * FROM `grt_section_blog` WHERE section_group_id=$groupid";
                        $qry_blog_res = $this->data_fetch($qry_blog);
                        if ($qry_blog_res != 0) {


                            foreach ($qry_blog_res as $key => $value) { ?>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="news-feed-content">
                                        <div class="news-date">
                                            <span>11 Nov</span>
                                            <hr>
                                            <span>2023</span>
                                        </div>
                                        <img src="./admin/assets/images/bloge/<?= $value['bloge_image'] ?>" alt="news-feed">
                                        <div class="news-detail">
                                            <p class="news-heading">
                                                <?= urldecode(substr($value['bloge_heading'], 0, 100)) . "..." ?>
                                            </p>
                                            <p class="news-author">
                                                <?= urldecode($value['bloge_author']) ?>
                                            </p>
                                            <p class="news-para">
                                                <?= urldecode(substr(strip_tags($value['bloge_content']), 0, 100)) . "..." ?>
                                            </p>
                                            <a href="<?= $value['bloge_action'] ?>" class="news-read-more btn">Read More</a>
                                        </div>
                                    </div>

                                </div>
                            <?php }
                        }
                        ?>



                    </div>
                </div>
            </div>
        </div>

    <?php }


    //blogs


    //section Registration

    function section_register()
    { ?>
        <div class="register-section">
            <div class="container">
                <div class="row">
                    <div class="register-container">
                        <div class="register-content col-12 col-md-8 col-lg-8">
                            <h2 class="register-heading">Creating stronger people through run together
                                Marathons for
                                fitness</h2>
                            <p class="register-para">Get register yourself in upcoming marathon</p>
                            <a href="#" class="register-now btn">Register Now</a>
                        </div>
                        <div class="register-image col-12 col-md-4 col-lg-4">
                            <img src="./marathon-images/bottom-banner-image.png" alt="bottom-banner-image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php }


    function section_custom($title, $desc, $groupid)
    {
        $qry_custom = "SELECT * FROM `grt_section_custom` WHERE section_group_id=$groupid";
        $qry_custom_res = $this->data_fetch($qry_custom);
        if ($qry_custom_res != 0) {
            $custom_section_data = urldecode($qry_custom_res[0]['section_content']);

            echo html_entity_decode($custom_section_data);
        }
    }
}
//section Registration
