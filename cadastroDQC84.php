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
      Cadastro 
     </button>

    

     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h2 class="modal-title">Cadastrar</h2>
							</div>

<!-- conteúdo do modal -->
<div class="modal-body">

<!-- cadastro   -->
<div class="validation-system"> 
			
 		<div class="validation-form">

  	    <form method="post">
         	<div class="vali-form">
         		<div class="col-md-12 form-group2 group-mail">
	            <label> Model</label></br>
				<select name="idmodel" style="color:black;">
	            <option value=""disabled selected>...</option>
	                <?php
	               // Método carrega
	              $select2 = $mysqli->query("SELECT * FROM DQCMODEL ORDER BY MODEL ASC");
	               while($get2 = $select2->fetch_array()){
	            	   echo "<option value='".$get2['ID']."'>".$get2['MODEL']."</option>";
	               }
	               ?>
	            </select>
			  </div>
	            <div class="col-md-12 form-group1 form-last">
                   <label>Fat Part No</label>
                   <input class="w3-input" type="text" placeholder="..." required name="fatpart" autocomplete="off" style="text-transform: uppercase">
                </div>
              

	            <div class="col-md-12 form-group1 form-last">
	               <label>Total Location</label>
                   <input class="w3-input" type="text" placeholder="..." name="total" autocomplete="off" style="text-transform: uppercase">
	            </div>        
              <div class="clearfix"> </div>	
                   
            
            </br>	
    
	         <div class="clearfix"> </div>           	                 
            <div class="col-md-12 form-group">
              <button type="submit" name="buttoninserir" class="btn btn-primary">Salvar</button>
              <button type="reset" class="btn btn-default">Limpar</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
            </div>
          <div class="clearfix"> </div>
        </form>
    

      </div>
    </div>
<!-- cadastro Clientes -->
                            
            </div>
<!-- conteúdo do modal -->

						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>
      </div>
