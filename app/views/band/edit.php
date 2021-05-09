<!-- Modal Tmbah -->

<div class="modal fade" id="formModalEdit<?= $band['id_band'] ?>" tabindex="-1" role="dialog"
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

                <form action="<?= BASEURL; ?>/band/update" method="post">
                    <input type="hidden" name="id_band" value="<?= $band['id_band']; ?>">
                    <div class="form-group">
                        <label for="nama_band">Nama Band</label>
                        <input type="text" class="form-control" id="nama_band" name="nama_band"
                            value="<?= $band['nama_band']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="nama_genre">Genre</label>

                        <select class="form-control" name="genre_id">
                            <?php foreach ($data['genre'] as $genre) : ?>
                            <option value="<?= $genre['id_genre']; ?>" <?php
                                                                            if ($band['genre_id'] == $genre['id_genre']) {
                                                                                echo "selected";
                                                                            } ?>>
                                <?= $genre['nama_genre']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="negara">Asal</label>
                        <input type="text" class="form-control" id="negara" name="negara"
                            value="<?= $band['negara']; ?>">
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