<?php 
include_once('models/Cidade.php');
include_once('models/Estado.php');


	class CidadeController{
		
		public function consultar() {

				$model = new Cidade();
				$result = $model->consultaCity();
				include_once('./views/View.php');
				$view = new view('cidade/consulta');
	    		$view->assign('result', $result); 
		}

		public function cadastrar(){
			if (isset($_POST) && !empty($_POST)) {
				$model = new Cidade();
				$model->setNome($_POST["nome"]);
				$model->setId_estado($_POST["id_estado"]);
				echo $model->inserir();				
				exit;
			}

			$model = new Estado();
			$result = $model->search();
			include_once('./views/View.php');
			$view = new view('cidade/form');
    		$view->assign('result', $result);
			

		}

		public function editar(){

			if (isset($_GET) && !empty($_GET)) {
				//pesquisa cidade
				$model = new Cidade();
				$model->setId($_GET['id']);
				$cidade = $model->getCidade();
				
				//pesquisa todos estados
			   	$model = new Estado();
				$estados = $model->search();
	    		
				//render form
				include_once('./views/View.php');
				$view = new view('cidade/editar');
				//passando os parametros para o editar
	    		$view->assign('rsCidade', $cidade); 
	    		$view->assign('rsEstados', $estados);

	    		exit;
		    }

		}

		public function update() {
			
			if (isset($_POST) && !empty($_POST)) {
				$model = new Cidade();
				$model->setId($_POST['id']);
				$model->setNome($_POST['nome']);
				$model->setId_estado($_POST['estado']);
				echo $model->atualizar();				
				exit;			
		    }
		}    

		public function excluir(){

			if (isset($_POST) && !empty($_POST)) {
				$model = new Cidade();
				$model->setId($_POST['id']);
				echo $model->excluir();
				exit;
		    }
	    
        }

        public function consultarCidades(){

				$model = new Cidade();
				$model->setId_estado($_GET['id']);
				echo $model->searchCidade();

	
        }
        
	}
 ?>