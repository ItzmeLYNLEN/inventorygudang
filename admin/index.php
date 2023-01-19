<?php

require '../koneksi.php';

$admins = $conn->query("SELECT * FROM admin");

if (isset($_POST['simpan'])) {
  $nama = htmlspecialchars($_POST['nama']);
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $telepon = htmlspecialchars($_POST['telepon']);
  $email = htmlspecialchars($_POST['email']);

  $simpan = $conn->query("INSERT INTO admin VALUES
  (NULL, '$nama', '$username', '$password', '$telepon', '$email')");

  if ($simpan) {
    echo '<script>alert("Data Berhasil Disimpan");
    location.replace("index.php");</script>';
  } else {
    echo '<script>alert("Kurang jago Nyimpennya Luwh");
    location.replace("index.php");</script>';
  }
}
if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $delete = $conn->query("DELETE FROM admin WHERE id = '$id'");
  if ($delete) {
    echo '<script>alert("Datanya Gweh hapus");
    location.replace("index.php");</script>';
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>XI RPL DAOA</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container-fluid ">
      <a class="navbar-brand h3 mb-0 text-white ps-5" href="../">Yg Admin Admin Aja</a>
      <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon "></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active " aria-current="page" href="../">Home</a>
          <a class="nav-link " href="#">Barang</a>
          <a class="nav-link " href="../supplier/">Suppplier</a>
          <a class="nav-link " href="#">Admin</a>
        </div>
      </div>
    </div>
  </nav>
  <h1 class=" text-dark text-center mt-5"> FORM ADMIN</h1>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow mb-3">
          <div class="card-header bg-dark">
            <h3 class="mb-0 text-white">Tambah Data Admin</h3>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="row">
                <div class="form-grup">
                  <label for="">Nama</label>
                  <input type="text" required name="nama" placeholder="Nama Supplier" class="form-control">
                </div>
                <div class="form-grup">
                  <label for="">Username</label>
                  <input type="text" required name="username" placeholder="Username" class="form-control">
                </div>
                <div class="form-grup">
                  <label for="">No.Telepon</label>
                  <input type="text" required name="telepon" placeholder="Nomor Telepon" class="form-control">
                </div>
              </div>
              <div class="form-grup">
                <label for="">Password</label>
                <input type="password" required name="password" placeholder="Password Luwh" class="form-control">
              </div>
              <div class="form-grup">
                <label for="">Email</label>
                <input type="text" required name="email" placeholder="Nama email" class="form-control">
              </div>
              <div class="form-group text-end">
                <button type="submit" name="simpan" class="btn btn-success btn-sm mt-4">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-body">
            <table class=" table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($admins as $admin) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $admin['nama'] ?></td>
                    <td><?= $admin['username'] ?></td>
                    <td><?= $admin['password'] ?></td>
                    <td><?= $admin['telepon'] ?></td>
                    <td><?= $admin['email'] ?></td>
                    <td class="text-center">
                      <a href="edit.php?id=<?= $admin['id']?>" class="btn btn-warning text-white btn-sm">Edit</a>
                      <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                        <button type="submit" name="delete" class="btn btn-danger text-white btn-sm">Delete</button>
                      </form>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>