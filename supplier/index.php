<?php

require '../koneksi.php';

$suppliers = $conn->query("SELECT * FROM supplier");

if(isset($_POST['simpan'])){
  $nama = htmlspecialchars($_POST['nama']);
  $kontak = htmlspecialchars($_POST['kontak']);
  $telepon = htmlspecialchars($_POST['no_telp']);
  $alamat = htmlspecialchars($_POST['alamat']);
  $email = htmlspecialchars($_POST['email']);


  if(empty($nama) or empty($kontak) or empty($telepon) or empty($alamat) or empty($email)){
    echo '<script>alert("Blom Keisi Semua Ngabz");
    location.replace("");</script>';
  } else {

  $simpan = $conn->query("INSERT INTO supplier VALUES
  (NULL, '$nama', '$alamat', '$kontak', '$email', '$telepon')");

  if($simpan) {
    echo '<script>alert("Data Berhasil Disimpan");
    location.replace("index.php");</script>';
  }else{
    echo '<script>alert("Kurang jago Nyimpennya Luwh");
    location.replace("index.php");</script>';
  }
}
}
if(isset($_POST['delete'])) {
  $id = $_POST['id'];
  $delete = $conn->query("DELETE FROM supplier WHERE id = '$id'");
  if($delete) {
    echo '<script>alert("Datanya udh Gweh hapus");
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
                        <h3 class="mb-0 text-white">Tambah Data Supplier</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-grup">
                                    <label for="">Nama</label>
                                    <input type="text" required name="nama" placeholder="Nama Supplier" class="form-control">
                                  </div>
                                  <div class="form-grup">
                                    <label for="">Kontak</label>
                                    <input type="text" required name="kontak" placeholder="Nama Kontak" class="form-control">
                                  </div>
                                  <div class="form-grup">
                                    <label for="">No.Telepon</label>
                                    <input type="text" required name="no_telp" placeholder="Nomor Telepon" class="form-control">
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-grup">
                                    <label for="">Alamat</label>
                                    <input type="text" required name="alamat" placeholder="Alamat" class="form-control">
                                  </div>
                                  <div class="form-grup">
                                    <label for="">Email</label>
                                    <input type="text" required name="email" placeholder="Nama email" class="form-control">
                                  </div>
                                  <div class="form-group text-end">
                                    <button type="submit" name="simpan" class="btn btn-success btn-sm mt-4">Submit</button>
                                  </div>
                                </div>
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
                      <th>Alamat</th>
                      <th>Kontak</th>
                      <th>No.Telepon</th>
                      <th>Email</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($suppliers as $supplier) { ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $supplier['nama'] ?></td>
                      <td><?= $supplier['alamat'] ?></td>
                      <td><?= $supplier['kontak'] ?></td>
                      <td><?= $supplier['telepon'] ?></td>
                      <td><?= $supplier['email'] ?></td>
                      <td>
                        <a href="edit.php?id=<?= $supplier['id']?>" class="btn btn-primary text-white btn-sm">Edit</a>
                        <form action="" method="POST">
                          <input type="hidden" name="id" value="<?= $supplier['id']?>">
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