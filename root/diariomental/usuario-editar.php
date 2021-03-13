<?php 
ob_start();
include("config.php");
include("verifica.php");
$codigo = $_SESSION['codigousuario'];

$mensagem = "";

$consulta2 = $MySQLi->query("SELECT * FROM TB_USUARIOS WHERE USU_CODIGO = $codigo");
$resultado2 = $consulta2->fetch_assoc();

$dtnasc_completa = explode(' ', $resultado2['USU_DTNASCIMENTO']);
$dtnasc_data = explode('-', $dtnasc_completa[0]); 

if (isset($_POST['nome'])){
    $codigousuario = $_POST['codigousuario'];
    $nome = $_POST['nome'];
    $data = '' . $_POST['ano'] . "-" . $_POST['mes'] . "-" . $_POST['dia']; 
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmar'];
    if ($senha == $confirmar){
        $consulta = $MySQLi->query("UPDATE TB_USUARIOS SET USU_NOME = '$nome', USU_DTNASCIMENTO = '$data', USU_EMAIL = '$email', USU_SENHA = '$senha' where USU_CODIGO = $codigousuario");
        header("Location: usuario-perfil.php");
    } else {
        $mensagem = "Senhas diferentes";
    }
};

include ("template-top.php"); 
?>
<div class="row">
	<div class="col-lg-11">
        <div class="card shadow mb-4" style="left: 5%;">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Olá, <?php echo $resultado2['USU_NOME']; ?>. Fique à vontade para editar os seus dados:</h6>
            </div>

            <div class="card-body">
                <form action="?" method="POST">
                    <div class="form-group d-none">
                        <label>Código</label>
                        <input name="codigousuario" value="<?php echo $resultado2['USU_CODIGO']; ?>" readonly class="form-control">
                    </div>
                    <center><span> <?php echo $mensagem; ?></span></center>
                    <div class="form-group">
                        <label> Nome Completo: </label>
                        <input type="text" class="form-control form-control-user" required value="<?php echo $resultado2['USU_NOME']; ?>" name="nome">
                    </div>
                    <label> Data de nascimento (dia, mês e ano): </label>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <input name="dia" class="form-control form-control-user" required value="<?php echo $dtnasc_data[2]; ?>">
                        </div>
                        <div class="col-sm-4">
                            <input name="mes" class="form-control form-control-user" required value="<?php echo $dtnasc_data[1]; ?>">
                        </div>
                        <div class="col-sm-4">
                            <input name="ano" class="form-control form-control-user" required value="<?php echo $dtnasc_data[0]; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label> E-mail: </label>
                        <input type="text" class="form-control form-control-user" required value="<?php echo $resultado2['USU_EMAIL']; ?>" name="email">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Senha: </label>
                            <input type="password" class="form-control form-control-user" name="senha" required value="<?php echo $resultado2['USU_SENHA']; ?>">
                        </div>
                        <div class="col-sm-6">
                            <label> Confirmar senha: </label>
                            <input type="password" class="form-control form-control-user" name="confirmar" required value="<?php echo $resultado2['USU_SENHA']; ?>">
                        </div>
                    </div>
                    </div>
                    
                    <div class="card-header py-3">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <a href="usuario-perfil.php"><button type="submit" class="btn btn-facebook btn-user btn-block"> Cancelar </button></a>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-facebook btn-user btn-block"> Salvar </button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        
    </div>
</div>
<?php include ("template-bottom.php"); ?>