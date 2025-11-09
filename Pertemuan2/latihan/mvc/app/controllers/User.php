<?php

class User extends Controller
{
  public function index()
  {
    $users = $this->model('User_model')->getAllUsers();

    $data = [
      'title' => 'Daftar Pengguna',
      'users' => $users
    ];

    $this->view('templates/header', $data);
    $this->view('list', $data);
    $this->view('templates/footer');
  }
}
