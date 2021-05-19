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
                    <form action="<?= BASEURL; ?>/user/cari" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" style="width: 20rem;" placeholder="Keyword"
                                aria-label="Recipient's username with two button addons"
                                aria-describedby="button-addon4" name="kata_kunci" autocomplete="off">
                            <div class="input-group-append" id="button-addon4">
                                <button class="btn btn-outline-secondary" type="submit">Cari !</button>
                                <a href="<?= BASEURL; ?>/user" class="btn btn-outline-secondary" type="button">Reset</a>
                            </div>
                        </div>
                    </form>
                </td>
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
                    <th scope="col">User</th>
                    <th scope="col">Email</th>
                    <th scope="col" style="width: 118px">
                        <center>Aksi</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data['user'] as $user) : ?>
                <tr>
                    <td scope="row"><?= $no++; ?></td>
                    <td><?= $user['nama_user']; ?></td>
                    <td><?= $user['email_user']; ?></td>
                    <td>
                        <!-- href nya ga kepake kalo make modal -->
                        <a href="" class="badge badge-info" data-toggle="modal"
                            data-target="#formModalDetail<?= $user['id_user']; ?>">Detail</a>
                        <?php require 'detail.php'; ?>
                        <a href="<?= BASEURL; ?>/user/hapus/<?= $user['id_user'] ?>" class="badge badge-danger"
                            onclick="return confirm('Hapus data?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>