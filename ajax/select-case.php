<?
require('../includes/connection.php');
$debug = false;
$existe = false;

$returnJson->success = false;
$idPerguntaInicial = $_POST["idPerguntaInicial"];
$idTipoCaso = $_POST["idPerguntaInicial"];

//Obtem os dados da pergunta
$sql = 	" SELECT idPergunta, descricao ".
		" FROM perguntas ".
		" WHERE ".
		"	idTipoCaso = idTipoCaso AND primeira = 1 " ;
$result = $conn->query($sql);
$descricaoPergunta="";
$idPergunta = 0;
while ($dados = $result->fetch_array()) {
	$descricaoPergunta = $dados["descricao"];
	$idPergunta = $dados["idPergunta"];
}

if($idPergunta != 0){
	//Obtem as alternativas da pergunta
	$sql = 	" SELECT idAlternativa, descricao ".
			" FROM alternativas ".
			" WHERE idPergunta = ". $idPergunta;
	$result = $conn->query($sql);
	$alternativas = array();

	while($row = $result->fetch_array()){
		$alternativas[] = $row;
	}

	//Monta objeto com os dados da pergunta
	$returnJson->possuiPergunta = true;
	$returnJson->objPergunta->descricao = $descricaoPergunta;
	$returnJson->objPergunta->idPergunta = $idPergunta;
	//Monta o objeto de retorno com os dados das alternativas
	$returnJson->objPergunta->alternativas = $alternativas;
}else{
	$returnJson->possuiPergunta = false;
}
//$query = mysql_query($sql);
//$cadastros = array();

//while($row = @mysql_fetch_assoc($query)){
//	$cadastros[] = $row;
//}

$returnJson->success = true;
echo json_encode($returnJson);

?>