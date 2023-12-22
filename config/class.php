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

    function section_testimonial()
    { ?>
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
                        <div class="swiper-container swiper-container-horizontal">
                            <div class="swiper-wrapper "
                                style="transform: translate3d(-1220px, 0px, 0px); transition-duration: 0ms;">
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="3"
                                    style="width: 1220px;">
                                    <div class="wrapper">
                                        <img class="user-image" src="./marathon-images/testimonial-image.png" alt="">
                                        <img class="star" src="./marathon-images/testimonial-star.png" alt="">
                                        <div class="testimonial-content">
                                            <p class="testimonial-para"> Taking seamless key performance indicators offline to
                                                maximise the long tail. Keeping your eye on the ball while performing a deep
                                                dive. Completely synergize resource taxing relationships via premier niche
                                                markets. Professionally cultivate one-to-one customer. </p>
                                            <div class="testimonial-reference">
                                                <p class="review-author">Richard Hartisona</p>
                                                <p class="review-position">Founder</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0"
                                    style="width: 1220px;">
                                    <div class="wrapper">
                                        <img class="user-image" src="./marathon-images/testimonial-image.png" alt="">
                                        <img class="star" src="./marathon-images/testimonial-star.png" alt="">
                                        <div class="testimonial-content">
                                            <p class="testimonial-para"> Taking seamless key performance indicators offline to
                                                maximise the long tail. Keeping your eye on the ball while performing a deep
                                                dive. Completely synergize resource taxing relationships via premier niche
                                                markets. Professionally cultivate one-to-one customer. </p>
                                            <div class="testimonial-reference">
                                                <p class="review-author">Richard Hartisona</p>
                                                <p class="review-position">Founder</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 1220px;">
                                    <div class="wrapper">
                                        <img class="user-image" src="./marathon-images/testimonial-image.png" alt="">
                                        <img class="star" src="./marathon-images/testimonial-star.png" alt="">
                                        <div class="testimonial-content">
                                            <p class="testimonial-para"> Taking seamless key performance indicators offline to
                                                maximise the long tail. Keeping your eye on the ball while performing a deep
                                                dive. Completely synergize resource taxing relationships via premier niche
                                                markets. Professionally cultivate one-to-one customer. </p>
                                            <div class="testimonial-reference">
                                                <p class="review-author">Richard Hartisona</p>
                                                <p class="review-position">Founder</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-swiper-slide-index="2" style="width: 1220px;">
                                    <div class="wrapper">
                                        <img class="user-image" src="./marathon-images/testimonial-image.png" alt="">
                                        <img class="star" src="./marathon-images/testimonial-star.png" alt="">
                                        <div class="testimonial-content">
                                            <p class="testimonial-para"> Taking seamless key performance indicators offline to
                                                maximise the long tail. Keeping your eye on the ball while performing a deep
                                                dive. Completely synergize resource taxing relationships via premier niche
                                                markets. Professionally cultivate one-to-one customer. </p>
                                            <div class="testimonial-reference">
                                                <p class="review-author">Richard Hartisona</p>
                                                <p class="review-position">Founder</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="3"
                                    style="width: 1220px;">
                                    <div class="wrapper">
                                        <img class="user-image" src="./marathon-images/testimonial-image.png" alt="">
                                        <img class="star" src="./marathon-images/testimonial-star.png" alt="">
                                        <div class="testimonial-content">
                                            <p class="testimonial-para"> Taking seamless key performance indicators offline to
                                                maximise the long tail. Keeping your eye on the ball while performing a deep
                                                dive. Completely synergize resource taxing relationships via premier niche
                                                markets. Professionally cultivate one-to-one customer. </p>
                                            <div class="testimonial-reference">
                                                <p class="review-author">Richard Hartisona</p>
                                                <p class="review-position">Founder</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active"
                                    data-swiper-slide-index="0" style="width: 1220px;">
                                    <div class="wrapper">
                                        <img class="user-image" src="./marathon-images/testimonial-image.png" alt="">
                                        <img class="star" src="./marathon-images/testimonial-star.png" alt="">
                                        <div class="testimonial-content">
                                            <p class="testimonial-para"> Taking seamless key performance indicators offline to
                                                maximise the long tail. Keeping your eye on the ball while performing a deep
                                                dive. Completely synergize resource taxing relationships via premier niche
                                                markets. Professionally cultivate one-to-one customer. </p>
                                            <div class="testimonial-reference">
                                                <p class="review-author">Richard Hartisona</p>
                                                <p class="review-position">Founder</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>     -->
                            <div class="slider-controls">
                                <div class="slider__pagination swiper-pagination-clickable swiper-pagination-bullets"><span
                                        class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span
                                        class="swiper-pagination-bullet"></span><span
                                        class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php }
    //testmonils


    //blogs

    function section_blog()
    { ?>

        <div class="news-feed-section">
            <div class="container">
                <div class="row">
                    <p class="title-top">Latest Blogs</p>
                    <h2 class="section-title">Latest News Feed</h2>
                    <div class="news-feed-container">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="news-feed-content">
                                <div class="news-date">
                                    <span>11 Nov</span>
                                    <hr>
                                    <span>2023</span>
                                </div>
                                <img src="./marathon-images/news-feed-image-1.png" alt="news-feed">
                                <div class="news-detail">
                                    <p class="news-heading">5 Reasons You Should Try Trail Running</p>
                                    <p class="news-author">By Tanya Agarwal</p>
                                    <p class="news-para">Trail running is almost a discovery. Popular as Trailathons, there is a
                                        big reason trail running events ...
                                        have found a budding craze amongst the running community all over the world.</p>
                                    <a href="#" class="news-read-more btn">Read More</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="news-feed-content">
                                <div class="news-date">
                                    <span>24 Nov</span>
                                    <hr>
                                    <span>2023</span>
                                </div>
                                <img src="./marathon-images/news-feed-image-2.png" alt="news-feed">
                                <div class="news-detail">
                                    <p class="news-heading">5 Reasons You Should Try Trail Running</p>
                                    <p class="news-author">By Tanya Agarwal</p>
                                    <p class="news-para">Trail running is almost a discovery. Popular as Trailathons, there is a
                                        big reason trail running events ...
                                        have found a budding craze amongst the running community all over the world.</p>
                                    <a href="#" class="news-read-more btn">Read More</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="news-feed-content">
                                <div class="news-date">
                                    <span>01 Dec</span>
                                    <hr>
                                    <span>2023</span>
                                </div>
                                <img src="./marathon-images/news-feed-image-1.png" alt="news-feed">
                                <div class="news-detail">
                                    <p class="news-heading">5 Reasons You Should Try Trail Running</p>
                                    <p class="news-author">By Tanya Agarwal</p>
                                    <p class="news-para">Trail running is almost a discovery. Popular as Trailathons, there is a
                                        big reason trail running events ...
                                        have found a budding craze amongst the running community all over the world.</p>
                                    <a href="#" class="news-read-more btn">Read More</a>
                                </div>
                            </div>

                        </div>

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
}
//section Registration
