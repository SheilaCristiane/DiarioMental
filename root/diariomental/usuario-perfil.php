
<?php 
ob_start();
include("config.php");
include("verifica.php");
$codigo = $_SESSION['codigousuario'];
if(isset($_GET['excluir'])) {
    $codigo = $_GET['excluir'];
    $consulta = $MySQLi->query("DELETE FROM TB_USUARIOS WHERE USU_CODIGO = $codigo");
    header("Location: index.php");
}
$consulta2 = $MySQLi->query("SELECT * FROM TB_USUARIOS WHERE USU_CODIGO = $codigo");
$resultado2 = $consulta2->fetch_assoc();

$dtnasc = implode("/",array_reverse(explode("-",$resultado2['USU_DTNASCIMENTO'])));
$nome = explode(" ",$resultado2['USU_NOME']);

include ("template-top.php"); 
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="row">
	<div class="col-lg-11">
     <div class="card shadow mb-4" style="left: 5%;">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Olá, <?php echo $nome[0]; ?>. Estes são os seus dados cadastrados:</h6>
         </div>
         <div class="card-body">
            <div class="form-group d-none">
                <label>Código</label>
                <input name="codigocliente" value="<?php echo $resultado2['USU_CODIGO']; ?>" readonly class="form-control">
            </div>
            <div class="form-group">
               <label> Nome Completo: </label>
               <input type="text" class="form-control form-control-user" value="<?php echo $resultado2['USU_NOME']; ?>" readonly>
           </div>
           <label> Data de nascimento (dia, mês e ano): </label>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" value="<?php echo $dtnasc; ?>" readonly>
            </div>

        <div class="form-group">
           <label> E-mail: </label>
           <input type="email" class="form-control form-control-user" value="<?php echo $resultado2['USU_EMAIL']; ?>" readonly>
       </div>
       <div class="form-group">
        <label> Senha: </label>
        <input type="password" class="form-control form-control-user" value="<?php echo $resultado2['USU_SENHA']; ?>" readonly>
    </div>
</div>
<div class="card-header py-3">
    <div class="form-group row">
        <div class="col-sm-6">
                <a  href="usuario-editar.php">
                    <button type="submit" class="btn btn-facebook btn-user btn-block">
                         Editar perfil 
                    </button>
                </a>
            </div>
            <div class="col-sm-6">
                <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-facebook btn-user btn-block">Excluir conta</button>
                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content" style="width: 500px;">
                        <header class="w3-container">
                            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2>Excluir conta</h2>
                        </header>
                        <center>
                        <div class="w3-container">
                            <h5>Tem certeza de que deseja excluir sua conta? Para logar novamente no sistema será necessário um novo cadastro.</h5>
                        </div>
                    </center>
                        <hr>
                        <footer class="w3-container">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <a href="usuario-perfil.php"> <button class="btn btn-facebook btn-user btn-block"> Cancelar </button></a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="usuario-perfil.php?excluir=<?php echo $resultado2['USU_CODIGO']; ?>">
                                        <button class="btn btn-facebook btn-user btn-block"> Excluir </button>
                                    </a>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
    </div>
</div>
</div>
</div>
</div>
<?php include ("template-bottom.php"); ?>