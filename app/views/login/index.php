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


    <!-- <body class="hold-transition sidebar-mini"> -->
    <div class="container my-3">

        <!-- card header -->
        <div class="card text-center" style="width: 20rem;">
            <div class="card-header">
                <h1><?= $data['title']; ?></h1>
            </div>

            <!-- card Body -->
            <div class="card-body">
                <form action="<?= BASEURL; ?>/login/prosesLogin" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="email..." name="email_user">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="password..." name="password_user">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group ">
                        <center>
                            Belum memiliki akun ?
                        </center>
                    </div>

                    <center>
                        <!-- /.col -->
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </center>

                </form>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Tambah Data Genre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="<?= BASEURL; ?>/genre/tambah" method="post">
                        <div class="form-group">
                            <label for="nama_genre">Nama Genre</label>
                            <input type="text" class="form-control" id="nama_genre" name="nama_genre">
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>