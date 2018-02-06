<?php
include_once('models/Conectar.php');

	class Cidade extends Conectar{
		private $id;
		private $nome;
		private $id_estado;

		public function getId(){
			return $this->$id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getNome(){
			return $this->$nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getId_estado(){
			return $this-> $id_estado;
		}

		public function setId_estado($id_estado){
			$this->id_estado = $id_estado;
		}
		//pesquisa no banco de dados
		public function search(){
			$conn = $this->get_conexao();
			return $conn->query("SELECT * FROM cidade ORDER BY id_estado")->fetchAll();

		}

		public function inserir(){
			$conexao  = $this->get_conexao();
			$cadastro = $conexao->prepare("INSERT INTO cidade (nome, id_estado) VALUES (:nome, :id_estado)");
			$cadastro->bindParam(":nome", $this->nome);
			$cadastro->bindParam(":id_estado", $this->id_estado);
			return $cadastro->execute();

		}
		public function consultaCity(){
			$con  = $this->get_conexao();
			return $con->query("SELECT c.nome AS nome_cidade, e.sigla AS sigla_estado,
					c.id AS id_cidade, e.nome AS nome_estado
					FROM cidade c
					INNER JOIN estado e ON c.id_estado = e.id ORDER BY c.nome")->fetchall();

		}
		public function getCidade(){
			$conec  = $this->get_conexao();		
			$sql = ("SELECT * FROM cidade WHERE id = :id");	
			$stmt = $conec->prepare($sql);
			$stmt->bindParam(":id" , $this->id);
			$stmt->execute();
			return $stmt->fetch();
		}

		public function atualizar(){
		    $conex  = $this->get_conexao();
			$atualizar = $conex->prepare("UPDATE cidade SET id = :id, nome = :nome, id_estado = :id_estado WHERE id = :id");
			$atualizar->bindParam(":id",$this->id);
			$atualizar->bindParam(":nome",$this->nome);
			$atualizar->bindParam(":id_estado", $this->id_estado);
			return $atualizar->execute();
	    } 

 		public function excluir(){
			$conect  = $this->get_conexao();
			$sql_deletar = $conect->prepare("DELETE FROM cidade WHERE id = :id");
	        $sql_deletar->bindParam(":id" , $this->id);
	        return $sql_deletar->execute();

		}

		public function searchCidade(){
			$conec  = $this->get_conexao();		
			$sql = ("SELECT nome FROM cidade where id_estado = :id ");	
			$stmt = $conec->prepare($sql);
			$stmt->bindParam(":id" , $this->id_estado);
			return $stmt->execute();
			//return $stmt->fetch();
		}

		

	}

?>