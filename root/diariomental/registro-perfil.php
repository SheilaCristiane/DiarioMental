<?php 
ob_start();
include ("template-top.php"); 
include("config.php"); 
include("verifica.php");

$codigo = $_SESSION['codigousuario'];
$codigoreg = $_GET['codigo'];

if(isset($_GET['excluir'])) {
    $codigo = $_GET['excluir'];
    $consulta5 = $MySQLi->query("DELETE FROM TB_REGISTROS WHERE REG_CODIGO = $codigo");
    $consulta6 = $MySQLi->query("DELETE FROM TB_REGHUMORES WHERE HDR_REG_CODIGO = $codigo");
    header("Location: principal.php");
} 

$consulta3 = $MySQLi->query("SELECT * FROM TB_REGISTROS JOIN TB_REGHUMORES ON HDR_REG_CODIGO = REG_CODIGO WHERE REG_CODIGO = $codigoreg AND REG_USU_CODIGO = $codigo");
$resultado3 = $consulta3->fetch_assoc();

$consulta4 = $MySQLi->query("SELECT * FROM TB_REGISTROS JOIN TB_REGHUMORES ON HDR_REG_CODIGO = REG_CODIGO JOIN TB_HUMORES ON HDR_HUM_CODIGO = HUM_CODIGO WHERE REG_CODIGO = $codigoreg AND REG_USU_CODIGO = $codigo");

$dtreg = implode("/",array_reverse(explode("-",$resultado3['REG_DATA'])));
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="row">
    <div class="col-lg-11">
       <div class="card shadow mb-4" style="left: 5%;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Histórico de Humor</h6>
        </div>
        <div class="card-body">
        <div class="form-group row">
        <div class="col-lg-6">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <label> Data </label>
                    <input class="form-control form-control-user" value="<?php echo $dtreg; ?>" readonly>
                </div>
                <div class="col-sm-12">
                    <br>
                    <label> Humores </label>
                    
                    <?php while ($resultado4 = $consulta4->fetch_assoc()) { ?>
                    <label class="form-control form-control-user" readonly><?php echo $resultado4['HUM_HUMOR'];?></label>
                    <?php } ?>
                </div>
            </div>
        
        <div class="col-lg-6">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label> Anotações </label>
                <textarea class="form-control form-control-user" style="width:100%; height: 90%;" readonly><?php echo $resultado3['REG_NOTA'];?></textarea>
            </div>
        </div>
        </div>
        </div>
        <div class="card-header py-3">
    <div class="form-group row">
            <div class="col-sm-4">
                <a  href="principal.php" class="btn btn-facebook btn-user btn-block">
                    Voltar
                </a>
            </div>
            <div class="col-sm-4">
                <a  href="registro-editar.php?codigo=<?php echo $resultado3['REG_CODIGO']; ?>">
                    <button type="submit" class="btn btn-facebook btn-user btn-block">
                         Editar registro 
                    </button>
                </a>
            </div>
            <div class="col-sm-4">
                <button onclick="document.getElementById('id03').style.display='block'" class="btn btn-facebook btn-user btn-block">Excluir registro</button>
                <div id="id03" class="w3-modal">
                    <div class="w3-modal-content" style="width: 500px;">
                        <header class="w3-container">
                            <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2>Excluir registro</h2>
                        </header>
                        <center>
                        <div class="w3-container">
                            <h5>Tem certeza que deseja excluir esse registro de humor? Todas as informações armazenadas serão perdidas e para ter um histórico corresponte a esse dia, será necessário realizar um novo cadastro.</h5>
                        </div>
                    </center>
                        <hr>
                        <footer class="w3-container">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <a href="registro-perfil.php?codigo=<?php echo $resultado3['REG_CODIGO']; ?>"> <button class="btn btn-facebook btn-user btn-block"> Cancelar </button></a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="registro-perfil.php?excluir=<?php echo $resultado3['REG_CODIGO']; ?>">
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


<?php include ("template-bottom.php"); ?>