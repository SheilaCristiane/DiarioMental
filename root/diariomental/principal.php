<?php 
	ob_start();
	include("config.php");
	include("verifica.php");

	$codigo = $_SESSION['codigousuario'];

	$rand = mt_rand(1,32);
	$frase = " ";
	if ($rand == 1) {
		$frase = "Comece acreditando que é possível.";
	} else if ($rand == 2) {
		$frase = "Veja sempre o lado bom em todas as coisas.";
	} else if ($rand == 3) {
		$frase = "Você falha, e aí? A vida continua. É só quando você se arrisca a falhar que descobre coisas (Lupita Nyong’o).";
	} else if ($rand == 4) {
		$frase = "No fim tudo dá certo, e se não deu certo é porque ainda não chegou ao fim (Fernando Sabino).";
	} else if ($rand == 5) {
		$frase = "Eu não tenho que provar nada a ninguém. Eu preciso somente seguir meu coração e me concentrar no que eu quero dizer ao mundo. Eu comando meu mundo (Beyoncé).";
	} else if ($rand == 6) {
		$frase = "Ao fim do dia, podemos aguentar muito mais do que pensamos que podemos (Frida Kahlo).";
	} else if ($rand == 7) {
		$frase = "Felicidade não depende do que nós temos, mas asim como lidamos com o que temos. Você pode ser feliz com pouco ou infeliz com muito.";
	} else if ($rand == 8) {
		$frase = "90% do sucesso se baseia simplesmente em insistir.";
	} else if ($rand == 9) {
		$frase = "Tudo bem errar às vezes. Tudo bem ter dias ruins. Tudo bem não ser perfeito. Tudo bem fazer o que é melhor para você. TUDO BEM SER VOCÊ MESMO.";
	} else if ($rand == 10) {
		$frase = "Não deixe que nada te desanime, pois até mesmo um pé na bunda te empurra para a frente.";
	} else if ($rand == 11) {
		$frase = "O segredo é um só: ACREDITAR que tudo vai dar certo. Porque vai.";
	} else if ($rand == 12) {
		$frase = "Não pare até se orgulhar de você.";
	} else if ($rand == 13) {
		$frase = "Só você pode determinar suas limitações, por isso não desista mesmo que tudo pareça perdido.";
	} else if ($rand == 14) {
		$frase = "Já experimentou acreditar em você? Tente! Você não faz ideia do que é capaz.";
	} else if ($rand == 15) {
		$frase = "Lute. Acredite. Conquiste. Perca. Deseje. Espere. Alcance. Invada. Caia. Seja tudo o quiser ser, mas acima de tudo, seja você sempre.";
	} else if ($rand == 16) {
		$frase = "Lute com determinação, abrace a vida com paixão, perca com classe e vença com ousadia, porque o mundo pertence a quem se atreve e a vida é muito para ser insignificante. (Augusto Branco).";
	} else if ($rand == 17) {
		$frase = "Nao deixe seus medos decidirem por você.";
	} else if ($rand == 18) {
		$frase = "Quando pensar em desistir, lembre-se porque começou.";
	} else if ($rand == 19) {
		$frase = "Sempre faça o seu melhor. Tudo que você plantar agora, você colherá.";
	} else if ($rand == 20) {
		$frase = "Não fique olhando o relógio, faça como ele: MEXA-SE.";
	} else if ($rand == 21) {
		$frase = "Tudo bem não se sentir bem todos os dias.";
	} else if ($rand == 22) {
		$frase =  "Você está evoluindo, acredite em si mesma. Apesar dos dias parecerem tempestades sem fim, você é forte. Você conseguirá!";
	} else if ($rand == 23) {
		$frase = "Fique calmo(a). A sua sorte ainda vai te encontrar, e definitivamente você não está sozinho!";
	} else if ($rand == 24) {
		$frase = "Lembra que você viveu 100% dos dias que achou que não ia aguentar mais? Você é forte e capaz de superar tudo, independente do quê esteja enfrentando.";
	} else if ($rand == 25) {
		$frase = "Se a vida é uma história, mesmo que você tropece em uma vírgula ou caía em algum ponto final, não desista dos próximos capítulos.";
	} else if ($rand == 26) {
		$frase = "Você não tem nem ideia do quão capaz e suficiente és.";
	} else if ($rand == 27) {
		$frase = "Vai! E se der medo, vai com medo mesmo.";
	} else if ($rand == 28) {
		$frase = "RESISTA! Seus objetivos precisam de você.";
	} else if ($rand == 29) {
		$frase = "Muita coisa pode dar errado antes de dar certo. A felicidade acontece para quem persiste. Então, continue firme!";
	} else if ($rand == 30) {
		$frase = "Se você cansar, aprenda a descansar, não a desistir.";
	} else if ($rand == 31) {
		$frase = "Não seja arrastado pelos seus problemas. Seja guiado por seus sonhos.";
	} else if ($rand == 32) {
		$frase = "Você é suficiente, é capaz, é forte, é único, é insubstituível. Continue firme, continue lutando. Vai dá certo, tudo vai melhorar e vai ser bem mais do quê você sonhou. Acredite!";
	}

	$rand2 = mt_rand(1, 42);
	$atividade = " ";

	if ($rand2 == 1){
		$atividade = "Procure conhecer novas artes.";
	} else if ($rand2 == 2){
		$atividade = "Expresse seus sentimentos em uma pintura.";
	} else if ($rand2 == 3){
		$atividade = "Envolva-se em ações sociais produtivas.";
	} else if ($rand2 == 4){
		$atividade = "Procure conhecer pessoas ou lugares.";
	} else if ($rand2 == 5){
		$atividade = "Busque por músicas novas.";
	} else if ($rand2 == 6){
		$atividade = "Estude sobre algo que te agrade. Alguma língua, música, desenho, dança, jogo...";
	} else if ($rand2 == 7){
		$atividade = "Exercícios físicos são uma boa maneira de aliviar o estresse e progredir o corpo.";
	} else if ($rand2 == 8){
		$atividade = "Leia um livro de seu agrado.";
	} else if ($rand2 == 9){
		$atividade = "Faça um poema com algo que te identifique.";
	} else if ($rand2 == 10){
		$atividade = "Crie um novo hobbie.";
	} else if ($rand2 == 11){
		$atividade = "Desafie seus amigos em um jogo de tabuleiro.";
	} else if ($rand2 == 12){
		$atividade = "Relembre momentos junto com alguém.";
	} else if ($rand2 == 13){
		$atividade = "Assista a um stand-up comedy.";
	} else if ($rand2 == 14){
		$atividade = "Reveja seus filmes preferidos.";
	} else if ($rand2 == 15){
		$atividade = "Faça uma receita culinária.";
	} else if ($rand2 == 16){
		$atividade = "Tente dançar com uma música agradável.";
	} else if ($rand2 == 17){
		$atividade = "Busque novas séries ou programas para assistir.";
	} else if ($rand2 == 18){
		$atividade = "Faça um desenho de algo que você goste.";
	} else if ($rand2 == 19){
		$atividade = "Dedique uma música a si mesmo.";
	} else if ($rand2 == 20){
		$atividade = "Procure novas formas de se vestir.";
	} else if ($rand2 == 21){
		$atividade = "Adote um estilo único de ser.";
	} else if ($rand2 == 22){
		$atividade = "Refaça amizades perdidas.";
	} else if ($rand2 == 23){
		$atividade = "Reencontre um parente que não vê há tempos.";
	} else if ($rand2 == 24){
		$atividade = "Costure roupas velhas e transforme-as em novas.";
	} else if ($rand2 == 25){
		$atividade = "Comece uma coleção de algo do seu interesse.";
	} else if ($rand2 == 26){
		$atividade = "Aprenda a tocar um instrumento musical.";
	} else if ($rand2 == 27){
		$atividade = "Pratique um esporte que você gosta.";
	} else if ($rand2 == 28){
		$atividade = "Conheça novos esportes e competições interessantes.";
	} else if ($rand2 == 29){
		$atividade = "Aprenda a andar de skate, patins ou patinete.";
	} else if ($rand2 == 30){
		$atividade = "Crie um blog ou canal de vídeos.";
	} else if ($rand2 == 31){
		$atividade = "Tire fotografias que transmitam sentimentos.";
	} else if ($rand2 == 32){
		$atividade = "Adote ou fique mais tempo com um animalzinho de estimação.";
	} else if ($rand2 == 33){
		$atividade = "Crie uma rotina para algo produtível.";
	} else if ($rand2 == 34){
		$atividade = "Aprenda uma arte marcial.";
	} else if ($rand2 == 35){
		$atividade = "Pratique meditação ou yoga.";
	} else if ($rand2 == 36){
		$atividade = "Busque ter um contato mais com a natureza.";
	} else if ($rand2 == 37){
		$atividade = "Aprecie o lado bom da vida, reflita sobre o que você é grato.";
	} else if ($rand2 == 38){
		$atividade = "Plante novas plantas.";
	} else if ($rand2 == 39){
		$atividade = "Faça trilhas de bicicleta.";
	} else if ($rand2 == 40){
		$atividade = "Decore sua casa ou quarto.";
	} else if ($rand2 == 41){
		$atividade = "Leia poemas, descubra poetas.";
	} else if ($rand2 == 42){
		$atividade = "Realize um acampamento com amigos.";
	}

	$consulta2 = $MySQLi->query("SELECT * FROM TB_REGISTROS JOIN TB_REGHUMORES ON HDR_REG_CODIGO = REG_CODIGO JOIN TB_HUMORES ON HDR_HUM_CODIGO = HUM_CODIGO WHERE REG_USU_CODIGO  = $codigo GROUP BY REG_DATA LIMIT 10");


	include ("template-top.php"); 
