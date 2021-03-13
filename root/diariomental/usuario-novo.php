<?php
ob_start();
$msg = 0;
$mensagem = " ";
include("config.php");
if (isset($_POST['nome'])){
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $dt = implode("-",array_reverse(explode("/",$data)));
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmar'];
    if ($senha == $confirmar) {
        $consulta = $MySQLi -> query("INSERT INTO TB_USUARIOS (USU_NOME, USU_DTNASCIMENTO, USU_EMAIL, USU_SENHA) VALUES ('$nome', '$dt', '$email', '$senha')");
    } else {
        $mensagem = "Senhas diferentes.";
    }
};
if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $consulta2 = $MySQLi->query("SELECT * FROM TB_USUARIOS WHERE USU_EMAIL = '$email' AND USU_SENHA = '$senha'");
    if($resultado2 = $consulta2->fetch_assoc()){
        $_SESSION['codigousuario'] = $resultado2['USU_CODIGO'];
        $_SESSION['nomeusuario'] = $resultado2['USU_NOME'];
        header("Location: principal.php");
    }
    $msg = 1;
} 
?>
<html>

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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="background-attachment: fixed;">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5" style="bottom: 25px;">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block" style="background-image: url(img/slogan.jpg);background-position: center; background-size: cover;">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Criar uma conta!</h1>
                                <span> <?php echo $mensagem; ?></span>
                            </div>
                            <form class="user" action="?" method="POST">
                            	<div class="form-group">
                                    <label> Nome completo: </label>
                                    <input type="text" class="form-control form-control-user" placeholder="Nome e Sobrenome" name="nome" required>
                                </div>
                                
                                <div class="form-group">
                                    <label> Data de nascimento (Apenas números): </label>
                                        <input type="date" class="form-control form-control-user" name="data" required>
                                </div>
                                <div class="form-group">
                                    <label>E-mail:</label>
                                    <input type="email" class="form-control form-control-user" placeholder="Endereço de e-mail - '...'@algo.com" name="email" required>
                                </div>
                                <label>Senha:</label>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" placeholder="Senha" name="senha" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" placeholder="Confirmar senha" name="confirmar" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" id="checkbox" class="custom-control-input" required>
                                        <label class="custom-control-label" for="checkbox"> Li e concordo com os termos de privacidade </label>
                                    </div>
                                </div>
                                <!-- Vai colocar o recaptcha aqui -->
                                <center>
                                    <div class="form-row">
                                        <div class="col-sm-6">
                                            <a href="index.php" class="btn btn-facebook btn-user btn-block"> Cancelar </a>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-facebook btn-user btn-block">
                                                Registrar conta
                                            </button>
                                        </div>
                                    </div>
                                    
                                </center>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="index.php">Já tem uma conta? Conecte-se!</a>
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