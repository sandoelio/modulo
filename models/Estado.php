<?php
include_once('models/Conectar.php');

	class Estado extends Conectar{

		private $id;
		private $sigla;
		private $nome;

		public function setId($id){
			$this->id = $id;
		}
		public function getSigla(){
			return $this->sigla;
		}

		public function setSigla($sigla){
			$this->sigla = $sigla;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function search(){
			$conn = $this->get_conexao();
			return $conn->query("SELECT * FROM estado ORDER BY id")->fetchAll();

		}

		public function inserir(){
			$conexao  = $this->get_conexao();
			$cadastro = $conexao->prepare("INSERT INTO estado (nome, sigla) VALUES (:nome, :sigla)");
			$cadastro->bindParam(":nome", $this->nome);
			$cadastro->bindParam(":sigla", $this->sigla);
			return $cadastro->execute();

		}

		public function excluir(){
			$conect  = $this->get_conexao();
			$sql_deletar = $conect->prepare("DELETE FROM estado WHERE id = :id");
	        $sql_deletar->bindParam(":id" , $this->id);
	        return $sql_deletar->execute();

		}

		public function getEstado($id){
			$conec  = $this->get_conexao();		
			$sql = ("SELECT * FROM estado WHERE id = :id");	
			$stmt = $conec->prepare($sql);
			$stmt->bindParam(":id" , $this->id);
			$stmt->execute();
			return $stmt->fetch();
		}

		public function atualizar(){
		    $conex  = $this->get_conexao();
			$atualizar = $conex->prepare("UPDATE estado SET id = :id, nome = :nome, sigla = :sigla WHERE id = :id");
			$atualizar->bindParam(":id",$this->id);
			$atualizar->bindParam(":nome",$this->nome);
			$atualizar->bindParam(":sigla", $this->sigla);
			return $atualizar->execute();
	  } 

	} 

?>