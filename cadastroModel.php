<?php
include("connection.php");
include("sidebar.php");



?>
<!DOCTYPE HTML>
<html>
<head>


<!-- background color-->
     <div id="page-wrapper" class="gray-bg dashbard-1" style="background-color:#F3F3F4">
<!-- background color -->



<!-- conteúdo da página -->
<div class="content-main">

 <!--blank page -->
       <div class="blank">
            <div class="blank-page">


<!-- modal de cadastro -->
     <div class="bs-example2 bs-example-padded-bottom">
     <button type="button" class="btn btn-primary btn-lg"  data-toggle="modal" data-target="#myModal">
      Cadastrar
     </button>
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h2 class="modal-title">Cadastrar Model</h2>
							</div>

<!-- conteúdo do modal -->
<div class="modal-body">

<!-- cadastro Profissional  -->
<div class="validation-system"> 		
 		<div class="validation-form">

  	    
        <form method="post">
         	<div class="vali-form">

                 
            



	            <div class="col-md-12 form-group1 form-last">
                   <label>Model</label>
                   <input class="w3-input" type="text" placeholder="..." required name="model" autocomplete="off" style="text-transform: uppercase">
                </div>
                <div class="clearfix"> </div>
          
</div>
         
	
	        
	        </br>	
         <div class="vali-form vali-form1">                
            <div class="col-md-12 form-group">
              <button type="submit" name="buttoninserir" class="btn btn-primary">Salvar</button>
              <button type="reset" class="btn btn-default">Limpar</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
            </div>
          <div class="clearfix"> </div>
        </form>
    

      </div>
    </div>
<!-- cadastro Profissional -->
                            
            </div>
<!-- conteúdo do modal -->

						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>
      </div>
<!-- modal de cadastro -->
       

    <form class=" navbar-left-right" method="post" style="float:right;margin-top:10px">
              <input type="text"  name="busca" placeholder="Pesquisar Model...">
              <input type="submit"  value="" class="fa fa-search">
            </form>
            <div class="clearfix"> </div>
    <?php
      // Método pesquisar
      if(isset($_POST["busca"])){
        $busca   = $_POST["busca"];
        // Inicio Validar entrada
        if($busca == ""){
          echo "<script> alert('Invalido!'); location.href='cadastroModel.php'</script>";
        } else {
                  $select = $mysqli->query("SELECT * FROM DQCMODEL WHERE MODEL LIKE '$busca%' ");
                  $row = $select->num_rows;
                }
        // Fim Validar entrada
      }else{
       $select = $mysqli->query("SELECT * FROM DQCMODEL");
        $row = $select->num_rows;
      }
    ?>

<br/>

 

