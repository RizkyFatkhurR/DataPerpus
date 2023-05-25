<?php
require 'fungsi.php';

if(isset($_POST['kirim'])){
    if(tambahData($_POST)){
        echo "<script> 
            alert('Data berhasil ditambahkan');
            window.location.href = 'tampil.php';
            </script>";
    } else{
        echo "<script> 
            alert('Data gagal ditambahkan');
            window.location.href = 'form.php';
            </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FORM BOOK</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<div class="latar">
        <div class="header">
            <h1>FORM BUKU PERPUSTAKAAN</h1>
            <div class="list">
            <a href="tampil.php">DATA BUKU</a>
            </div>
        </div>
    </div>
    
    <div class="form">
    <form action="" method="post" enctype="multipart/form-data">
        <h2>FORM KATALOG BUKU PERPUSTAKAAN</h2>
        <div class="content">
          <div class="input-field">
          <input type="text" name="kode" placeholder="Kode Buku">
          </div>

          <div class="input-field">
          <input type="text" name="judul" placeholder="Judul">
          </div>

          <div class="input-field">
          <input type="text" name="pengarang" placeholder="Nama Pengarang">
          </div>

          <div class="input-field">
          <input type="text" name="penerbit" placeholder="Nama Penerbit">
          </div>

          <div class="input-field">
          <input type="text" name="tanggal" placeholder="Tahun Terbit">
          </div>

          <div class="input-field">
          <h3>Cover Buku : </h3>
          <input type="file" name="cover" >
          </div>
        </div>
        <div class="action">
          <button type="submit" name="kirim">KIRIM</button>
        </div>
      </form>
    </div>
</body>

</html>
