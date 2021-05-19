<!-- card header -->
<div class="card my-3">
    <div class="card-header">
        <h1><?= $data['title']; ?></h1>
    </div>

    <!-- card Body -->
    <div class="card-body">

        <div class="row justify-content-center align-items-center">
            <div class="card shadow" style="width: 18rem;">
                <div class="card-body">

                    <div class="mb-3 mt-1">
                        <?php
                        if ($data['user']['foto_user'] == "") {
                            $foto = BASEURL . "/img/xxx.png";
                        } else {
                            $foto = BASEURL . "/img/img_user/" . $data['user']['foto_user'];
                        }
                        ?>
                        <img src="<?= $foto; ?>" alt="Rudy" width="600" class="card-img shadow">
                    </div>

                    <!-- flaher -->
                    <div class="row">
                        <div class="col-lg">
                            <?php Flasher::flash(); ?>
                        </div>
                    </div>

                    <h5 class="card-title"><?= $data['user']['nama_user']; ?></h5>
                    <p class="card-text"><?= $data['user']['email_user']; ?></p>

                    <?php require 'edit.php'; ?>
                    <button class="btn btn-primary" data-toggle="modal"
                        data-target="#formModalEdit<?= $data['user']['id_user']; ?>">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</div>