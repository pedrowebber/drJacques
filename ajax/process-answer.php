<?
require('../includes/connection.php');
$debug = false;
$existe = false;

$returnJson->success = false;
$idPergunta = $_POST["idPergunta"];
$idAlternativaSelecionada = $_POST["idAlternativa"];

//Obtem id da próxima pergunta
//$sql = 	" SELECT idProximaPergunta ".
//		" FROM alternativas ".
//		" WHERE idAlternativa = ". $idAlternativaSelecionada;

//Obtem os dados da próxima pergunta
$sql = 	" SELECT idPergunta, descricao ".
		" FROM perguntas ".
		" WHERE ".
		"	idPergunta = (SELECT idProximaPergunta FROM alternativas WHERE idAlternativa = ". $idAlternativaSelecionada. ") " ;
$result = $conn->query($sql);
$descricaoPergunta="";
$idProximaPergunta = 0;
while ($dados = $result->fetch_array()) {
	$descricaoPergunta = $dados["descricao"];
	$idProximaPergunta = $dados["idPergunta"];
}

if($idProximaPergunta != 0){
	//Obtem as alternativas da próxima pergunta
	$sql = 	" SELECT idAlternativa, descricao ".
			" FROM alternativas ".
			" WHERE idPergunta = ". $idProximaPergunta;
	$result = $conn->query($sql);
	$alternativas = array();

	while($row = $result->fetch_array()){
		$alternativas[] = $row;
	}

	//Monta objeto com os dados da pergunta
	$returnJson->possuiProxima = true;
	$returnJson->objPergunta->descricao = $descricaoPergunta;//"Esta é a pergunta seguinte, está funcionando? Pergunta anterior-".$objResposta["idPergunta"]." Alternativa-".$objResposta["idResposta"]." --- ou ".$_POST["idPergunta"];
	$returnJson->objPergunta->idPergunta = $idProximaPergunta;
	$alternativa1->idAlternativa = 1;
	$alternativa1->descricao = "SIIM";
	$alternativa2->idAlternativa = 2;
	$alternativa2->descricao = "NÃÃO";
	$alternativa3->idAlternativa = 3;
	$alternativa3->descricao = "Entrei em contato 2 vezes";
	//Monta o objeto de retorno com os dados das alternativas
	$returnJson->objPergunta->alternativas = $alternativas;//[$alternativa1,$alternativa2,$alternativa3];
}else{
	$returnJson->possuiProxima = false;
}
//$query = mysql_query($sql);
//$cadastros = array();

//while($row = @mysql_fetch_assoc($query)){
//	$cadastros[] = $row;
//}

$returnJson->success = true;
echo json_encode($returnJson);

?>