<?php

class Profile extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setFlash('Silahkan', 'Login', 'terlebih dahulu.', 'danger');
            header('location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->model('User_model')->getAllUserById($_SESSION['id_user']);
        $this->view('templates/header', $data);
        $this->view('profile/index', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        if ($this->model('User_model')->updateDataUser($_POST) > 0) {
            Flasher::setFlash('User', 'Berhasil', 'diupdate', 'success');
            header('Location: ' . BASEURL . '/profile');
            exit;
        } else {
            Flasher::setFlash('User', 'Gagal', 'diupdate', 'danger');
            header('Location: ' . BASEURL . '/profile');
            exit;
        }
    }
}