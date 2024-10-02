<?php

include "connection.php";
session_start();

$login_message = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_query = "SELECT * FROM tbl_admin WHERE Username = '$username' AND Password = '$password'";

    $result = $db->query($sql_query);

    $data = $result->fetch_assoc();
    $_SESSION["Username"] = $data["Username"];

    if ($result->num_rows > 0) {
        echo '
        <script>
        alert("Successfully Logged In!"); window.location = "dataadmin.php"
        </script>
        ';
    } else {
        $login_message = "Username atau password tidak ditemukan!";
    }
}

?>

<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Expro Hotel</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
    <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Welcome to Expro Hotel!</h3>
                                        <h6 class="text-center ">Please Login to Use This Site</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="login.php" method="POST">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label fw-bold">Username*</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username" require>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label fw-bold">Password*</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Min 8 character" name="password" require>
                                            </div>
                                            <div class="mb-5 form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <div class="d-flex justify-content-between fw-bold">
                                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary fw-bold" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Expro Hotel 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>