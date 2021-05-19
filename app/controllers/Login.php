<?php

class Login extends Controller
{
    public function index()
    {
        $data['title'] = 'Login';
        // $data['nama'] = $this->model('User_model')->getUser();
        $this->view('login/index', $data);
    }

    public function prosesLogin()
    {
        if ($this->model('User_model')->loginUser($_POST) > 0) {
            $_SESSION['session_login'] = 'sudah_login';
            header('location: ' . BASEURL . '/home');
        } else {
            Flasher::setFlash('User', 'Email / Password', 'salah.', 'danger');
            header('location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function daftar()
    {
        if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
            Flasher::setFlash('User', 'Berhasil', 'didaftarkan', 'success');
            header('Location: ' . BASEURL . '/login');
            exit;
        } else {
            Flasher::setFlash('Band', 'Gagal', 'didaftarkan', 'danger');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function logout()
    {
        $this->model('User_model')->userLogout();
        // session_start();
        // session_destroy();
        // header('location: ' . base_url . '/login');
    }
}