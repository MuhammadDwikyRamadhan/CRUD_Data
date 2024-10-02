<?php

include "navbar.php";

if (isset($_POST['add_data'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // query disimpan dalam var $sql_query
    $sql_query = "INSERT INTO tbl_admin (Nama, Username, Password) VALUES ('$nama', '$username', '$password')";

    if ($db->query($sql_query)) {
        header("location: dataadmin.php");
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
        <title>Add Data - Expro Hotel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="container my-5">
            <h1 class="text-start">Tambah Data Admin</h1>
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama" name="nama" require>
                    <label for="floatingInput">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" require>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" require>
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="d-grid gap-2 my-3">
                    <button type="submit" class="btn btn-warning fw-bold rounded-pill" name="add_data">Tambah Data</button>
                </div>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>