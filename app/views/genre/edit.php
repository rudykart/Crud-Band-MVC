<!-- Modal Tmbah -->

<div class="modal fade" id="formModalEdit<?= $genre['id_genre'] ?>" tabindex="-1" role="dialog"
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

                <form action="<?= BASEURL; ?>/genre/update" method="post">
                    <div class="form-group">
                        <label for="nama_genre">Nama Genre</label>
                        <input type="hidden" name="id_genre" value="<?= $genre['id_genre']; ?>">
                        <input type="text" class="form-control" id="nama_genre" name="nama_genre"
                            value="<?= $genre['nama_genre']; ?>">
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