<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/back/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <!-- cek pesan notifikasi -->
                                    <?php
                                    require('settings/db.php');
                                    if (isset($_POST['login'])) {
                                        // activate session
                                        session_start();

                                        // get data from Login Form
                                        $username = $_POST['username'];
                                        $password = md5($_POST['password']);

                                        // Check data from table users
                                        $data = mysqli_query($con, "select * from users where username='$username' and password='$password'");

                                        // check data if exists
                                        $cek = mysqli_num_rows($data);

                                        if ($cek > 0) {
                                            $_SESSION['username'] = $username;
                                            $_SESSION['status'] = "login";
                                            header("location:index.php");
                                        } else {
                                            header("location:login.php?pesan=error");
                                        }
                                    }


                                    if (isset($_GET['pesan'])) {
                                        if ($_GET['pesan'] == "error") {
                                            echo "Login Error! wrong username/password!";
                                        } else if ($_GET['pesan'] == "logout") {
                                            echo "Logout Successfully";
                                        } else if ($_GET['pesan'] == "no_session") {
                                            echo "Restricted! You need Login";
                                        }
                                    }
                                    ?>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <a href="register.php">Register Here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/back/vendor/jquery/jquery.min.js"></script>
    <script src="assets/back/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/back/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/back/js/sb-admin-2.min.js"></script>

</body>

</html>