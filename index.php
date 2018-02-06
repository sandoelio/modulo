<?php
	$controllerName = $_GET['controller'].'Controller';
	$actionName = $_GET['action'];

//adiconando na variavel $include_pasta a pasta o arquivo do controllers 
	$include_pasta = 'controllers';
//recebendo o arquivo do controllers ".php"
	$include_arquivo = $controllerName.".php";
//adicionando os arquivos e pasta no include_once
	include_once($include_pasta."/".$include_arquivo);

	 $controller = new $controllerName();//class
	 $controller->$actionName();//metodo

?>