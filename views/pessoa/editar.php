<!DOCTYPE html>
<html>
  <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Editar Pessoa</title>
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
  
    <h3 class="page-header">Editar Pessoa</h3>

                  
      <form action="#" method="POST" id="formEditar">
          <div class="row">
                          
              <input type="text" name="editarId" class="form-control" id="editarId" value="<?php echo $rsCidade['id'];?>" />

              <center>
                <form action="#" method="POST" id="formPessoa">
                    <label for="forNome">Nome</label></br>
                        <input type="text" id="nome" name="nome" value="" placeholder="Digite o nome"></br></br>
                    

                    <label for="forEmail">Email</label></br>
                        <input type="text" id="email" name="email" placeholder="Digite o email"></br></br>

                    <label for="forCpf">Cpf</label></br>
                        <input type="text" id="cpf" name="cpf" placeholder="Digite o cpf"></br></br>

                   <label for="forObservacao">Observação</label></br>
                        <textarea type="text" id="observacao" name="observacao"></textarea></br></br>
                           
                    <label for="forEstado">Estado</label>
                    
                        <select id="estado" name="estado" value="" >
                                        
                            <option value="" selected="selected" >Selecione</option>
                                <?php
                                    foreach($result as $estado) {
                                ?> 
                            <option value="<?= $estado['id']; ?>" > <?= $estado['nome'];?> </option>
                                               
                                    <?php
                                      }                   
                                     ?>

                        </select>
                          
                    <label for="forCidade">Cidade</label>
                        <select id="cidade" name="cidade" value="" >
                            <option value="" >Selecione</option>
                            
                        </select>
                 </center>      
         
                                        
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

