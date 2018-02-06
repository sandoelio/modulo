<!DOCTYPE html>
<html>
 <head>
	 <meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <title>Pessoas</title>
	 <link href="isset/css/bootstrap.min.css" rel="stylesheet">
	 <link href="isset/css/style.css" rel="stylesheet">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


	 <script type="text/javascript">

		    //ao clicar no botao editar direciona para o controllerCidade/editar
		    function editar($id){
		    	$(location).attr('href','./?controller=Pessoa&action=editar&id='+$id);
		
		    }
	
	</script>

 </head>
 <body>
	<!--faixa do topo-->
	 <nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	   <div class="navbar-header">
	   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	    <span class="sr-only">Toggle navigation</span>
	     <span class="icon-bar"></span>
	     <span class="icon-bar"></span>
	     <span class="icon-bar"></span>
	    </button>
	   </div>
	  </div>
	 </nav>

	<!--div de espacamento-->	
	 <div id="main" class="container-fluid" style="margin-top: 50px"> 
	 	<div id="top" class="row">
			<div class="col-sm-3">
				<h2>Pessoas</h2>
			</div>
		<form action="consulta.php" method="GET" id="formCidade" name="formPessoas">	 	
		 	<div id="list" class="row">	</div>		
			<div class="table-responsive col-md-12"></div>	
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nome</th>
							<th>Email</th>
							<th>Cpf</th>
							<th>Observação</th>
							<th>Cidade</th>
							<th>Estado</th>
							<th class="actions">Ações</th>
						</tr>
					</thead>
					<tbody>
							<?php
			 				foreach($result as $pessoa) {
			 				?> 
			 					<tr>
			 						<td><?php echo $pessoa['id_pessoa'];?></td>
								    <td><?php echo $pessoa['nome_pessoa'];?></td>
								    <td><?php echo $pessoa['email'];?></td>
								    <td><?php echo $pessoa['cpf'];?></td>
								    <td><?php echo $pessoa['observacao'];?></td>
								    <td><?php echo $pessoa['nome_cidade'];?></td>
								    <td><?php echo $pessoa['nome_estado'];?></td>
								    <td class="actions">
								<tr>
						    <td><input type="button" id="btnEditar" name="btnEditar" class="btn btn-warning btn-xs" onclick="editar(<?= trim($pessoa["id_pessoa"]); ?>)" class="btn btn-danger btn-xs" value="Editar" ></input>
								<input type="button" id="btnExcluir" name="btnExcluir" onclick="excluir();" class="btn btn-danger btn-xs" value="Excluir" ></input>
							</td>
					    </tr>											    
 						<?php
					        }	                
						?>
					</tbody>
				</table>
	    </form>
			<!--botao novo item-->	
			<div class="col-sm-6">	
				<div class="input-group h2"></div>			
				<div class="col-sm-3">
					<a href="#" id="btnCadastrar" class="btn btn-primary pull-right h2">Novo Item</a>
				</div>		 
			</div>	

	 <script src="isset/js/jquery.min.js"></script>
	 <script src="isset/js/bootstrap.min.js"></script>
 </body>
</html>
 						
<script type="text/javascript">
	
	$(document).ready(function(){

		$('#btnCadastrar').click(function(){

			$(location).attr('href','./?controller=Pessoa&action=cadastrar');

		});
	});

</script> 