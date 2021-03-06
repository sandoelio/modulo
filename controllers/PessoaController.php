<?php
include_once('models/Cidade.php');
include_once('models/Pessoa.php');
include_once('models/Estado.php');

	class PessoaController{

			public function consultar() {

					$model = new Pessoa();
					$result = $model->consulta();
					include_once('./views/View.php');
					$view = new view('pessoa/consulta');
					$view->assign('result', $result); 

			}

			public function cadastrar(){
				if (isset($_POST) && !empty($_POST)) {
					$model = new Pessoa();
					$model->setNome($_POST["nome"]);
					$model->setEmail($_POST["email"]);
					$model->setCpf($_POST["cpf"]);
					$model->setObservacao($_POST["observacao"]);
					$model->setCidade($_POST["cidade"]);
					echo $model->inserir();				
					exit;

				}

				$model = new Estado();
				$result = $model->search();
				include_once('./views/View.php');
				$view = new view('pessoa/form');
	    		$view->assign('result', $result);

	       	}

	       	public function editar(){

				if (isset($_GET) && !empty($_GET)) {
					//pesquisa pessoas
					$model = new Pessoa();
					$model->setId($_GET['id']);
					$pessoas = $model->consultaPessoa();
					
					//pesquisa todos estados
				    $model = new Estado();
					$estados = $model->search();

					$model = new Cidade();					
					$cidades = $model->search();
					
		    		
					//render form
					include_once('./views/View.php');

					$view = new view('pessoa/editar');
					//passando os parametros para o editar
		    		$view->assign('rsCidades', $cidades); 
		    		$view->assign('rsPessoas', $pessoas);
		    		$view->assign('rsEstados', $estados);


		    		exit;
			    }

	        }


			public function update(){
			
				if (isset($_POST) && !empty($_POST)) {
					$model = new Pessoa();
					$model->setId($_POST['id']);
					$model->setNome($_POST['nome']);
					$model->setEmail($_POST['email']);
					$model->setCpf($_POST['cpf']);
					$model->setCidade($_POST['cidade']);
					$model->setObservacao($_POST['observacao']);
					echo $model->atualizar();				
					exit;			
		        }

		    }

		    public function excluir(){

				if (isset($_POST) && !empty($_POST)) {
					$model = new Pessoa();
					$model->setId($_POST['id']);
					echo $model->excluir();
					exit;
			    }

			}
    }

?>