?>
    <div class="row">
		<div class="col-lg-6">
        <!-- Default Card Example -->
		<div class="card shadow mb-4" style="left: 1%;height: 170px;">
		        <div class="card-header py-3">
		        <h6 class="m-0 font-weight-bold text-primary">Frase motivacional</h6>		        
		    </div>
	        <div class="card-body" style="text-align: justify;text-align: center;">
	        	<?php echo $frase; ?>
		    </div>
		</div>
	</div>
	<div class="col-lg-6">
		    <div class="card shadow mb-4" style="right: 1%;height: 170px;">
		        <div class="card-header py-3">
		            <h6 class="m-0 font-weight-bold text-primary">Sugestão para apreciar o dia</h6>
		        </div>
		        <div class="card-body" style="text-align: justify;text-align: center;">
		            <?php echo $atividade; ?>  
		        </div>
		    </div>
		</div>

    <div class="col-lg-12" style="">
		<table class="table shadow table-bordered table-hover col-11 mx-auto">
	<thead class="font-weight-bold text-primary">
		<tr>
			<th scope="col" style="text-align: center;">Data</th>
			<th scope="col" style="text-align: center;">Humor</th>
			<th scope="col" style="text-align: center;">Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php while($resultado2 = $consulta2->fetch_assoc()) { 
			$dtreg = implode("/",array_reverse(explode("-",$resultado2['REG_DATA'])));
		?>
			<tr>
				<td style="text-align: center;"> <?php echo $dtreg; ?> </td>
				<td style="text-align: center;"> <?php echo $resultado2['HUM_HUMOR']; ?> (...) </td>
				<td style="text-align: center;">
					<a href="registro-perfil.php?codigo=<?php echo $resultado2['REG_CODIGO']; ?>">
						Ver detalhes
					</a>
				</td>
			</tr>
		<?php } ?>
		<tr>
			<td colspan="3">
				<center><a href="registro-novo.php" class="font-weight-bold text-primary">Adicionar registro</a></center>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<form class="user" method="POST"  action="index1.php">
					<div class="form-group row">
						<div class="col-sm-4">
							<center>
							<label class="font-weight-bold text-primary" style="margin-top: 15px;">Pesquisar registro por data:</label>
							</center>
						</div>
						<div class="col-sm-4">
							<input name="pesquisar" type="date" class="form-control form-control-user" aria-label="Search">
						</div>
						<div class="col-sm-4">
							<input type="submit" class="btn btn-facebook btn-user btn-block">
						</div>
					</div>
				</form>

			</td>
		</tr>
	</tbody>
</table>
    </div>

</div>
<?php include ("template-bottom.php"); ?>