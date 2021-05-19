<!-- card header -->
<div class="card my-3">
    <div class="card-header">
        <h1><?= $data['title']; ?></h1>
    </div>

    <!-- card Body -->
    <div class="card-body">

        <div class="text-center">
            <img src="<?= BASEURL; ?>/img/rudy.jpg" alt="Rudy" width="200" class="rounded-circle shadow">
            <p class="mt-4">Halo, Nama saya <?= $data['nama']; ?>.</p>
            <p><?= KATA; ?></p>
        </div>
        <div class="row justify-content-center align-items-center ">
            <table>
                <tr>
                    <td>Instagram saya, Klik <a href="<?= INSTAGRAM; ?>"> disini</a>.</td>
                </tr>
                <tr>
                    <td>Github saya, Klik <a href="<?= GITHUB; ?>"> disini</a>.</td>
                </tr>
            </table>
        </div>
    </div>
</div>