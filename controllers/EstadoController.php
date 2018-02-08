<?php
include_once('models/Estado.php');

	class EstadoController{

		public function consultar(){
			$model = new Estado();
			$result = $model->search();
			include_once('./views/View.php');
			$view = new view('estado/consulta');
    		$view->assign('result', $result); 
		}

		public function cadastrar(){
			if (isset($_POST) && !empty($_POST)) {
				$model = new Estado();
				$model->setNome($_POST['campoNome']);
				$model->setSigla($_POST['campoSigla']);
				echo $model->inserir();				
				exit;
			}
			//se o parametro for cadastrar direciona para o include
			include_once('./views/estado/form.php');
		}
		//nao recisa passar param porque foi reconhecido pelo onclick
		public function excluir(){
			if (isset($_POST) && !empty($_POST)) {
				$model = new Estado();
				$model->setId($_POST['id']);
				echo $model->excluir();
				exit;
		    }
	    }

		public function editar(){

			if (isset($_GET) && !empty($_GET)) {
				$model = new Estado();
				$model->setId($_GET['id']);
				$result = $model->getEstado();
				include_once('./views/View.php');
				$view = new view('estado/editar');
	    		$view->assign('result', $result); 
	    		exit;
		    }

		}

		public function update() {
			
			if (isset($_POST) && !empty($_POST)) {
				$model = new Estado();
				$model->setId($_POST['id']);
				$model->setNome($_POST['nome']);
				$model->setSigla($_POST['sigla']);
				echo $model->atualizar();				
				exit;
			
		    }
	    
        }
        
    }
?>