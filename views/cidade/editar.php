<!DOCTYPE html>
<html>
  <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Editar Cidade</title>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <link href="isset/css/bootstrap.min.css" rel="stylesheet">
       <link href="isset/css/style.css" rel="stylesheet">

    </head>
  <body>

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
 
    <div id="main" class="container-fluid">
  
    <h3 class="page-header">Editar Cidade</h3>

                  
      <form action="#" method="POST" id="formEditar">
          <div class="row">
                          
              <input type="hidden" name="editarId" class="form-control" id="editarId" value="<?php echo $rsCidade['id'];?>" />
            
          	<div class="form-group col-md-4">
          	  	<label for="forNome">Nome</label>
          	  	<input type="text" class="form-control" id="editarNome" value="<?php echo $rsCidade['nome'];?>" placeholder="Digite o nome" />
          	</div>
        	  <div class="form-group col-md-4">

                <div class="row">
                            <div class="form-group col-md-4">
                                <label for="forEstado">Estado</label>
                    
                                    <select id="id_estado" name="id_estado" value="" >
                                        <option value="" >Selecione</option>
                                        <?php
                                        //o controller envia a variavel $rsEstado que insere para $estado e faz o loop
                                            foreach($rsEstados as $estado) {
                                        ?> 
                                            <option value="<?= $estado['id']; ?>" > <?= $estado['nome']; ?></option> 
                                       
                                        <?php
                                           }                   
                                        ?>

                                   </select>
                             
                            </div>
                        </div>

          	</div>
                                        
	    <div class="row">
	      <div class="col-md-12">
  	  	  <button type="button" id="btn_atualizar" name="btn_atualizar" class="btn btn-primary">Atualizar</button>
  		    <a href="./?controller=Cidade&action=consultar" class="btn btn-default">Cancelar</a>
	      </div>
	    </div>
    </form>

     <script src="isset/js/jquery.min.js"></script>
     <script src="isset/js/bootstrap.min.js"></script>
  </body>
</html>

<script type="text/javascript">
  
  $(document).ready(function(){
        
    $("#btn_atualizar").click(function(){

       var p = {  
                 'id'   : $('#editarId').val(),  
                 'nome' : $('#editarNome').val(),
                 'estado': $('#id_estado').val(),                  
              }                                
              $.ajax({
                  type:'POST',
                  url:'./?controller=Cidade&action=update',
                  data: p,        
                  success: function(data){ 
                    if(data){
                        alert("Atualizado com Sucesso!");
                        $(location).attr('href','./?controller=Cidade&action=consultar');  
                    }else {
                        alert('Dados nao Atualizado');
                      }
                  }
                
              });    
    }); 
    
  });

</script>   

