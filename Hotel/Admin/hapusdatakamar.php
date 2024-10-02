<?php

include "connection.php";

// query string : ?id=1, query string ini akan tersimpan dalam var _POST

if (isset($_POST['btn_delete'])) {
    // ambil id dari query string
    $id = $_POST['id'];
    // buat query hapus
    $sql_query = "DELETE FROM tbl_jenis_kamar WHERE ID_Kamar = $id";
    // eksekudi query
    $result = $db->query($sql_query);
    // apakah query hapus berhasil?
    if ($result) {
        echo 
        "
        <script>
            alert('Selected Data Has Been Deleted Successfully!');
            document.location = 'jeniskamar.php';
        </script>
        ";
    } else {
        die("gagal menghapus...");
    }
    
}

?>