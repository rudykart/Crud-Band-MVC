<div class="modal fade" id="formModalDetail<?= $band['id_band'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">


    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Detail Band</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/band/update" method="post">
                    <input type="hidden" name="id_band" value="<?= $band['id_band']; ?>">
                    <div class="form-group">
                        <div class="text-center mt-2">
                            <?php
                            if ($band['foto_band'] == "") {
                                $foto = BASEURL . "/img/xxx.png";
                            } else {
                                // $foto_band = $band['foto_band'];
                                $foto = BASEURL . "/img/img_band/" . $band['foto_band'];
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
                                    <td><?= $band['nama_band']; ?></td>
                                </tr>
                                <tr>
                                    <td>Genre</td>
                                    <td>:</td>
                                    <td><?= $band['nama_genre']; ?></td>
                                </tr>
                                <tr>
                                    <td>Asal</td>
                                    <td>:</td>
                                    <td><?= $band['negara']; ?></td>
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