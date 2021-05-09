<?php

class About extends Controller
{
    public function index()
    {
        $data['title'] = 'About Me';
        // $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
}