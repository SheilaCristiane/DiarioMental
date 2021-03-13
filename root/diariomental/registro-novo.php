<?php
include("config.php"); 
include("verifica.php");

$codigo = $_SESSION['codigousuario'];

$contagem = 0;


if(isset($_POST['data'])) {
    $data = $_POST['data'];
    $nota = $_POST['nota'];
    
    $consulta = $MySQLi->query("INSERT INTO TB_REGISTROS (REG_USU_CODIGO, REG_NOTA, REG_DATA) VALUES ($codigo, '$nota', '$data')");
    $consulta2 = $MySQLi->query("SELECT * FROM TB_REGISTROS WHERE REG_DATA = '$data' AND REG_NOTA = '$nota'");
    $resultado2 = $consulta2->fetch_assoc();
    $codigoregistro = $resultado2['REG_CODIGO'];

    if(!empty($_POST['humor'])){
            foreach ($_POST['humor'] as $humor) {
                $consulta5 = $MySQLi->query("INSERT INTO TB_REGHUMORES (HDR_REG_CODIGO, HDR_HUM_CODIGO) VALUES ($codigoregistro, $humor)");
            }
        } else {
            echo "Por favor, selecione um humor.";
        }


    header("Location: principal.php");
}

$consulta4 = $MySQLi->query("SELECT * FROM TB_HUMORES");

include ("template-top.php");

?>

<div class="row">
    <div class="col-lg-5" style="left: 1%;">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Registro de Humor</h1>
        </div>
        <form action="?" method="POST">
            <div class="card position-relative" style="height: 95px;">
                <div class="card-body">
                    <nav class="navbar navbar-expand navbar-light bg-light mb-4">
                        <label style="margin-left: 5px; font-weight: bold;">Data:</label>
                        <input class="form-control form-control-user" type="date" name="data" style="margin-left: 25px;" required>
                    </nav>
                </div>
            </div>
            <div class="card mb-4" style="margin-top: 10px;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Como você está se sentindo hoje?</h6>
                </div>
                <div class="form-group fill">
                    <div class="card-body" style="display: inline; text-align: left;">
                        <div class="form-check">
                            <?php while($resultado4 = $consulta4->fetch_assoc()) { ?>    
                                <input type="checkbox" class="form-check-input" id = "<?php echo $contagem; ?>" value="<?php echo $resultado4['HUM_CODIGO']; ?>" name="humor[]" style="margin-left: 25px;">
                                <label class="form-check-label" for = "<?php echo $contagem; ?>" style="margin-left: 45px;"><?php echo $resultado4['HUM_HUMOR']; ?></label><br>
                                <?php $contagem = $contagem + 1; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
             </div>
            <div class="col-lg-7">
                <div class="card mb-4" style="right: 1%;height: 520px;">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Anotações</h6>
                    </div>
                    <div class="card-body" style="text-align: justify;">
                        <textarea class="form-control form-control-user" placeholder="Este espaço funciona como uma espécie de diário, para expressar o que sente." name="nota" style="width:100%; height: 425px;"></textarea>
                    </div>
                </div>
            </div>

            <div class="container" align="center">
            <div class="col-lg-6">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <a href="principal.php" class="btn btn-facebook btn-user btn-block"> Cancelar </a>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-facebook btn-user btn-block"> Salvar </button>
                    </div>
                </div>
            </div> 
            </div>
        </form>
</div>
<?php include ("template-bottom.php"); ?>