<<<<<<< HEAD
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
=======
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
>>>>>>> cbfb44089522fb3008951324ca3b8e39f83921d0
