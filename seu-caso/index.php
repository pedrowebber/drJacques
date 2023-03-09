<?
  $currentPage = "seu-caso";
  $navHeader = "navbar-static-top";
  
  include("../includes/connection.php");

  include("../includes/header.php");
  include("../includes/top-default.php");
?>

<?php 
	// Executa uma consulta que pega cinco notA­cias
	
	/**
	$sql = 	" SELECT ".
			" 	tc.idTipoCaso, tc.descricao, pe.idPergunta ".
			" FROM tiposcaso tc ".
			" LEFT JOIN perguntas pe ".
			"	ON pe.idTipoCaso = tc.idTipoCaso and pe.primeira = 1 ";
	$result = $conn->query($sql);
	while ($dados = $result->fetch_array()) {
		$descricaoPergunta = $dados["descricao"];
		$idPergunta = $dados["idPergunta"];
	}

	//echo "PERGUNTA-> ".$descricaoPergunta."<br>";

	$sql = 	" SELECT descricao ".
			" FROM alternativas ".
			" WHERE idPergunta = ". $idPergunta;
	$query = $conn->query($sql);
	while ($dados = $query->fetch_array()) {
		//echo "ALETERNATIVA - ".$dados["descricao"]."<br>";
	}

	//echo 'Registros encontrados: ' . $query->num_rows;

	**/
?>
<!---->
	<section class="section-padding wow fadeInUp delay-05s" >
		<div class="container build-case" id="selecionaCaso">
			<div class="row white">
				<div class="col-sm-12 question">
					<h1 class="text-center">Em que podemos ajudar?</h1>
				</div>
			</div>
			<div class="row">
				<?
				$sql = 	" SELECT ".
						" 	tc.idTipoCaso, tc.descricao, tc.icone, pe.idPergunta ".
						" FROM tiposcaso tc ".
						" LEFT JOIN perguntas pe ".
						"	ON pe.idTipoCaso = tc.idTipoCaso and pe.primeira = 1 ";
				$result = $conn->query($sql);
				//Controle para ajustar layout -- O gridsystem do bootstrap é com 12 colunas, logo a quantidade total de colunas é divido pelo número de casos.
				$numeroCasos = $result->num_rows;
				$numCol = intval(12/$numeroCasos);
				//Nao deixa ser inferior a 3, pois senão o layout fica muito compactado
				$numCol = ($numCol < 3? 3:$numCol);

				while ($dados = $result->fetch_array()) {
					echo '<div class="col-sm-'.$numCol.' text-center alternatives" rel="list-cases" data-id-tipo-caso="'.$dados["idTipoCaso"].'" data-id-pergunta="'.$dados["idPergunta"].'">'.
							'<div style="cursor: pointer;">'.
								'<i class="'.$dados["icone"].'" style="color: #FFD34E;font-size: 70px;""></i>'.
								'<p style="padding: 10px 0; text-decoration: underline;">'.$dados["descricao"].'</p>'.
							'</div>'.
						 '</div>';
				}
				?>
				
			</div>
		</div>
		<div class="container build-case" id="questionario" style="display: none">
			<div class="row white">
				<div class="col-sm-12 question">
					<h1 class="text-center" id="title-question"></h1>
					<input type="hidden" name="idPergunta" id="idPergunta" value="0">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center alternatives" id="list-alternatives">
					
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<button class="btn btn-submit" type="button" id="btnContinuar">CONTINUAR</button>
				</div>
			</div>
		</div>
	</section>

<?
  include("../includes/footer.php");
?>

<script type="text/javascript">
	$(document).ready(function(){
		$("*[rel='list-cases']").on("click",function(){
			idPergunta = $(this).data("idPergunta");
			idTipoCaso = $(this).data("idTipoCaso");
//			alert('pergunta -> '+ $(this).data("idPergunta"));
			objPost = {
				idPergunta: idPergunta,
				idTipoCaso: idTipoCaso
			};

			$.ajax({
					type: "POST",
					url: "../ajax/select-case.php",
					async: false,
					data: objPost
				})
				.done(function(data) {
					retorno = JSON.parse(data);
					if(retorno.success){
						if(retorno.possuiPergunta){
							$("#selecionaCaso").hide();
							$("#questionario").show();
							processNewQuestion(retorno.objPergunta);
						}else{
							alert("NÃO POSSUI PERGUNTAS");
						}
					}else{
					}
				});

		});
		
		$("#btnContinuar").on("click",function(){
			idPergunta = $("#idPergunta").val();
			idAlternativa = $("input[name='radioAlternativa']:checked").val();
			
			if(idAlternativa != undefined){
				objResposta = {
					idPergunta: idPergunta,
					idAlternativa: idAlternativa
				};
				//console.log(objResposta);

				$.ajax({
					type: "POST",
					url: "../ajax/process-answer.php",
					async: false,
					data: objResposta
				})
				.done(function(data) {
					retorno = JSON.parse(data);
					if(retorno.success){
						if(retorno.possuiProxima){
							processNewQuestion(retorno.objPergunta);
						}else{
							alert("redirect para processamento final");
						}
					}else{
					}
				});
			}else{
				alert('Resposta a pergunta antes de prosseguir!');
			}
		});

		function processNewQuestion(objPergunta) {
			pergunta = retorno.objPergunta;
			$("#title-question").html(pergunta.descricao);
			$("#idPergunta").val(pergunta.idPergunta);
			htmlAlternativas = '';
			for (var i = 0; i < pergunta.alternativas.length; i++) {
				htmlAlternativas += buildHTMLAlternative(pergunta.alternativas[i].idAlternativa,pergunta.alternativas[i].descricao);
			}
			$("#list-alternatives").html(htmlAlternativas);
		}

		function buildHTMLAlternative(idAlternativa, descricao) {
			html = '<div class="radio-custom">'+
						'<input type="radio" id="'+idAlternativa+'" name="radioAlternativa" value="'+idAlternativa+'">'+
						'<label for="'+idAlternativa+'">'+ descricao +'</label>'+
					'</div>';
			return html;
		}

		window.addEventListener('keydown', function (e) {
		    var code = e.which || e.keyCode;
		    if (code == 116){
				//resp = confirm('Se você atualizar a página irá perder todo o processo. Deseja atualizar?');
				resp = true;
			    if(resp == false){
			    	e.preventDefault();
			    }
		    }
		    else{
		    	return true;
	    	}

		});
	});

	window.onbeforeunload = confirmExit;
	function confirmExit()
	{
		return "Se você fechar o navegador, seus dados serão perdidos. Desena Realmente sair?";
	}
</script>