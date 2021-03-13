<!DOCTYPE html>
<html lang="en">

<?php
    ob_start();
    $msg = 0;
    include("config.php");
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $consulta = $MySQLi->query("SELECT * FROM TB_USUARIOS WHERE USU_EMAIL = '$email' AND USU_SENHA = '$senha'");
        if($resultado = $consulta->fetch_assoc()){
            $_SESSION['codigousuario'] = $resultado['USU_CODIGO'];
            $_SESSION['nomeusuario'] = $resultado['USU_NOME'];
            header("Location: principal.php");
        }
        $msg = 1;
    } 
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DiárioMental</title>
    <link rel="shortcut icon" href="img/slogan.jpg" />

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
                            <div class="col-lg-6 d-none d-lg-block" style="background-image: url(img/slogan.jpg); background-position: center;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                                    </div>
                                    <form class="user" action="?" method="POST">
                                        <?php if($msg == 1) echo "<span class='badge badge-danger col-12'> Usuário ou senha inválida! </span>"; ?>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" placeholder="E-mail" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" placeholder="Senha" name="senha" required>
                                        </div>
                                        <hr>
                                        <a> <button class="btn btn-facebook btn-user btn-block"> Entrar </button></a>
                                    </form>
                                    <!-- Coloca o recaptcha aqui -->
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Esqueceu sua senha?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="usuario-novo.php">Não tem uma conta? Cadastre-se!</a>
                                    </div>
                                </div>
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