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

  // DETAIL USER

  public function detail($id)
  {
    $data['title'] = 'Detail Pengguna';
    $data['user'] = $this->model('User_model')->getUserById($id);

    $this->view('templates/header', $data);
    $this->view('detail', $data);
    $this->view('templates/footer');
  }


  // CREATE USER
  public function create()
  {
    $data['judul'] = 'Tambah Pengguna';
    $this->view('templates/header', $data);
    $this->view('user/create', $data);
    $this->view('templates/footer');
  }

  public function store()
  {
    if ($this->model('User_model')->addUser($_POST) > 0) {
      header('Location: ' . BASEURL . '/user');
      exit;
    } else {
      echo "Gagal menambahkan pengguna!";
    }
  }

  // DELETE USER
  public function delete($id)
  {
    if ($this->model('User_model')->deleteUser($id) > 0) {
      header('Location: ' . BASEURL . '/user');
      exit;
    } else {
      echo "<script>alert('Gagal menghapus pengguna'); window.location.href='" . BASEURL . "/user';</script>";
    }
  }

  // UPDATE USER
  public function update($id)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = $_POST;
      $data['id'] = $id;

      if ($this->model('User_model')->updateUser($data) > 0) {
        header('Location: ' . BASEURL . '/user');
        exit;
      } else {
        echo "<script>alert('Gagal mengupdate pengguna atau tidak ada perubahan'); window.location.href='" . BASEURL . "/user';</script>";
      }
    } else {
      $data['user'] = $this->model('User_model')->getUserById($id);
      $this->view('templates/header', $data);
      $this->view('user/update', $data);
      $this->view('templates/footer');
    }
  }
}
