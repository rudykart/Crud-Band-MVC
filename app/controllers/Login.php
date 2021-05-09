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
        if ($row = $this->model('Login_model')->cekLogin($_POST) > 0) {
            // $_SESSION['username'] = $row['username'];
            // $_SESSION['nama'] = $row['nama'];
            // $_SESSION['session_login'] = 'sudah_login';
            header('location: ' . BASEURL . '/home');
        } else {
            Flasher::setFlash('User', 'Email / Password', 'salah.', 'danger');
            header('location: ' . BASEURL . '/login');
            exit;
        }
    }
}