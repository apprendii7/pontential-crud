<?php
class Developer {
	//constantes para configurar o banco, o ideal seria em um arquivo separado, além de uma classe de conexão, e um orm crudclass, mas como atrasei muito por causa de demandas anteriores, vou fazer mais direto
	const DRIVE = 'mysql';
	const HOST = 'localhost';
	const DBNAME = 'pontential_crud';
	const USER = 'root';
	const PASS = '';
	private $con = null;

	function __construct() {
		
		$this->con = new PDO($this::DRIVE.': host='.$this::HOST.'; dbname='.$this::DBNAME, $this::USER, $this::PASS);
	
	}
	//monta a query a partir de um array com chave e valor
	function mountDevQueryString($dados) {
		
		$sql = '';
		$logicalOP = '=';
		foreach($dados as $key => $value) {
		
			if($key=='nome') { $op = 'LIKE'; } else { $op = '='; }
		
			if(!empty($value) and $value != "undefined") {
				$sql .= " and $key $op :$key ";
			}
		}
		
		$sql = "SELECT * FROM desenvolvedores WHERE 7>6 $sql";
		
		return $sql;
	
	}
	
	
	//pega todos os desenvolvedores do banco e retorna
	function getDevAll() {
		
		$sql = 'SELECT * FROM desenvolvedores order by id asc';
		$stmt = $this->con->prepare($sql);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			
			http_response_code(200);
			
			$arr = array();
			$arr['dados'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $arr;
		
		} else {
		
			return "Nenhum dev. encontrado!";

		}
	}

	//pega os desenvolvedores do banco de acordo com a querystring e paginação e retorna paginado
	//não suporta OR ainda, mas seria simples implementar, só ver o padrão requerido pelo socilitante na queryString, ex: ?nome=Alexandre&andor=OR&sexo=M
	function getDevQueryString($dados) {
		
		$inicio = array_shift($dados); //pega o início da paginação e também remove o respectivo item do array $dados
		$fim = array_shift($dados); //pega o fim da paginação (ou total) e também remove o respectivo item do array $dados para deixar somente os dados do banco para serem retornados
		
		
		//montando o sql
		$sql = $this->mountDevQueryString($dados);
		
		//pegando paginado
		$stmt = $this->con->prepare($sql." ORDER BY id asc limit $inicio".','."$fim");
		
		//pegando tudo para pegar o total de itens e retornar para ser usado na paginação da UI
		$stmt2 = $this->con->prepare($sql." ORDER BY id asc");
		
		//montando os bind
		foreach($dados as $key => $value) {
			
			$p = '';
			if($key=="nome") { $p = "%"; }
			if(!empty($value) and $value != "undefined") {
				$stmt->bindValue(":$key", $p.$value.$p);
				$stmt2->bindValue(":$key", $p.$value.$p);
			}
		
		}
		
		$stmt->execute();
		$stmt2->execute();
		
		if ($stmt->rowCount() > 0) {
			
			http_response_code(200);
			
		
			$arr = array();
			$arr['dados'] = $stmt->fetchAll(PDO::FETCH_ASSOC); //adicionando os dados da query no array de retorno
			$arr['total'] = $stmt2->rowCount(); //adicionando o total de desenvolvedores no array de retorno
			
			return $arr;
			
		} else {
			
			http_response_code(404);
			
			return "Nenhum dev. encontrado";
		}
	}

	//Retorna os dados de um desenvolvedor pelo id
	function getDev(int $id) {
		
		$sql = 'SELECT * FROM desenvolvedores WHERE id = :id';
		$stmt = $this->con->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			
			http_response_code(200);
			
			return $stmt->fetch(PDO::FETCH_ASSOC);
			
		} else {
			
			http_response_code(404);
			
			return "Nenhum dev. encontrado";
		}
	}
	
	
	//Adiciona um novo desenvolvedor
	function newDev($dados) {
		
		$sql = 'INSERT INTO desenvolvedores set 
		nome  			= :nome,
		sexo  			= :sexo,
		idade 			= :idade,
		hobby 			= :hobby,
		datanascimento 	= :datanascimento';
		
		$stmt = $this->con->prepare($sql);
		$stmt->bindValue(':nome', $dados['nome']);
		$stmt->bindValue(':sexo', $dados['sexo']);
		$stmt->bindValue(':idade', $dados['idade']);
		$stmt->bindValue(':hobby', $dados['hobby']);
		$stmt->bindValue(':datanascimento', $dados['datanascimento']);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
		
			http_response_code(201);
			
			return 'Dev. inserido com sucesso';
		
		} else {
			
			http_response_code(400);
			
			return "Falha ao inserir o Dev";
		
		}
		
		
	}
	
	
	//Atualiza os dados de um desenvolvedor
	function upDev($dados) {
		
		$sql = 'update desenvolvedores set 
		nome  			= :nome,
		sexo  			= :sexo,
		idade 			= :idade,
		hobby 			= :hobby,
		datanascimento 	= :datanascimento
		WHERE id = :id';
		
		$stmt = $this->con->prepare($sql);
		$stmt->bindValue(':nome', $dados['nome']);
		$stmt->bindValue(':sexo', $dados['sexo']);
		$stmt->bindValue(':idade', $dados['idade']);
		$stmt->bindValue(':hobby', $dados['hobby']);
		$stmt->bindValue(':datanascimento', $dados['datanascimento']);
		$stmt->bindValue(':id', $dados['id']);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			
			http_response_code(200);
			
			return 'Dev. atualizado com sucesso';
		
		} else {
		
			http_response_code(400);
			
			return "Não houve alterações no Dev";

		}
		
		
	}
	
	//Apaga o registro de um desenvolvedor
	function removeDev($dados) {
		$sql = 'DELETE FROM desenvolvedores WHERE id = :id';
		$stmt = $this->con->prepare($sql);
		$stmt->bindValue(':id', $dados['id']);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			
			http_response_code(204);
			
			return 'Dev. removido com sucesso';
			
			
		} else {
			
			http_response_code(400);
			
			echo "Nenhum dev. removido";
		
		}
		
	}

}
?>