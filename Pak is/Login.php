<?php
session_start();
session_unset();

require_once 'Models/LoginModel.php';
require_once 'Helpers/db_con.php';
 

// echo 'Hello world';
/*
 $db = new db();
 $conn = $db->getKoneksi();
 if($db->berhasil())
 {
 	echo '<br>Koneksi berhasil';
 }
 else{
 	echo '<br>Koneksi gagal.';
 }
 */

$loginMdl = new LoginModel();

if(isset($_POST["InputEmail"]))
{
	// echo "User: ".$_POST["InputEmail"]."<br>";
	// echo "Pwd: ".$_POST["InputPassword"]."<br>";

    $arrHsl = $loginMdl->Login($_POST["InputEmail"], $_POST["InputPassword"]);

    // echo 'Array Hasil: <br>';
    // print_r($arrHsl);
    $arrayLength = count($arrHsl);
    $info = 'Username atau password tidak sesuai.';
    if($arrayLength > 0)
    {
        $info = 'Login berhasil.';
        
        $return_arr = [];
        foreach($arrHsl as $row){
            // $id_person = $row['id_person'];
            // $nama = $row['nama'];
            // $peran = $row['peran'];
            // $id_peran = $row['id_peran'];
            // $alamat = $row['alamat'];
            // $surel = $row['surel'];
            // $no_hp = $row['no_hp'];
            
            $_SESSION['id_person'] = $row['id_person'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['nama_peran'] = $row['nama_peran'];
            $_SESSION['id_peran'] = $row['id_peran'];
            $_SESSION['alamat'] = $row['alamat'];
            $_SESSION['surel'] = $row['surel'];
            $_SESSION['no_hp'] = $row['no_hp'];
        }
        $_SESSION['base_url'] = 'https://abkaplikasi2023.000webhostapp.com'; //'http://localhost/staryou';
    }
	
}
else{
    // echo '<h1>Tidak POST </h1>';
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

    <title>SB Admin 2 - Login</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form method="POST" action="Login.php"   class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="InputEmail" id="InputEmail" 
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                            name="InputPassword" id="InputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> -->

                                        <input type="submit" class="btn btn-primary btn-user btn-block" 
                                        name="btn_login" id="btn_login" value="Login">

                                        <?php
                                        if(isset($arrayLength))
                                        {
                                            if($arrayLength > 0)
                                            {
                                                echo '<span style="color: blue;">'. $info.'</span>';

                                                $url = $_SESSION['base_url'].'/Main.php';
                                                
                                                
                                                 echo "<script type='text/javascript'>window.location.href='{$url}'</script>";
                                                 exit;
                                                
                                                //header("Location: ".$url);
                                                //die();



                                            }
                                            else{
                                                echo '<span style="color: red;">'. $info.'</span>';
                                            }
                                        }

                                        ?>




                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="Forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="Register.php">Create an Account!</a>
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

        </div>

    </div>

    <div>
<?php 

// require_once 'Helpers/db_con.php';

// //session_start();

// if(isset($_POST["InputEmail"]))
// {
// 	echo "User: ".$_POST["InputEmail"]."<br>";
// 	echo "Pwd: ".$_POST["InputPassword"]."<br>";
	
// 	//header("Location: http://localhost/iot/data_show_auto_reload.php?id=2e9d1bf4-ffec-4c30-a466-abc45b12c40d");
// }


?>
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