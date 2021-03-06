<?php 
include_once('models/Conectar.php');


	class Pessoa extends Conectar{

		private $id;
		private $nome;
		private $email;
		private $cpf;
		private $observacao;
		private $cidade;
		

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

		public function getEmail(){
			return $this->$email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getCpf(){
			return $this->cpf;
		}

		public function setCpf($cpf){
			$this->cpf = $cpf;
		}

		public function getObservacao(){
			return $this->$observacao;
		}

		public function setObservacao($observacao){
			$this->observacao = $observacao;
		}

		public function getCidade(){
			return $this->$cidade;
		}

		public function setCidade($cidade){
			$this->cidade = $cidade;
		}	

		//pesquisa no banco de dados
		public function consulta(){
			$conn = $this->get_conexao();			
				return $conn->query("
					SELECT 
							p.id AS id_pessoa, 
							p.nome AS nome_pessoa,
							c.nome AS nome_cidade,
							e.nome AS nome_estado,
							* 
						FROM 
							pessoa p
							LEFT JOIN cidade c ON p.id_cidade = c.id
							LEFT JOIN estado e ON c.id_estado = e.id
						ORDER BY 
							p.nome")->fetchAll();

		}

		public function inserir(){
			$conexao  = $this->get_conexao();
			$cadastro = $conexao->prepare("INSERT INTO pessoa (nome, email, cpf, observacao, id_cidade) VALUES (:nome, :email, :cpf, :observacao, :id_cidade)");
			$cadastro->bindParam(":nome", $this->nome);
			$cadastro->bindParam(":email", $this->email);
			$cadastro->bindParam(":cpf", $this->cpf);
			$cadastro->bindParam(":observacao", $this->observacao);
			$cadastro->bindParam(":id_cidade", $this->cidade);
			return $cadastro->execute();

		}

		public function consultaPessoa(){
           
			$conec  = $this->get_conexao();		
			$sql = ("SELECT
							p.id AS id_pessoa, 
							p.nome AS nome_pessoa, 
							p.email,
							p.cpf,
							p.observacao,
							c.nome AS nome_cidade,
							c.id AS id_cidade,
							e.nome AS nome_estado,
							e.id AS id_estado
						FROM 
							pessoa p
							INNER JOIN cidade c ON p.id_cidade = c.id
							INNER JOIN estado e ON c.id_estado = e.id
						WHERE 
							p.id = :id");	

			$stmt = $conec->prepare($sql);
			$stmt->bindParam(":id" , $this->id);
			$stmt->execute();
			return $stmt->fetch();
		

		}

		public function atualizar(){
		    $conex  = $this->get_conexao();
			$atualizar = $conex->prepare("UPDATE pessoa SET nome = :nome, email = :email, cpf = :cpf, id_cidade = :cidade, observacao = :observacao WHERE id = :id");
			$atualizar->bindParam(":id",$this->id);
			$atualizar->bindParam(":nome",$this->nome);
			$atualizar->bindParam(":email", $this->email);
			$atualizar->bindParam(":cpf", $this->cpf);
			$atualizar->bindParam(":cidade", $this->cidade);
			$atualizar->bindParam(":observacao", $this->observacao);
			return $atualizar->execute();
	    } 

	    public function excluir(){
			$conect  = $this->get_conexao();
			$sql_deletar = $conect->prepare("DELETE FROM pessoa WHERE id = :id");
	        $sql_deletar->bindParam(":id" , $this->id);
	        return $sql_deletar->execute();

		}



	}

?>