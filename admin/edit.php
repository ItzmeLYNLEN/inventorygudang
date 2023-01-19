<?php

require '../koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $admins = $conn->query("SELECT * FROM admin WHERE id = $id")->fetch_assoc();
}


if(isset($_POST['update'])){
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $email = htmlspecialchars($_POST['email']);
  

  $simpan = mysqli_query($conn, "UPDATE admin SET 
  nama ='$nama',
  username = '$username',
  password = '$password',
  telepon =  '$telepon',
  email = '$email'
  WHERE id = '$id'
  ");

  if($simpan) {
    echo '<script>alert("Datanya Udh Gweh Ubah");
    location.replace("index.php");</script>';
  }else{
    echo '<script>alert("Kurang Jago Nyimpennya Luwh");
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
                  <input type="text" required name="nama" placeholder="Nama Supplier" class="form-control" value="<?= $admins['nama'] ?>">
                </div>
                <div class="form-grup">
                  <label for="">Username</label>
                  <input type="text" required name="username" placeholder="Username" class="form-control" value="<?= $admins['username'] ?>">
                </div>
                <div class="form-grup">
                  <label for="">No.Telepon</label>
                  <input type="text" required name="telepon" placeholder="Nomor Telepon" class="form-control" value="<?= $admins['telepon'] ?>">
                </div>
              </div>
              <div class="form-grup">
                <label for="">Password</label>
                <input type="text" required name="password" placeholder="Password Luwh" class="form-control" value="<?= $admins['password'] ?>">
              </div>
              <div class="form-grup">
                <label for="">Email</label>
                <input type="text" required name="email" placeholder="Nama email" class="form-control" value="<?= $admins['email'] ?>">
              </div>
              <div class="form-group text-end">
                <button type="submit" name="update" class="btn btn-success btn-sm mt-4">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
 

  <script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>