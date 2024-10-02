<?php

include "navbar.php";

if (isset($_GET['ID_Kamar'])) {

    // ambil id dari query string
    $id = $_GET['ID_Kamar'];
    $sql_query = "SELECT * FROM tbl_jenis_kamar WHERE ID_Kamar = '$id'";
    $result = $db->query($sql_query);

    $data = mysqli_fetch_array($result);

}

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Room Data - Expro Hotel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1 class="text-start">Ubah Data Admin</h1>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?= $data['ID_Kamar']; ?>">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Jenis Kamar" name="jenis_kamar" value="<?= $data['Jenis_Kamar']; ?>">
                    <label for="floatingInput">Jenis Kamar</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" value="<?= $data['Harga']; ?>">
                    <label for="floatingInput">Harga</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingPassword" placeholder="Keterangan" name="keterangan" value="<?= $data['Keterangan']; ?>" require>
                    <label for="floatingPassword">Keterangan</label>
                </div>
                <div class="d-grid gap-2 my-3">
                    <button type="submit" class="btn btn-warning fw-bold rounded-pill" name="edit_data">Ubah</button>
                </div>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>

<?php

if (isset($_POST['edit_data'])) {
    if ($db->connect_error) {
        die('Gagal Terkoneksi!' . $db->connect_error);
    }

    $id = $_GET['ID_Kamar'];
    $new_jenis_kamar = $_POST['jenis_kamar'];
    $new_harga = $_POST['harga'];
    $new_keterangan = $_POST['keterangan'];

    $result = mysqli_query($db, "UPDATE tbl_jenis_kamar SET Jenis_kamar = '$new_jenis_kamar', Harga = '$new_harga', Keterangan = '$new_keterangan' 
    WHERE ID_Kamar = '$id'") or die(mysqli_error($db));

if ($result) {
    echo '
    <script>
    alert("Selected Data Has Been Changed Successfully!"); window.location = "jeniskamar.php"
    </script>
    ';
} else {
    echo "Error Updating Data : " . mysqli_error($db);
}

}

?>