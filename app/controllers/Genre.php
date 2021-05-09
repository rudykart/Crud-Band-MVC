<?php

class Genre extends Controller
{
    public function index()
    {
        $data['title'] = 'Daftar Genre';
        $data['genre'] = $this->model('Genre_model')->getAllGenre();
        $this->view('templates/header', $data);
        $this->view('genre/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Genre_model')->tambahDataGenre($_POST) > 0) {
            Flasher::setFlash('Genre', 'Berhasil', 'diupdate', 'success');
            header('Location: ' . BASEURL . '/genre');
            exit;
        } else {
            Flasher::setFlash('Genre', 'Gagal', 'ditambah', 'danger');
            header('Location: ' . BASEURL . '/genre');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('Genre_model')->updateDataGenre($_POST) > 0) {
            Flasher::setFlash('Genre', 'Berhasil', 'diupdate', 'success');
            header('Location: ' . BASEURL . '/genre');
            exit;
        } else {
            Flasher::setFlash('Genre', 'Gagal', 'diupdate', 'danger');
            header('Location: ' . BASEURL . '/genre');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Genre_model')->hapusDataGenre($id) > 0) {
            Flasher::setFlash('Genre', 'Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/genre');
            exit;
        } else {
            Flasher::setFlash('Genre', 'Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/genre');
            exit;
        }
    }
}