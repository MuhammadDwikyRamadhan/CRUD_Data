<?php

include "connection.php";
session_start();

if (isset($_POST['ID_Admin'])) {
    if ($db->connect_error) {
        die('Gagal Terkoneksi!' . $db->connect_error);
    }

    $id = $_POST['ID_Admin'];
    $new_name = $_POST['nama'];
    $new_username = $_POST['username'];
    $new_password = $_POST['password'];
    $sql_query = "UPDATE tbl_admin SET Username = '$new_username', Password = '$new_password' WHERE ID_Admin = $id";
    $result = mysqli_query($db, $sql_query);

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