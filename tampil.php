<?php
$buku = file("data.txt");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Tampilkan Data Perpus</title>
</head>
<body>
<div class="latar">
        <div class="header">
            <h1>DATA BUKU</h1>
          
            <div class="list">
                <li><a href="form.php">FORM PENDAFTARAN BUKU</a></li>
            </div>
        </div>
    </div>

<table class="my-table">
  <tr>
    <th>KODE BUKU</th>
    <th>JUDUL BUKU</th>
    <th>PENGARANG</th>
    <th>PENERBIT</th>
    <th>TANGGAL</th>
    <th>COVER BUKU</th>
    <th>Seting</th>
  </tr>
  <?php
  foreach ($buku as $row) {
    $rowData = explode("-", $row);
    if (count($rowData) >= 6) {
      $gambar = trim($rowData[5]);
  ?>
    <tr>
      <td><?php echo $rowData[0]; ?></td>
      <td><?php echo $rowData[1]; ?></td>
      <td><?php echo $rowData[2]; ?></td>
      <td><?php echo $rowData[3]; ?></td>
      <td><?php echo $rowData[4]; ?></td>
      <td><img src="asset/<?php echo $gambar; ?>" alt="Cover Buku" width="100"></td>
      <td>
      <a href='hapus.php?kode=<?php echo $rowData[0]; ?>'>Hapus</a>
      <a href='update.php?kode=<?php echo $rowData[0]; ?>'>Update</a>
      </td>
    </tr>
  <?php
    }
  }
  ?>
</table>
</body>
</html>
