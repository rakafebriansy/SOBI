<?php

require_once 'Models/LoginModel.php';

$loginMdl = new LoginModel();

if(isset($_POST["nama"]))
{
    if($_POST["Password"] == $_POST["RepeatPassword"])
    {
        $arrHsl =  $loginMdl->Register($_POST["nama"], $_POST["email"], 
        $_POST["peran"], $_POST["Password"]);

        $arrayLength = count($arrHsl);
        $info = 'Registrasi gagal.';
        if($arrayLength > 0)
        {
            $info = 'Registrasi berhasil, silakan login menggunakan email.';
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form  method="POST" action="Register.php"  class="user">
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="nama" id="nama"
                                            placeholder="Nama">
                                </div>
                                <div class="form-group">
                                   
                                    <input type="email" class="form-control form-control-user" name="email"  id="email"
                                        placeholder="Email Address">
                                    </div>
                                <div class="form-group row"> 
                                    <div class="col-sm-2 mt-2 mb-sm-0">
                                        <label >
                                            Peran
                                        </label>
                                    </div>
                                    <div class="col-sm-10 mb-3 mb-sm-0">
                                        <select class="browser-default custom-select" name='peran' id='peran'>
                                            <option value="2">Orang Tua</option>
                                            <option value="3">Dokter</option>
                                            <option value="4">Psikolog</option>
                                            <option value="5">Guru</option>
                                        </select>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="Password" name="Password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="RepeatPassword" name="RepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" 
                                        name="btn_register" id="btn_register" value="Register Account">
                                
                                
                                        <?php
                                        if(isset($arrayLength))
                                        {
                                            if($arrayLength > 0)
                                            {
                                                echo '<span style="color: blue;">'. $info.'</span>';

                                            }
                                            else{
                                                echo '<span style="color: red;">'. $info.'</span>';
                                            }
                                        }

                                        ?>
                                        <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="Forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="Login.php">Already have an account? Login!</a>
                            </div>
                                    <div class="text-center">
                                        <a class="small" href="Home.php">Home</a>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>