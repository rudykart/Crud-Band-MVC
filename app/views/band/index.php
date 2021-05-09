<?php require 'tambah.php'; ?>

<!-- card header -->
<div class="card my-3">
    <div class="card-header">
        <h1><?= $data['title']; ?></h1>
    </div>
    <!-- card Body -->
    <div class="card-body">
        <table class="my-1">
            <tr>
                <td>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Recipient's username"
                            aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
                        <div class="input-group-append" id="button-addon4">
                            <button class="btn btn-outline-secondary" type="button">Cari !</button>
                            <button class="btn btn-outline-secondary" type="button">Reset</button>
                        </div>
                    </div>
                </td>
                <div class="btn-group float-right mt-1">
                    <button class="btn float-right btn-xs btn btn-primary" data-toggle="modal"
                        data-target="#formModalTambah">
                        Tambah
                    </button>

                    <a href="<?= BASEURL; ?>/genre/laporan" class="btn float-right btn-xs btn btn-info">
                        Laporan Band
                    </a>
                    <a href="<?= BASEURL; ?>/genre/tambah" class="btn float-right btn-xs btn btn-warning">
                        Lihat
                    </a>
                </div>
                <td>
                </td>
            </tr>
        </table>

        <!-- flaher -->
        <div class="row mt-3">
            <div class="col-lg">
                <?php Flasher::flash(); ?>
            </div>
        </div>

        <table class="table table-bordered mt-1">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="width: 10px">#</th>
                    <th scope="col">Nama Band</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Asal</th>
                    <th scope="col" style="width: 110px">
                        <center>Aksi</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data['band'] as $band) : ?>
                <tr>
                    <td scope="row"><?= $no++; ?></td>
                    <td><?= $band['id_band']; ?> | <?= $band['nama_band']; ?></td>
                    <td><?= $band['nama_genre']; ?></td>
                    <td><?= $band['negara']; ?></td>
                    <td>
                        <?php require 'edit.php'; ?>
                        <!-- href nya ga kepake kalo make modal -->
                        <a href="" class="badge badge-info" data-toggle="modal"
                            data-target="#formModalEdit<?= $band['id_band']; ?>">Edit</a>

                        <a href="<?= BASEURL; ?>/band/hapus/<?= $band['id_band'] ?>" class="badge badge-danger"
                            onclick="return confirm('Hapus data?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>