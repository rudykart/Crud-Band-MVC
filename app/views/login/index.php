<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BandMX - <?= $data['title'] ?></title>

    <!-- buat parent css bootstrap -->
    <link rel="stylesheet" href=" <?= BASEURL; ?>/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <!-- tapi tau kepake apa kaga -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/fontawesome-free/css/all.min.css">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= BASEURL; ?>/login">
                <img src="<?= BASEURL; ?>/img/a.png" width="30" height="30" class="d-inline-block align-top" alt="">
                BandMX
            </a>
        </div>
    </nav>

</head>

<!-- <body> -->

<body style="background-color: lightgray; ">

    <section class="h-100 mt-3">

        <!-- <body class="hold-transition sidebar-mini"> -->
        <div class="container h-100">

            <div class="row justify-content-center align-items-center">

                <!-- card header -->
                <div class="card" style="width: 25rem;">
                    <div class="card-header text-center">
                        <h1><?= $data['title']; ?></h1>
                    </div>

                    <!-- card Body -->
                    <div class="card-body">
                        <form action="<?= BASEURL; ?>/login/prosesLogin" method="post">

                            <!-- flaher -->
                            <div class="row mt-3">
                                <div class="col-lg">
                                    <?php Flasher::flash(); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email_user">Email</label>
                                <input type="email" class="form-control" id="email_user" name="email_user">
                            </div>

                            <div class="form-group">
                                <label for="password_user">Password</label>
                                <input type="password" class="form-control" id="password_user" name="password_user">
                            </div>

                            <div class="form-group ">
                                <center>
                                    Belum memiliki akun, Klik <b><a href="" data-toggle="modal"
                                            data-target="#formModalDaftar">disini!</a></b>
                                </center>
                            </div>

                            <center>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </div>
                                <!-- /.col -->
                            </center>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="<?= BASEURL; ?>/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= BASEURL; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Modal Tmbah -->
        <div class="modal fade" id="formModalDaftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="width: 25rem;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judulModal">Daftar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= BASEURL; ?>/login/daftar" method="post">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_user">Nama</label>
                                <input type="text" class="form-control" id="nama_user" name="nama_user">
                            </div>
                            <div class="form-group">
                                <label for="email_user">Email</label>
                                <input type="email" class="form-control" id="email_user" name="email_user">
                            </div>
                            <div class="form-group">
                                <label for="password_user">Password</label>
                                <input type="password" class="form-control" id="password_user" name="password_user">
                            </div>
                            <div class="form-group">
                                <label for="konfirmasi_password">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="konfirmasi_password"
                                    name="konfirmasi_password">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>