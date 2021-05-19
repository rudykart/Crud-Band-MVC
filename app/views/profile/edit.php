<!-- Modal Tmbah -->

<div class="modal fade" id="formModalEdit<?= $data['user']['id_user']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">


    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Edit Data Genre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/profile/update" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_user">Nama User</label>
                        <input type="hidden" name="id_user" value="<?= $data['user']['id_user']; ?>">
                        <input type="text" class="form-control" id="nama_user" name="nama_user"
                            value="<?= $data['user']['nama_user']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email_user">Email User</label>
                        <input type="email" class="form-control" id="email_user" name="email_user"
                            value="<?= $data['user']['email_user']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password_user">Password</label>
                        <input type="password" class="form-control" id="password_user" name="password_user">
                    </div>
                    <div class="form-group">
                        <label for="konfirmasi_password">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password">
                    </div>

                    <div class="form-group">
                        <label for="foto_user">Foto</label>
                        <input type="file" class="form-control-file" id="foto_user" name="foto_user"
                            value="<?= $data['user']['foto_user']; ?>">
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>

            </form>
        </div>
    </div>
</div>