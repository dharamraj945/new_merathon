<?php
include("./config/session_manage.php");
include "./config/class.php";

$currunt_page = basename($_SERVER['PHP_SELF']);

$currunt_page = explode('.', $currunt_page);

$currunt_page = $currunt_page[0];

$dat = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$date = $dat->format('H');
if ($date < 12)
    $greet = "Good morning ";
else if ($date < 17)
    $greet = "Good afternoon ";
else if ($date < 20)
    $greet = "Good evening ";
else
    $greet = "Good night";
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="" rel="icon">
    <title>admin Pannel</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/admin.css" rel="stylesheet">
    <script src="./js/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
                <div class="sidebar-brand-icon">
                    <!-- <img src="img/logo/logo2.png"> -->
                    <span width="50px"> Trail-a-Thone</span>
                </div>

            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="./dashboard    ">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Features
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="far fa-fw fa-user"></i>
                    <span>User Managment</span>
                </a>
                <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Access Managment</h6>
                        <a class="collapse-item" href="./user">Users</a>


                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap_p" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="far fa  fa-th-list"></i>
                    <span>Header</span>
                </a>
                <div id="collapseBootstrap_p" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sections</h6>
                        <a class="collapse-item" href="./menus">Menus</a>

                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap_Page" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="far fa  fa-th-list"></i>
                    <span>Pages</span>
                </a>
                <div id="collapseBootstrap_Page" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Page</h6>
                        <a class="collapse-item" href="./pages">Pages</a>
                        <a class="collapse-item" href="./custom_page">Custom Pages</a>

                    </div>
                </div>


            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap_sections" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="far fa  fa-th-list"></i>
                    <span>Sections</span>
                </a>
                <div id="collapseBootstrap_sections" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Sections</h6>
                        <a class="collapse-item" href="./add_section">Sections</a>

                    </div>
                </div>
            </li>






        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">


                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                                <span class="ml-2 d-none d-lg-inline text-white small">
                                    <?php echo $_SESSION['user_name'] ?>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="./profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="./config/log_out.php" method="POST">
                                    <button name="logout" type="submit" class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">

                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        logout
                                    </button>
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <!-- Topbar -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            <?php echo strtoupper($currunt_page) ?>
                        </h1>
                        <span>

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./">Dashboard</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo ucfirst($currunt_page) ?>
                                </li>
                            </ol>

                    </div>