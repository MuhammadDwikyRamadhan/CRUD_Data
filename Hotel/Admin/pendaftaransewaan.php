<?php

include "navbar.php";

if (isset($_POST['add_data'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_identitas = $_POST['no_identitas'];
    $no_handphone = $_POST['no_handphone'];
    $kamar = $_POST['pilih_kamar'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $jumlah_kamar = $_POST['jumlah_kamar'];


    $checkInDate = new DateTime($check_in);
    $checkOutDate = new DateTime($check_out);

    if ($checkOutDate <= $checkInDate) {
        echo '
        <script> 
        alert("Warning! The check out date must be after check in date!");  window.location = "pendaftaransewaan.php" 
        </script> 
        ';
        exit();
    }

    $interval = $checkInDate->diff($checkOutDate);
    $total_hari = $interval->days;

    $harga_kamar_query = mysqli_query($db, "SELECT DISTINCT Harga FROM tbl_jenis_kamar WHERE ID_Kamar = '$kamar'");
    if ($harga_kamar_query) {
        if (mysqli_num_rows($harga_kamar_query) > 0) {

            $harga_kamar_row = mysqli_fetch_assoc($harga_kamar_query);

            $harga_kamar = $harga_kamar_row['Harga'];

            echo $harga_kamar;
        } else {
            echo "No results found.";
        }
    } else {
        echo "Query failed: " . mysqli_error($db);
    }

    $total_biaya = $total_hari * $jumlah_kamar * intval($harga_kamar);

    $sql_query = "INSERT INTO tbl_penyewa (Nama, No_Identitas, No_HP, ID_Kamar, CheckIn, CheckOut, Jumlah_Kamar, Total) 
                    VALUES ('$nama_lengkap', '$no_identitas', '$no_handphone', '$kamar', '$check_in', '$check_out', '$jumlah_kamar', '$total_biaya')";
    
    
    if ($db->query($sql_query)) {
        echo '
        <script> 
        alert("Data Has Been Added Successfully!");  window.location = "daftarsewaan.php" 
        </script> 
        ';
    } else {
        echo '
            <script> 
            alert("Gagal Memasukkan Data!"); 
            </script> 
            ';
    }
    
}

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Penyewaan - Expro Hotel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="container my-5">
            <h1 class="text-start">Penyewaan Kamar</h1>
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Lengkap" name="nama_lengkap" require>
                    <label for="floatingInput">Nama Lengkap</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="No Identitas" name="no_identitas" require>
                    <label for="floatingInput">No Identitas</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingPassword" placeholder="No Handphone" name="no_handphone" require>
                    <label for="floatingPassword">No Handphone</label>
                </div>
                <select class="form-select my-3" aria-label="Default select example" name="pilih_kamar" id="pilih_kamar">
                    <option selected>-- Pilih Kamar --</option>
                    <?php
                        $sql_query = "SELECT DISTINCT Jenis_Kamar, ID_Kamar FROM tbl_jenis_kamar";
                        $result = mysqli_query($db, $sql_query);
                        foreach ($result as $show) {
                        echo '<option value="'.$show["ID_Kamar"].'">'.$show["Jenis_Kamar"].'</option>';
                        }
                    ?>
                </select>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="floatingPassword" placeholder="Check In" name="check_in" require>
                    <label for="floatingPassword">Check In</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="floatingPassword" placeholder="Check Out" name="check_out" require>
                    <label for="floatingPassword">Check Out</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingPassword" placeholder="Jumlah Kamar" name="jumlah_kamar" require>
                    <label for="floatingPassword">Jumlah Kamar</label>
                </div>
                <div class="d-grid gap-2 my-3">
                    <button type="submit" class="btn btn-warning fw-bold rounded-pill" name="add_data" data-bs-toggle="modal" data-bs-target="#modalAdd">Tambah Data</button>
                </div>
            </form>
        </div>
        <div class="modal fade" id="modalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmation Adding Data</h1>
                    button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                    <h5>Are you sure want to add this data? </h5>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">No, I didn't mean to</button>
                    <button type="submit" class="btn btn-danger" name="btn_delete">Yes, Let's Do It</button>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>