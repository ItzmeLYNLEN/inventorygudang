<?php

require '../koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $suppliers = $conn->query("SELECT * FROM supplier WHERE id = $id")->fetch_assoc();
}


if(isset($_POST['update'])){
  $nama = htmlspecialchars($_POST['nama']);
  $kontak = htmlspecialchars($_POST['kontak']);
  $telepon = htmlspecialchars($_POST['no_telp']);
  $alamat = htmlspecialchars($_POST['alamat']);
  $email = htmlspecialchars($_POST['email']);

  $simpan = mysqli_query($conn, "UPDATE supplier SET 
  nama ='$nama',
  alamat = '$alamat',
  kontak = '$kontak',
  email = '$email',
  telepon =  '$telepon'
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
    <nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
  <div class="container-fluid ">
    <a class="navbar-brand h3 mb-0 text-white ps-5" href="../">Inventory Supplier</a>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active " aria-current="page" href="../">Home</a>
        <a class="nav-link " href="#">Barang</a>
        <a class="nav-link " href="#">Suppplier</a>
        <a class="nav-link " href="../admin/">Admin</a>
      </div>
    </div>
  </div>
</nav>
<h1 class=" text-primary text-center mt-5"> FORM SUPPLIER</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="mb-0 text-white">Edit Data Supplier</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-grup">
                                    <label for="">Nama</label>
                                    <input type="text" required name="nama" placeholder="Nama Supplier" class="form-control" value="<?= $suppliers['nama'] ?>">
                                  </div>
                                  <div class="form-grup">
                                    <label for="">Kontak</label>
                                    <input type="text" required name="kontak" placeholder="Nama Kontak" class="form-control" value="<?= $suppliers['kontak'] ?>">
                                  </div>
                                  <div class="form-grup">
                                    <label for="">No.Telepon</label>
                                    <input type="text" required name="no_telp" placeholder="Nomor Telepon" class="form-control" value="<?= $suppliers['telepon'] ?>">
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-grup">
                                    <label for="">Alamat</label>
                                    <input type="text" required name="alamat" placeholder="Alamat" class="form-control" value="<?= $suppliers['alamat'] ?>">
                                  </div>
                                  <div class="form-grup">
                                    <label for="">Email</label>
                                    <input type="text" required name="email" placeholder="Nama email" class="form-control" value="<?= $suppliers['email'] ?>">
                                  </div>
                                  <div class="form-group text-end">
                                    <button type="submit" name="update" class="btn btn-success btn-sm mt-4">Update</button>
                                  </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>