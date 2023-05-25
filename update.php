<?php
require 'fungsi.php';

if(isset($_POST['ubah'])){
    if(updateData($_POST)){
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
    <title>FORM PERPUSTAKAAN</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<div class="latar">
        <div class="header">
            <h1>PERPUS</h1>
            <div class="list">
                <li><a href="tampil.php">MENU UTAMA</a></li>
            </div>
        </div>
    </div>
    
    <div class="form">
    <form action="" method="post" enctype="multipart/form-data">
        <h2>FORM UPDATE KATALOG BUKU PERPUSTAKAAN</h2>
        <?php
        $buku = file("data.txt");
        foreach ($buku as $row) {
        $rowData = explode("-", $row);
  ?>
        <div class="content">
          <div class="input-field">
          <input type="hidden" name="kode" placeholder="Kode Buku" value="<?php echo $rowData[0]; ?>">
          <input type="hidden" name="gambarlama" value="<?php echo $rowData[5];?>">
          </div>

          <div class="input-field">
          <input type="text" name="judul" placeholder="Judul"value="<?php echo $rowData[1]; ?>">
          </div>

          <div class="input-field">
          <input type="text" name="pengarang" placeholder="Nama Pengarang"value="<?php echo $rowData[2]; ?>">
          </div>

          <div class="input-field">
          <input type="text" name="penerbit" placeholder="Nama Penerbit"value="<?php echo $rowData[3]; ?>">
          </div>

          <div class="input-field">
          <input type="text" name="tanggal" placeholder="Tahun Terbit"value="<?php echo $rowData[4]; ?>">
          </div>

          <div class="input-field">
          <h3>Cover Buku : </h3>
          <img src="asset/<?=$rowData[5];?>" alt="Cover Buku" width="100">
          <input type="file" name="cover" >
          </div>
        </div>
        <div class="action">
          <button type="submit" name="ubah">KIRIM</button>
        </div>
        <?php
  }
  ?>
      </form>
    </div>
</body>

</html>