<?php

function upload(){

  $namaFile = $_FILES['cover']['name'];
  $ukuranFile = $_FILES['cover']['size'];
  $error = $_FILES['cover']['error'];
  $tmpName = $_FILES['cover']['tmp_name'];

  if($error === 4){
    echo "<script> 
    alert('Pilih Gambar Terlebih Dahulu');
    </script>";
    return false;
  }
  
  $tipeGambar = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if( !in_array($ekstensiGambar, $tipeGambar)){
    echo "<script> 
      alert('Yang Anda Upload Bukan Gambar');
      </script>";
      return false;
  }
  
  move_uploaded_file($tmpName, 'asset/' . $namaFile);

  return $namaFile;
}

function tambahData(){
  
    $kode = $_POST['kode'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tanggal = $_POST['tanggal'];
    //upload gambar
    $gambar = upload();
    if( !$gambar ){
      return false;
    }

    $cek = fopen("data.txt", "a");// Membuka file untuk ditulis

    fwrite($cek, "$kode-$judul-$pengarang-$penerbit-$tanggal-$gambar\n");// Menulis teks ke file
   
    fclose($cek); // Menutup file handle

    return true;
}

function updateData(){
  $kodeBuku = $_POST['kode'];
  $judulBuku = $_POST['judul'];
  $pengarang = $_POST['pengarang'];
  $penerbit = $_POST['penerbit'];
  $tanggal = $_POST['tanggal'];
  $gambarlama = $_POST['gambarlama'];

  if($_FILES['cover']['error'] === 4){
    $gambar = $gambarlama;
  }else{
    $gambar = upload();
    if( !$gambar ){
      return false;
    }
  }
  
  $file = "data.txt";

  $data = file($file);

  foreach ($data as $key => $line) {
     $rowData = explode("-", $line);

     if ($rowData[0] === $kodeBuku) {
         $data[$key] = "$kodeBuku-$judulBuku-$pengarang-$penerbit-$tanggal-$gambar\n";
         break;
     }
  }

  file_put_contents($file, implode("", $data));

  return true;
}

?>