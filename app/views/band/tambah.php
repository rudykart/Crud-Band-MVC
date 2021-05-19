<!-- Modal Tmbah -->
<div class="modal fade" id="formModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Data Band</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/band/tambah" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nama_band">Nama Band</label>
                        <input type="text" class="form-control" id="nama_band" name="nama_band">
                    </div>

                    <div class="form-group">
                        <label for="genre_id">Genre</label>
                        <select class="form-control" name="genre_id">
                            <option value="">Pilih</option>
                            <?php foreach ($data['genre'] as $genre) : ?>
                            <option value="<?= $genre['id_genre']; ?>"><?= $genre['nama_genre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="negara">Asal</label>
                        <input type="text" class="form-control" id="negara" name="negara">
                    </div>

                    <div class="form-group">
                        <label for="foto_band">Foto</label>
                        <input type="file" class="form-control-file" id="foto_band" name="foto_band">
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