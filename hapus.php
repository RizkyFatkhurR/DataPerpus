<?php
//script menghapus data
if(isset($_GET['kode'])){
    // Data yang ingin dihapus
    $kodeBuku = $_GET['kode'];
    
    // Nama file
    $File = "data.txt";
    
    // Membaca seluruh data dari file
    $data = file($File);
    
    // Mencari baris yang sesuai dengan kode buku
    foreach ($data as $key => $line) {
        $rowData = explode("-", $line);
    
        // Cek apakah kode buku sesuai
        if ($rowData[0] === $kodeBuku) {
            // Menghapus baris dari array data
            unset($data[$key]);
            break; // Hentikan pencarian setelah baris ditemukan
        }
    }
    
    // Menulis ulang data yang tersisa ke file
    file_put_contents($File, implode("", $data));
    
    echo "<script> 
            alert('Data Telah Dihapus');
            window.location.href = 'tampil.php';
            </script>";
}
?>
