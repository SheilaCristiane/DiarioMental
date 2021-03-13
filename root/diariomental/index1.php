<?php

include("template-top.php");
$pesquisar = $_POST['pesquisar'];
$dt = implode("-",array_reverse(explode("/",$pesquisar)));
$consulta3 = $MySQLi->query("SELECT * FROM TB_REGISTROS JOIN TB_REGHUMORES ON HDR_REG_CODIGO = REG_CODIGO JOIN TB_HUMORES ON HDR_HUM_CODIGO = HUM_CODIGO WHERE REG_USU_CODIGO  = $codigo AND REG_DATA LIKE '%".$dt."%' GROUP BY REG_DATA");
?>
<h1 class="h3 mb-0 text-gray-800" style="margin-left:15px;"> Resultado da Pesquisa: </h1>
<table class="table shadow table-bordered table-hover col-11 mx-auto">
	<thead class="font-weight-bold text-primary">
		<tr>
			<th style="text-align: center;" scope="col">Data</th>
			<th style="text-align: center;" scope="col">Humor</th>
			<th style="text-align: center;" scope="col">Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php $numero = mysqli_num_rows($consulta3);
		if ($numero <= 0){
			echo "<p class='display-5 text-danger' style='margin-left:50px;'> Nenhum resultado foi encontrado. </p>";
		} else {
			while($resultado3 = $consulta3->fetch_assoc()) { 
				$dtreg = implode("/",array_reverse(explode("-",$resultado3['REG_DATA'])));
				?>

				<tr>
					<td style="text-align: center;"> <?php echo $dtreg; ?> </td>
					<td style="text-align: center;"> <?php echo $resultado3['HUM_HUMOR']; ?> (...) </td>
					<td style="text-align: center;">
						<a href="registro-perfil.php?codigo=<?php echo $resultado3['REG_CODIGO']; ?>">
							Ver detalhes
						</a>
					</td>
				</tr>
			<?php }} ?>
		</tbody>
	</table>

	<?php include("template-bottom.php"); ?>