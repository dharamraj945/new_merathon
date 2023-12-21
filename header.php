<?php
session_start();
include "./config/class.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marathon</title>
    <link rel="stylesheet" href="Marathon.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css' />
    <script src="./jquery/jqury.js"></script>

</head>

<body>
    <!-- Site header start-->
    <header class="site-header">
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="main-header-inr">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid">
                                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <a class="navbar-brand" href="/">
                                    <img class="logo" src="./marathon-images/logo.png" alt="Logo">
                                </a>
                                <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/bib-expo">Bib Expo</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/event-details">Event Details</a>
                                        </li>
                                    </ul>
                                    <div class="nav-right">
                                        <a class="sign-in btn btn-primary" href="/sign-in">Sign In</a>
                                        <a class="register btn btn-secondary" href="/register">Register</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Site header end-->