<!-- modal de cadastro --> 



       
				
    <form class=" navbar-left-right" method="post" style="float:right;margin-top:10px;">
              <input type="text"  name="busca" placeholder="Pesquisar Fat Part...">
              <input type="submit"  value="" class="fa fa-search">
            </form>
            <div class="clearfix"> </div>
    <?php
      // Método pesquisar
      if(isset($_POST["busca"])){
        $busca   = $_POST["busca"];
        // Inicio Validar entrada
        if($busca == ""){
          echo "<script> alert('Invalido!'); location.href='cadastroDQC84.php'</script>";
        } else {

                  $select = $mysqli->query("SELECT *,  DQC84.ID AS chave FROM DQC84 
                  INNER JOIN DQCMODEL ON DQC84.MODEL=DQCMODEL.ID WHERE FAT_PART_NO LIKE '$busca%' ");
                  $row = $select->num_rows;
                }
         //Fim Validar entrada
      }else{
        $select = $mysqli->query("SELECT *, DQC84.ID AS chave FROM DQC84 
        INNER JOIN DQCMODEL ON DQC84.MODEL=DQCMODEL.ID");
        $row = $select->num_rows;
      }

    
    ?>

<br/>

 

<table class="table table-hover">
  <thead>
    <tr>
        <th scope="col">Model</th>
        <th scope="col">Fat Part No</th>
        <th scope="col">Total Location</th>
        <th scope="col">Alterar</th>
        <th scope="col">Deletar</th> 
    </tr>
  </thead>
  <tbody>
     <?php
        if($row > 0){
          while($get = $select->fetch_array()){
          
      ?>

     <tr>
        <td><?=$get["MODEL"]?></td>
        <td><?=$get["FAT_PART_NO"]?></td>
        <td><?=$get["TOTAL_LOCATION"]?></td>  
      

<!-- modal de alterar cadastro -->
        <td><a ><i  data-toggle="modal" data-target="#alterarModal<?=$get['chave'];?>"  class="fa fa-pencil fa-fw"></i></a></td>
              
               <div class="modal fade" id="alterarModal<?=$get['chave'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h2 class="modal-title">Alterar </h2>
							</div>

<!-- conteúdo do modal -->
       <div class="modal-body">

<!-- cadastro Clientes  -->
         <div class="validation-system"> 		
 		        <div class="validation-form">

        <form method="post">
         	<div class="vali-form">
           
              <input type="hidden" name="id" VALUE="<?=$get['chave'];?>">
	          
	             

	            <div class="col-md-12 form-group1 form-last">
	               <label>Fat Part No</label>
                   <input class="w3-input" type="text" name="fatpart" VALUE="<?php echo $get['FAT_PART_NO'];?>" autocomplete="off" style="text-transform: uppercase">
	            </div>
	            <div class="clearfix"> </div>
	        
	          
	          <div class="col-md-12 form-group1 form-last">
                <label>Total</label>
                <input class="w3-input" type="text" name="total" autocomplete="off" VALUE="<?php echo $get['TOTAL_LOCATION'];?>" style="text-transform: uppercase">
              </div>	          
	          <div class="clearfix"> </div>		          
	         
	 
	  
            </br>		                 
            <div class="col-md-12 form-group">
              <button type="submit" name="buttonAlterar" class="btn btn-primary">Alterar</button>
              <button type="reset" class="btn btn-default">Limpar</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>              
            </div>
          <div class="clearfix"> </div>
        </form>
      </div>
    </div>
<!-- cadastro Clientes -->
                            
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
								<h2 class="modal-title">Deletar</h2>
							</div>
						<!-- conteúdo do modal -->
						       <div class="modal-body">
						       <form method="post">
						          <h3 style="text-align:center;">Desejar deletar? </br> <?=$get['FAT_PART_NO'];?> </h3>   
						          <input type="hidden" name="id" VALUE="<?=$get['ID'];?>">       		
						  						        
						            </br>
						            </br>
						          <div class="col-md-12 form-group" style="float:right;">
						              <button type="submit" name="buttonRemover" class="btn btn-primary">SIM</button>
						              	<button type="button" class="btn btn-default" data-dismiss="modal">NÃO</button>
						         </div>
                     
						       </form>
						       
						
						<!-- conteúdo do modal -->
							<div class="modal-footer">
						
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>
      </div>
<!--  modal de remover  -->

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
	
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<script src="js/bootstrap.min.js"> </script>
</body>

</html>


<?php




// Método Incluir
  if(isset($_POST["buttoninserir"])){
    $idmodel		= $_POST["idmodel"];  	
    $model   	= $_POST["model"];
	  $fatpart		= $_POST["fatpart"];
    $total		= $_POST["total"];

  
   
      // Validar entrada
    if($idmodel == ""  || $fatpart == "" || $total == "" ){
      echo "<script> alert('Preencha todos os campos!'); </script>";
    }else{
    
           
            // verifica se dados já existem
            $query = $mysqli->query("SELECT * FROM DQC84 WHERE FAT_PART_NO='$fatpart'");
            $row = $query->num_rows;
            if($row >0){
              echo "<script> alert ('Já existe no Banco de Dados!'); </script>";
            }else{
              // query insert
              $query2 = $mysqli->query("INSERT INTO `DQC84`(`MODEL`, `FAT_PART_NO`, `TOTAL_LOCATION`) VALUES ('$idmodel', 
                           UPPER('$fatpart'), '$total')");
                  
			  // verifica query
              if($query2){
                echo "<script> alert('Incluido com sucesso!'); location.href='cadastroDQC84.php'</script>";
              }else{
                echo "<script> alert('Erro ao Adicionar!'); </script>";
              }
            }
          
    }
  }


 // Método Alterar
  if(isset($_POST["buttonAlterar"])){
    $id   		= $_POST["id"];
    $fatpart		= $_POST["fatpart"]; 
    $total		= $_POST["total"];  	

    echo  $id;
    echo "<br/>";
    echo  $fatpart;
    echo "<br/>";
    echo  $total;
    echo "<br/>";


  
            // query update
			 $query2 = $mysqli->query("UPDATE `DQC84` SET `FAT_PART_NO`=UPPER('$fatpart'),
														        `TOTAL_LOCATION`='$total',    
														        `UPDATE_DT`=NOW()
														         WHERE `ID`='$id'");	  
								
			  // verifica query
              if($query2){
                echo "<script> alert('Alterado com sucesso!'); location.href='cadastroDQC84.php'</script>";
              }else{
                echo "<script> alert('Erro ao Alterar!'); </script>";
              }
            }
          
    
  

 // Método Remover
  if(isset($_POST["buttonRemover"])){
    $id   = $_POST["id"];

    echo  $id;
    echo "<br/>";

    // Validar entrada
    $query = $mysqli->query("DELETE FROM DQC84 WHERE `ID`='$id'");

      // verifica query
      if($query){
        echo "<script> alert('Removido com sucesso!'); location.href='cadastroDQC84.php'</script>";
      }else{
        echo "<script> alert('Erro ao Remover!'); </script>";
      }
    
    
    }
