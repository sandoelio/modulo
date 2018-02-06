<!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Adicionar estados</title>
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
    
        <h3 class="page-header">Adicionar Estados</h3>
        
        <form action="#" method="POST" id="formEstado">
          	<div class="row">
          	  <div class="form-group col-md-4">
          	  	<label for="forNome">Nome</label>
          	  	<input type="text" class="form-control" id="campoNome" placeholder="Digite o valor">
          	  </div>
        	    <div class="form-group col-md-4">
          	  	<label for="forSigla">Sigla</label>
          	  	<input type="text" class="form-control" id="campoSigla" placeholder="Digite o valor">
          	  </div>
            </div>
        	  <div class="row">
          	  <div class="col-md-12">
          	  	<input type="button" id="btnSubmit" class="btn btn-primary" value="Salvar"></input>
          		  <a href="./?controller=Estado&action=consultar" class="btn btn-default">Cancelar</a>
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

             if($("#campoNome").val().trim($('#campoNome').val().trim()) == "") {
                    alert('Por favor, preencha o campo Nome');
                    $("#campoNome").focus();
                    return false
            }
             if($("#campoSigla").val().trim($('#campoSigla').val().trim()) == "") {
                    alert('Por favor, preencha o campo Sigla');
                    $("#campoSigla").focus();
                    return false
            }
         
           var p ={  

               'campoNome': $('#campoNome').val(),
               'campoSigla': $('#campoSigla').val(),
                 
              }               
               
            $.ajax({
                type:'POST',
                url:'./?controller=Estado&action=cadastrar',
                data: p,        
                success: function(data){ 
                  if(data){
                      alert("Cadastrado com Sucesso!");
                     $(location).attr('href','./?controller=Estado&action=consultar');  
                  }else {
                      alert('Dados nao cadastrado');
                    }
                }
              
            }); 

        });
    });

</script>