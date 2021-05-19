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
                    <form action="<?= BASEURL; ?>/band/cari" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" style="width: 20rem;" placeholder="Keyword"
                                aria-label="Recipient's username with two button addons"
                                aria-describedby="button-addon4" name="kata_kunci" autocomplete="off">
                            <div class="input-group-append" id="button-addon4">
                                <button class="btn btn-outline-secondary" type="submit">Cari !</button>
                                <a href="<?= BASEURL; ?>/band" class="btn btn-outline-secondary" type="button">Reset</a>
                            </div>
                        </div>
                    </form>
                </td>
                <div class="btn-group float-right mt-1">
                    <button class="btn float-right btn-xs btn btn-primary" data-toggle="modal"
                        data-target="#formModalTambah">
                        Tambah Band
                    </button>
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
                    <th scope="col" style="width: 154px">
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
                    <td><?= $band['nama_band']; ?></td>
                    <td><?= $band['nama_genre']; ?></td>
                    <td><?= $band['negara']; ?></td>
                    <td>
                        <?php require 'edit.php'; ?>
                        <?php require 'detail.php'; ?>
                        <!-- href nya ga kepake kalo make modal -->
                        <a href="" class="badge badge-info" data-toggle="modal"
                            data-target="#formModalDetail<?= $band['id_band']; ?>">Detail</a>
                        <a href="" class="badge badge-warning" data-toggle="modal"
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