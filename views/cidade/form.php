

<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Adicionar Cidades</title>
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
          
              <h3 class="page-header">Adicionar Cidades</h3>
              
                <form action="#" method="POST" id="formCidade">

                	<div class="row">
                	  <div class="form-group col-md-4">
                	  	<label for="forNome">Nome</label>
                	  	<input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome">
                	  </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="forEstado">Estado</label>
                    
                                    <select id="id_estado" name="id_estado" value="" >
                                         <option value="" >Selecione</option>
                                        <?php
                                            foreach($result as $estado) {
                                        ?> 
                                        <option value="<?= $estado['id']; ?>" > <?= $estado['nome']; ?></option>
                                       
                                        <?php
                                            }                   
                                        ?>

                                   </select>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="button" id="btnSubmit" class="btn btn-primary" value="Salvar"></input>
                            <a href="./?controller=Cidade&action=consultar" class="btn btn-default">Cancelar</a>
                        </div>
                    </div> 

                </form>
         </div>
         <script src="isset/js/jquery.min.js"></script>
         <script src="isset/js/bootstrap.min.js"></script>
    </body>
</html>

<script type="text/javascript">
    

    $(document).ready(function(){  

 
        $('#btnSubmit').click(function(){

            if($("#nome").val().trim($('#nome').val().trim()) == "") {
                alert('Por favor, preencha o campo Nome');
                $("#nome").focus();
                return false
            }
            if($("#id_estado").val().trim($('#id_estado').val().trim()) == "") {
                alert('Por favor, preencha o campo estado');
                $("#id_estado").focus();
                return false
            }
         
            var p ={  

               'nome': $('#nome').val(),
               'id_estado': $('#id_estado').val(),
                 
            }               
               
            $.ajax({
                type:'POST',
                url:'./?controller=Cidade&action=cadastrar',
                data: p,        
                success: function(data){ 
                    if(data){
                        alert("Cadastrado com Sucesso!");
                        $(location).attr('href','./?controller=Cidade&action=consultar');  
                    }else {
                        alert('Dados nao cadastrado');
                    }
                }
              
            }); 

        });
    });

</script>