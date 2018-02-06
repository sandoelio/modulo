
<!DOCTYPE html>
<html>
 <head>
	 <meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <title>Estados</title>
	 <link href="isset/css/bootstrap.min.css" rel="stylesheet">
	 <link href="isset/css/style.css" rel="stylesheet">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	 <script type="text/javascript">
 		//recebendo como param o id pelo botao excluir
			function excluir($id){

				var p = {  
            	 'id': $id              
           		} 

           		$.ajax({
	                type:'POST',
	                url:'./?controller=Estado&action=excluir',
	                data: p,        
	                success: function(data){ 
		                if(data){
	                       alert("Excluido com Sucesso!");
	                       $(location).attr('href','./?controller=Estado&action=consultar');  
	                    }else {
	                       alert('Erro ao excluir');
	                    }
                    }
              
                });       
		    }

		    function editar($id){
		    	$(location).attr('href','./?controller=Estado&action=editar&id='+$id);
		
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
				<h2>Estados</h2>
			</div>
		<form action="consulta.php" method="POST" id="formEstado" name="formEstado">	 	
		 	<div id="list" class="row">		
			<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nome</th>
							<th>Sigla</th>
							<th class="actions">Ações</th>
						</tr>
					</thead>
					<tbody>

						<?php
			 				foreach($result as $estado) {
			 			?> 
			 					<tr>
			 						<td><?php echo $estado['id'];?></td>
								    <td><?php echo $estado['nome'];?></td>
								    <td><?php echo $estado['sigla'];?></td>
								    <td class="actions">
										 <input type="button" id="btnEditar" name="btnEditar" class="btn btn-warning btn-xs" onclick="editar(<?= trim($estado["id"]); ?>);" class="btn btn-danger btn-xs" value="Editar" ></input>

										<input type="button" id="btnExcluir" name="btnExcluir" onclick="excluir(<?= trim($estado["id"]); ?>);" class="btn btn-danger btn-xs" value="Excluir" ></input>
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
        
		$("#btnCadastrar").click(function(){
			//direciona para o arquivo EstadoController.php
			$(location).attr('href','./?controller=Estado&action=cadastrar');
		});	
		
   	});

</script>			
