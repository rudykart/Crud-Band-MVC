<div class="modal fade" id="formModalDetail<?= $user['id_user']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">


    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Detail User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/band/update" method="post">
                    <div class="form-group">
                        <div class="text-center mt-2">
                            <?php
                            if ($user['foto_user'] == "") {
                                $foto = BASEURL . "/img/xxx.png";
                            } else {
                                $foto = BASEURL . "/img/img_user/" . $user['foto_user'];
                            }
                            ?>
                            <img src="<?= $foto; ?>" alt="Rudy" width="200" class="rounded shadow">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row justify-content-center align-items-center">
                            <table class="table-borderless mt-3">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $user['nama_user']; ?></td>
                                </tr>
                                <tr>
                                    <td>Genre</td>
                                    <td>:</td>
                                    <td><?= $user['email_user']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            </form>
        </div>
    </div>
</div>