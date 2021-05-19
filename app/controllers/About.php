<?php

class About extends Controller
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
        $data['title'] = 'About Me';
        $data['nama'] = 'Rudy';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
}