<?php

include "navbar.php";
$id = $_GET['ID_Admin'];
$sql = mysqli_query($db, "SELECT * FROM tbl_admin WHERE ID_Admin = '$id'");
$data = mysqli_fetch_array($sql);

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Data - Expro Hotel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1 class="text-start">Ubah Data Admin</h1>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $data['ID_Admin']; ?>">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama" name="nama" value="<?php echo $data['Nama']; ?>">
                    <label for="floatingInput">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" value="<?php echo $data['Username']; ?>">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingPassword" placeholder="Password" name="password" value="<?php echo $data['Password']; ?>" require>
                    <label for="floatingPassword">Password</label>
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

    $id = $_GET['ID_Admin'];
    $new_name = $_POST['nama'];
    $new_username = $_POST['username'];
    $new_password = $_POST['password'];

    $result = mysqli_query($db, "UPDATE tbl_admin SET Nama = '$new_name', Username = '$new_username', Password = '$new_password' 
    WHERE ID_Admin = '$id'") or die(mysqli_error($db));

if ($result) {
    echo '
    <script>
    alert("Selected Data Has Been Changed Successfully!"); window.location = "dataadmin.php"
    </script>
    ';
} else {
    echo "Error Updating Data : " . mysqli_error($db);
}

}

?>