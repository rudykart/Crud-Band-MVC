<?php
class Login_model
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function cekLogin($data)
    {
        $query = "SELECT * FROM user WHERE email_user = :email_user AND password_user = :password_user";
        $this->db->query($query);
        $this->db->bind('email_user', $data['email_user']);
        $this->db->bind('password_user', md5($data['password_user']));
        $data =  $this->db->single();
        return $data;
    }

    public function userLogout()
    {
        // session_start();
        session_destroy();
        header('location: ' . BASEURL . '/login');
    }
}