<table class="table table-hover">
  <thead>
    <tr>
        <th scope="col">Model</th>
        <th scope="col">Alterar</th>
        <th scope="col">Deletar</th>
               
        <!--<th scope="col">Remover</th>-->
    </tr>
  </thead>
  <tbody>
     <?php
        if($row > 0){
          while($get = $select->fetch_array()){
          
      ?>

     <tr>
        <td><?=$get["MODEL"]?></td>
      
      
<!-- modal de alterar cadastro -->
        <td><a ><i  data-toggle="modal" data-target="#alterarModal<?=$get['ID'];?>"  class="fa fa-pencil fa-fw"></i></a></td>
              
               <div class="modal fade" id="alterarModal<?=$get['ID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h2 class="modal-title">Alterar</h2>
							</div>

<!-- conteúdo do modal -->
       <div class="modal-body">

<!-- cadastro  -->
         <div class="validation-system"> 		
 		        <div class="validation-form">

        <form method="post">
         	<div class="vali-form">
            <div class="col-md-12 form-group1">
              <input type="hidden" name="id" VALUE="<?=$get['ID'];?>">
  	   
	          <div class="clearfix"> </div>	             
            
	            <div class="col-md-12 form-group1 form-last">
                   <label>Model</label>
                   <input class="w3-input" type="text" required name="model" VALUE="<?php echo $get['MODEL'];?>" style="text-transform: uppercase">
                </div>
	          
	            
	            <div class="clearfix"> </div>
            </div>
            
	       

            </br>		   
	   
            <div class="vali-form vali-form1">                
              <div class="col-md-12 form-group" style="margin-top:20px;margin-left:15px">
                <button type="submit" name="buttonAlterar" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
              </div>

            </div>
	          	         
         
          <div class="clearfix"> </div>
        </form>
      </div>
    </div>
<!-- cadastro  -->
                            
            </div>
<!-- conteúdo do modal -->
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>
      </div>
<!--  modal de alterar cadastro -->


<!-- modal remover  -->
      
      <td><a ><i data-toggle="modal" data-target="#remover<?=$get['ID'];?>" class="fa fa-trash fa-fw"></i></a></td>

                  
               <div class="modal fade" id="remover<?=$get['ID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h2 class="modal-title">Remover </h2>
							</div>

<!-- conteúdo do modal -->
       <div class="modal-body">
       <form method="post">
          <h3 style="text-align:center;">Desejar remover? </br> <?=$get['MODEL'];?> </h3>   
          <input type="hidden" name="id" VALUE="<?=$get['ID'];?>">
            </br>
            </br>
            </br>
            
            <div class="col-md-12 form-group" style="float:right;">
              <button type="submit" name="buttonRemover" class="btn btn-primary">SIM</button>
              	<button type="button" class="btn btn-default" data-dismiss="modal">NÃO</button>
            </div>
            </form>
          <div class="clearfix"> </div>
            </div>
<!-- conteúdo do modal -->


							<div class="modal-footer">
						
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>
      </div>
<!--  modal de remover -->

      </tr>
    
<?php 
        }
      }
?>

    
  </tbody>
</table>


	        </div>
      </div>   
<!--blank page -->
            
 </div>        
<!-- conteúdo da página -->



<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<script src="js/bootstrap.min.js"> </script>
</body>

</html>

<?php
// Método Incluir
  if(isset($_POST["buttoninserir"])){
  
    $model   	= $_POST["model"];
   
  echo  $model;
  echo "<br/>";

    // Validar entrada
    if( $model == "" ){
      echo "<script> alert('Preencha todos os campos!'); </script>";
    }else{
      
            // verifica se dados já existem
            $query = $mysqli->query("SELECT * FROM DQCMODEL WHERE MODEL='$model'");
            $row = $query->num_rows;
            if($row >0){
              echo "<script> alert ('Já existe no Banco de Dados!'); </script>";
            }else{
              // query insert
              $query2 = $mysqli->query("INSERT INTO `DQCMODEL`(`MODEL`) VALUES (UPPER('$model'))");
			        // verifica query
              if($query2){
                echo "<script> alert('Incluido com sucesso!'); location.href='cadastroModel.php'</script>";
              }else{
                echo "<script> alert('Erro ao Salvar!'); </script>";
              }
            }
          }
    }
  


 // Método Alterar
  if(isset($_POST["buttonAlterar"])){
  	$id   		= $_POST["id"];
    $model		= $_POST["model"];  	
 
  echo "id:";
  echo  $id;
  echo "<br/>";
  echo  $model;
  echo "<br/>";
	
              $query2 = $mysqli->query("UPDATE `DQCMODEL` SET `MODEL`='$model' WHERE `ID`='$id'");
			  // verifica query
              if($query2){
                echo "<script> alert(' Alterado com sucesso!'); location.href='cadastroModel.php'</script>";
              }else{
                echo "<script> alert('Erro ao Alterar !'); </script>";
              }
            }
 


 // Método Remover
 if(isset($_POST["buttonRemover"])){
  $id   = $_POST["id"];

  
    // query delete
    $query = $mysqli->query("DELETE FROM DQCMODEL WHERE `ID` ='$id'");
    // verifica query
    if($query){
      echo "<script> alert('Removido com sucesso!'); location.href='cadastroModel.php'</script>";
    }else{
      echo "<script> alert('Erro ao Remover!'); </script>";
    }
  
}

  ?>