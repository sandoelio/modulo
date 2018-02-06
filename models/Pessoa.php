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



	}

?>