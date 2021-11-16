<?php
header('Content-Type: application/json; charset=utf-8');
//arrays globais criadas artificalmente para deixar o uso dos métodos $_DELETE e $_PUT similares ao $_POST e $_GET
global $_DELETE;
global $_PUT;

$_DELETE = array();
$_PUT = array();

require_once("Models/Developer.php");
require_once("Class/Geral.php");
$Geral = new Geral();

$Developer = new Developer();
//alimentando as globais $_DELETE e $_PUT
if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'DELETE')) {
		parse_str(file_get_contents('php://input'), $_DELETE);
	}
	if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT')) {
		parse_str(file_get_contents('php://input'), $_PUT);
}

//se houver url na GET url montada pelo htaccess

if(!empty($_GET['url'])) {
	
	//pega a url já tratada e convertida para array
	$url = $Geral->getURL($_GET['url']);
	//primeira parte da url
	if($url[0] == "developers") {
		
		//se vier algo no array POST entra no modo inserção
		if(count($_POST)>0) {
			//retorna o método newDev para tentar inserir um novo dev, passando o POST como parâmetro
			echo json_encode($Developer->newDev($_POST));
		
		//se vier algo no array PUT entra no modo edição
		} elseif(count($_PUT)>0) {
			
			//retorna o método upDev para tentar editar um dev, passando o PUT como parâmetro
			echo json_encode($Developer->upDev($_PUT));
			
		//se vier algo no array _DELETE entra no modo de remoção
		} elseif(count($_DELETE)>0) {
			//retorna o método removeDev para tentar remover um dev, passando o _DELETE como parâmetro, no DELETE já vem o id que irá ser usado para tentar remover o desenvolvedor
			echo json_encode($Developer->removeDev($_DELETE));
		
		} else {
			
			//se na url vier o id do desesenvolvedor então retorna o método getDev, que retorna os dados de um único desenvolvedor pelo id
			if(!empty($url[1])) {
			
				echo json_encode($Developer->getDev($url[1]));
				
			} else {
			
				//se todos os parâmetros da querystring estiverem vazios, então vai retornar todos os desenvolvedores com o método getDevAll
				if(empty($_GET['nome']) and empty($_GET['sexo']) and empty($_GET['idade']) and empty($_GET['hobby']) and empty($_GET['datanascimento'])) {
					
					echo json_encode($Developer->getDevAll());
					
				} else { //caso venha algo na querystring então chama o método getDevQueryString passando o GET como parâmetro para filtrar e paginar os desenvolvedores
					
					//array_shift($_GET);, usado para remover o get url(primeiro item do array) criado pelo htaccess, e deixando apenas os gets para formar a querystring
					array_shift($_GET);
					
					echo json_encode($Developer->getDevQueryString($_GET));
				}
				
			}
			
		}
		
	}
	
}

?>