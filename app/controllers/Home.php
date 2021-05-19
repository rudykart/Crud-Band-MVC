<?php

class Home extends Controller
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
        $data['title'] = 'Home';
        $data['user'] = $this->model('User_model')->getAllUserById($_SESSION['id_user']);
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}