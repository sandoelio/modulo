<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Adicionar Pessoas</title>
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
          
              <h3 class="page-header">Adicionar Pessoas</h3>
              
               <center>
                <form action="#" method="POST" id="formPessoa">
                    <label for="forNome">Nome</label></br>
                        <input type="text" id="nome" name="nome" placeholder="Digite o nome"></br></br>
                    

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
                            <input type="button" id="btnSubmit" class="btn btn-primary" value="Salvar"></input>
                            <a href="./?controller=Pessoa&action=consultar" class="btn btn-default">Cancelar</a>
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
            if($("#email").val().trim($('#email').val().trim()) == "") {
                alert('Por favor, preencha o campo email');
                $("#email").focus();
                return false
            }

            if($("#cpf").val().trim($('#cpf').val().trim()) == "") {
                alert('Por favor, preencha o campo cpf');
                $("#cpf").focus();
                return false
            }

            if($("#observacao").val().trim($('#observacao').val().trim()) == "") {
                alert('Por favor, preencha o campo observacao');
                $("#observacao").focus();
                return false
            }

            if($("#estado").val().trim($('#estado').val().trim()) == "") {
                alert('Por favor, preencha o campo estado');
                $("#estado").focus();
                return false
            }

            if($("#cidade").val().trim($('#cidade').val().trim()) == "") {
                alert('Por favor, preencha o campo cidade');
                $("#cidade").focus();
                return false
            }
         
            var p ={  

               'nome': $('#nome').val(),
               'email': $('#email').val(),
               'cpf': $('#cpf').val(),
               'observacao': $('#observacao').val(),
               'estado': $('#estado').val(),
               'cidade': $('#cidade').val(),
                 
            }               
               
            $.ajax({
                type:'POST',
                url:'./?controller=Pessoa&action=cadastrar',
                data: p,        
                success: function(data){ 
                    if(data){
                        alert("Cadastrado com Sucesso!");
                        $(location).attr('href','./?controller=Pessoa&action=consultar');  
                    }else {
                        alert('Dados nao cadastrado');
                    }
                }
              
            }); 

        });
        $("#estado").change(function(e){ 
            //seleciona no combo estado o valor da opcao e atribui ao id_estado
            var id_estado = $("#estado option:selected").val();           
            //buscando o arquivo consultar e passando os parametos opcao e valor retornado na function (dados)                          
            $.getJSON('./?controller=Cidade&action=consultarCidades&id='+id_estado, function (dados){
               console.log(dados);
                if (dados.length > 0){  
                    var option = '<option>Selecione...</option>';
                    $.each(dados, function(i, obj){
                        option += '<option value="'+obj.id+'">'+obj.nome+'</option>';
                    });
                
                }
                $('#cidade').html(option);

            });

        })  
            $ (this) .remove ();  

    });



</script>