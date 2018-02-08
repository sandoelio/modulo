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
                          
              <input type="hidden" name="editarId" class="form-control" id="editarId" value="<?php echo $rsPessoas['id_pessoa'];?>" />
              <input type="hidden" name="idCidade" class="form-control" id="idCidade" value="<?php echo $rsPessoas['id_cidade'];?>" />
              <input type="hidden" name="idEstado" class="form-control" id="idEstado" value="<?php echo $rsPessoas['id_estado'];?>" />

              <center>
                <form action="#" method="POST" id="formPessoa">
                    <label for="forNome">Nome</label></br>
                        <input type="text" id="nome" name="nome" value="<?php echo $rsPessoas['nome_pessoa'];?>" placeholder="Digite o nome"></br></br>
                    

                    <label for="forEmail">Email</label></br>
                        <input type="text" id="email" name="email" value="<?php echo $rsPessoas['email'];?>" placeholder="Digite o email"></br></br>

                    <label for="forCpf">Cpf</label></br>
                        <input type="text" id="cpf" name="cpf" value="<?php echo $rsPessoas['cpf'];?>" placeholder="Digite o cpf"></br></br>

                   <label for="forObservacao">Observação</label></br>
                        <textarea type="text" id="observacao"  name="observacao" ><?php echo $rsPessoas['observacao'];?></textarea></br></br>
                           
                    <label for="forEstado" >Estado</label>
                    
                        <select id="estado" name="estado" value="" >
                                        
                            <option value="">Selecione</option>
                                <?php
                                    foreach($rsEstados as $estado) {
                                ?> 
                            <option value="<?= $estado['id']; ?>" > <?= $estado['nome'];?> </option>
                                               
                                    <?php
                                      }                   
                                     ?>

                        </select>
                          
                    <label for="forCidade">Cidade</label>
                        <select id="cidade" name="cidade" value="" >
                                        
                            <option value="">Selecione</option>
                                <?php
                                    foreach($rsCidades as $cidade) {
                                ?> 
                            <option value="<?= $cidade['id']; ?>" > <?= $cidade['nome'];?> </option>
                                               
                                    <?php
                                      }                   
                                     ?>
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

        var idEst = $('#idEstado').val();
        var idCid = $('#idCidade').val();
        $("#cidade").val(idCid);
        $("#estado").val(idEst);

        $("#estado").change(function(e){ 
            //seleciona no combo estado o valor da opcao e atribui ao id_estado
            var id_estado = $("#estado option:selected").val();           
            //buscando o arquivo consultar e passando os parametos opcao e valor retornado na function (dados)                          
            $.getJSON('./?controller=Cidade&action=consultarCidades&id='+id_estado, function (dados){             
                if (dados.length > 0){  
                    var option = '<option>Selecione...</option>';
                    $.each(dados, function(i, obj){
                        option += '<option value="'+obj.id+'">'+obj.nome+'</option>';
                    });
                
                }
                $('#cidade').html(option);

            });

        });


        $("#cidade").change(function(e){ 

            var id_cidade = $("#cidade option:selected").val();                                     
            $.getJSON('./?controller=Estado&action=consultar&id='+id_cidade, function (dados){           
                if (dados.length > 0){  
                    var option = '<option>Selecione...</option>';
                    $.each(dados, function(i, obj){
                        option += '<option value="'+obj.id+'">'+obj.nome+'</option>';
                    });
                
                }
                $('#estado').html(option);

            });

        });  

    
  });

</script>   

