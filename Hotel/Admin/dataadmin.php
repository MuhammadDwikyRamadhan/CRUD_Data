<?php

include "navbar.php";

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Admin - Expro Hotel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <h1 class="text-center my-4">Data Admin</h1>
            <hr>
            <a type="button" class="btn btn-success fw-bold my-2 " href="tambahdataadmin.php">Tambah Data Admin</a>
            <main>
                <div class="container-fluid px-4 my-5">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-header text-center fw-bold">
                                Daftar Admin yang Tersedia
                            </div>
                            <table class="table table-hover" id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <?php
                                
                                $sql_query = "SELECT * FROM tbl_admin";
                                $result = $db->query($sql_query);
                                $no = 1;
                                
                                foreach ($result as $row) {
                                ?>
                                
                                <tbody>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['Nama']; ?></td>
                                        <td><?= $row['Username']; ?></td>
                                        <td><?= $row['Password']; ?></td>
                                        <td>
                                            <a type="button" class="btn btn-info fw-bold text-black badge p-2" href="ubahdataadmin.php?ID_Admin=<?= $row['ID_Admin'] ?>">Edit</a>
                                            <a type="button" class="btn btn-danger fw-bold text-black badge p-2" data-bs-toggle="modal" data-bs-target="#DeleteModal<?= $no ?>" href="hapusdataadmin.php?ID_Admin=<?= $row['ID_Admin']; ?>">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>

                                <div class="modal fade" id="DeleteModal<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmation Deleting Data Admin</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="hapusdataadmin.php" method="post">
                                                <input type="hidden" name="id" value="<?= $row['ID_Admin'] ?>">
                                                <div class="modal-body">
                                                    <h5>Are you sure want to delete this data? </h5>
                                                    <br>
                                                    Nama : <span class="text-danger"><?= $row['Nama']; ?></span>
                                                    <br>
                                                    Username : <span class="text-danger"><?= $row['Username']; ?></span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">No, I didn't mean to</button>
                                                    <button type="submit" class="btn btn-danger" name="btn_delete">Yes, Let's Do It</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>