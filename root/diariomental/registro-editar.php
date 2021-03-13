<?php
ob_start();
include("config.php"); 
include("verifica.php");

$codigo = $_GET['codigo'];
$contagem = 0;


if(isset($_POST['codigoregistro'])) {
    $codigoregistro = $_POST['codigoregistro'];
        $data = $_POST['data'];
        $nota = $_POST['nota'];
        $consulta = $MySQLi->query("UPDATE TB_REGISTROS SET REG_DATA = '$data', REG_NOTA = '$nota' where REG_CODIGO = $codigoregistro");
        $consulta2 = $MySQLi->query("DELETE FROM TB_REGHUMORES WHERE HDR_REG_CODIGO = $codigoregistro");
        
        if(!empty($_POST['humor'])){
            foreach ($_POST['humor'] as $humor) {
                $consulta5 = $MySQLi->query("INSERT INTO TB_REGHUMORES (HDR_REG_CODIGO, HDR_HUM_CODIGO) VALUES ($codigoregistro, $humor)");
            }
        } else {
            echo "Por favor, selecione um humor.";
        }

        header("Location: principal.php");
    }


    $consulta3 = $MySQLi->query("SELECT * FROM TB_REGISTROS WHERE REG_CODIGO = $codigo");
    $resultado3 = $consulta3->fetch_assoc();

    $consulta4 = $MySQLi->query("SELECT * FROM TB_HUMORES");
    include("template-top.php");
?>
<div class="row">
    <div class="col-lg-5" style="left: 1%;">
        <form action="?" method="POST">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Editar histórico de humor</h1>
        </div>
        <div class="form-group d-none">
            <label>Código</label>
            <input name="codigoregistro" value="<?php echo $resultado3['REG_CODIGO']; ?>" readonly class="form-control">
        </div>
        <div class="card position-relative" style="height: 95px;">
            <div class="card-body">
                <nav class="navbar navbar-expand navbar-light bg-light mb-4">
                    <label style="margin-left: 5px; font-weight: bold;">Data:</label>
                    <input class="form-control form-control-user" type="date" name="data" value="<?php echo $resultado3['REG_DATA']; ?>" style="margin-left: 25px;">
                </nav>
            </div>
        </div>
        <div class="card mb-4" style="margin-top: 10px;">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Como você está se sentindo hoje?</h6>
            </div>
             <div class="form-group fill">
                    <div class="card-body" style="display: inline; text-align: left;">
                        <center><p><small>É necessário marcar suas opções novamente *</small></p></center>
                        <div class="form-check">
                            <?php while($resultado4 = $consulta4->fetch_assoc()) { ?>    
                                <input type="checkbox" class="form-check-input" id = "<?php echo $contagem; ?>" value="<?php echo $resultado4['HUM_CODIGO']; ?>" name="humor[]" style="margin-left: 25px";>
                                <label class="form-check-label" for = "<?php echo $contagem; ?>" style="margin-left: 45px;"><?php echo $resultado4['HUM_HUMOR']; ?></label><br>
                                <?php $contagem = $contagem + 1; ?>
                            <?php } ?>
                        </div>

                    </div>
                </div>
        </div>
    </div>
    <input name="codigoreg" value="<?php echo $resultado3['REG_CODIGO']; ?>" type="hidden">
    <div class="col-lg-7">
        <div class="card mb-4" style="right: 1%;height: 555px;">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Anotações</h6>
            </div>
            <div class="card-body" style="text-align: justify;">
                <textarea class="form-control form-control-user" name="nota" style="width:100%; height: 460px;"><?php echo $resultado3['REG_NOTA'];?></textarea>
            </div>
        </div>        
    </div>

    <div class="container" align="center">
        <div class="col-lg-6">
            <div class="form-group row">
                <div class="col-sm-6">
                    <a href="registro-perfil.php?codigo=<?php echo $resultado3['REG_CODIGO']; ?>" class="btn btn-facebook btn-user btn-block"> Cancelar </a>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-facebook btn-user btn-block"> Salvar </button>
                </div>
            </div>
        </div> 
    </div>
    </form>

</div>
</body>

<?php include ("template-bottom.php"); ?>