<?php

include "navbar.php";

if (isset($_POST['add_data'])) {
    $kamar = $_POST['jenis_kamar'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];

    // query disimpan dalam var $sql_query
    $sql_query = "INSERT INTO tbl_jenis_kamar (Jenis_Kamar, Harga, Keterangan) VALUES ('$kamar', '$harga', '$keterangan')";

    if ($db->query($sql_query)) {
        header("location: jeniskamar.php");
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
        <title>Add Room - Expro Hotel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="container my-5">
            <h1 class="text-start">Tambah Jenis Kamar</h1>
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Jenis Kamar" name="jenis_kamar" require>
                    <label for="floatingInput">Jenis Kamar</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" require>
                    <label for="floatingInput">Harga</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingPassword" placeholder="Keterangan" name="keterangan" require>
                    <label for="floatingPassword">Keterangan</label>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>