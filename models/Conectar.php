<?php
class Conectar{

	public function get_conexao(){
		try {	
				$conx = new PDO("pgsql:host=barrocas.inema.intranet dbname=treinamento_sandoelio user=postgres password=inema@cotic");
				
				//$conx = new PDO("pgsql:host=localhost dbname=treinamento_sandoelio user=postgres password=123456");		
				return $conx;
		} catch (PDOException  $e) {
		     	print $e->getMessage();
		     	return null;

		}	
	}

	
}
?>