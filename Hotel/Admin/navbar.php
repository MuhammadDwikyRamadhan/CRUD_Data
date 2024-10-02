<?php

include "connection.php";
session_start();

if (!isset($_SESSION['Username'])) {
  header('location: login.php');
  exit;
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("location: login.php");
  }


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
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Expro Hotel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dataadmin.php">Data Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="jeniskamar.php">Daftar Kamar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pendaftaransewaan.php">Penyewaan</a>
          </li>
        </ul>
        <form role="search" method="POST" class="d-flex">
          <p class="d-flex mx-5">Halo, <?= $_SESSION['Username'] ?></p>
          <button class="btn btn-outline-danger" type="submit" name="logout">Logout</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- Bootstrap's JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>

