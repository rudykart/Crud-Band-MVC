<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BandKART - <?= $data['title'] ?></title>

    <!-- buat parent css bootstrap -->
    <link rel="stylesheet" href=" <?= BASEURL; ?>/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <!-- tapi tau kepake apa kaga -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/fontawesome-free/css/all.min.css">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= BASEURL; ?>">
                <img src="<?= BASEURL; ?>/img/a.png" width="30" height="30" class="d-inline-block align-top" alt="">
                BandKART
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= BASEURL; ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="<?= BASEURL; ?>/band">Band</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="<?= BASEURL; ?>/genre">Genre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="<?= BASEURL; ?>/user">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="<?= BASEURL; ?>/profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="<?= BASEURL; ?>/about">AboutMe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="<?= BASEURL; ?>/login/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</head>

<!-- <body> -->

<body style="background-color: lightgray; ">


    <!-- <body class="hold-transition sidebar-mini"> -->
    <!-- Site wrapper -->
    <div class="wrapper">
        <div class="container">