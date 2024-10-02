<?php

include "navbar.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Sewaan - Expro Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
      <h1 class="text-center my-4">Data Penyewaan Kamar Hotel Expro</h1>
      <hr>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Penyewa</th>
            <th scope="col">No Identitas</th>
            <th scope="col">No HP</th>
            <th scope="col">Jenis Kamar</th>
            <th scope="col">Tanggal Check In</th>
            <th scope="col">Tanggal Check Out</th>
            <th scope="col">Jumlah Kamar</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <?php

        $sql_query = "SELECT Nama, No_Identitas, No_HP, Jenis_Kamar, CheckIn, CheckOut, Jumlah_Kamar, Total 
                      FROM tbl_penyewa
                      LEFT JOIN tbl_jenis_kamar
                      ON tbl_penyewa.ID_Kamar = tbl_jenis_kamar.ID_Kamar";
        $result = $db->query($sql_query);
        $no = 1;

        foreach ($result as $row) {
        
        ?>
        
        <tbody>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['Nama']; ?></td>
            <td><?= $row['No_Identitas']; ?></td>
            <td><?= $row['No_HP']; ?></td>
            <td><?= $row['Jenis_Kamar']; ?></td>
            <td><?= $row['CheckIn']; ?></td>
            <td><?= $row['CheckOut']; ?></td>
            <td><?= $row['Jumlah_Kamar']; ?></td>
            <td>Rp<?= $row['Total'] ?></td>
          </tr>
        </tbody>

        <?php
        
        }
        
        ?>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>