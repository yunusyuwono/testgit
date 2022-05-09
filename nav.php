<!DOCTYPE html>
<html lang="en">
<?php 
include 'koneksi.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="">Humas Polkeslu</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="icon" href="logo-poltekkes-bengkulu.ico">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.php"><b class="text-danger">Humas</b></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item  ">
                            <a class='sidebar-link'>
                                <span>Center : <b class="text-success">Admcenter</b></span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="./" class='sidebar-link'>
                                <i class="bi bi-speedometer"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="master?hal=admin" class='sidebar-link'>
                                <i class="fas fa-database"></i>
                                <span>Master</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="monev?hal=artikel" class='sidebar-link'>
                                <i class="fas fa-paste"></i>
                                <span>Monev</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="logout" class='sidebar-link'>
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                        </li>                     
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
                
            </div>
        </div>
        
            