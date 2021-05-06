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
     <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
      Cadastrar 
     </button>
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h2 class="modal-title">Cadastrar </h2>
							</div>

<!-- conteúdo do modal -->
<div class="modal-body">

<!-- cadastro Procedimento  -->
<div class="validation-system"> 		
 		<div class="validation-form">

  	    
        <form method="post">
         	<div class="vali-form">
          
         	

        	<div class="col-md-12 form-group2 group-mail" >
	            <label> Fat Part No</label></br>
				<select name="idpart" style="color:black;">
	            <option value=""disabled selected>...</option>
	                <?php
	               // Método carrega
	               $select2 = $mysqli->query("SELECT * FROM DQC84 ORDER BY FAT_PART_NO ASC");
	               while($get2 = $select2->fetch_array()){
	            	   echo "<option value='".$get2['ID']."'>".$get2['FAT_PART_NO']."</option>";
	               }
	               ?>
	            </select>
			  </div>      

         	<div class="vali-form">
            <div class="col-md-12 form-group1">
              <label class="control-label">Parts No</label>
				<input class="w3-input" type="text" placeholder="..." required name="parts" autocomplete="off" style="text-transform: uppercase">
            </div>
            <div class="clearfix"> </div>
            </div>
          	<div class="vali-form">
            <div class="col-md-12 form-group1">
              <label class="control-label">Unt Usg</label>
				<input class="w3-input" type="text" placeholder="..." required name="unt" autocomplete="off" style="text-transform: uppercase">
            </div>
            <div class="clearfix"> </div>
            </div>  
                     
           	<div class="vali-form">
            <div class="col-md-12 form-group1">
              <label class="control-label">Description</label>
				<input class="w3-input" type="text" placeholder="..." required name="description" autocomplete="off" style="text-transform: uppercase">
            </div>
            <div class="clearfix"> </div>
            </div> 
 
          	<div class="vali-form">
            <div class="col-md-12 form-group1">
              <label class="control-label">Ref Designator</label>
				<input class="w3-input" type="text" placeholder="..."  autocomplete="off" style="text-transform: uppercase">
            </div>
            <div class="clearfix"> </div>
            </div>   
            
    
                
			<div class="modal-footer">
              <button type="submit" name="buttoninserir" class="btn btn-primary">Salvar</button>
              <button type="reset" class="btn btn-default">Limpar</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
            </div> 
            </div>           
        </form>
      </div>
    </div>
<!-- cadastro Procedimento -->                        
            </div>
<!-- conteúdo do modal -->

						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>
      </div>
<!-- modal de cadastro -->
       

    <form class=" navbar-left-right" method="post" style="float:right;margin-top:-35px;">
              <input type="text"  name="busca" placeholder="Pesquisar Parts...">
              <input type="submit"  value="" class="fa fa-search">
            </form>
            <div class="clearfix"> </div>
    <?php
      // Método pesquisar
      if(isset($_POST["busca"])){
        $busca   = $_POST["busca"];
        // Inicio Validar entrada
        if($busca == ""){
          echo "<script> alert('Invalido!'); location.href='cadastroDQC841.php'</script>";
        } else {
                  $select = $mysqli->query("SELECT *, DQC841.ID AS chave FROM DQC841 
                  INNER JOIN DQC84 ON DQC841.FAT_PART_NO= dqc84.ID	
					           WHERE PARTS_NO LIKE '%$busca%'");
                  $row = $select->num_rows;

                
                }
        // Fim Validar entrada
      }else{
		
        $select = $mysqli->query("SELECT *, DQC841.ID AS chave FROM DQC841 
        INNER JOIN DQC84 ON DQC841.FAT_PART_NO= dqc84.ID");
                          
        $row = $select->num_rows;
      }
    ?>

<br/>

 

<table class="table table-hover">
  <thead>
    <tr>
    	  <th scope="col">Fat Part No</th>
        <th scope="col">Parts No</th>
        <th scope="col">Unt Usg</th> 
        <th scope="col">Description</th>         
        <th scope="col">Ref Designator1</th>
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
        <td><?=$get["FAT_PART_NO"]?></td>
        <td><?=$get["PARTS_NO"]?></td>       
        <td><?=$get["UNT_USG"]?></td>    
        <td><?=$get["DESCRIPTION"]?></td>       
        <td><?=$get["REF_DESIGNATOR"]?></td>  
      
<!-- modal de alterar cadastro -->
        <td><a ><i  data-toggle="modal" data-target="#alterarModal<?=$get['chave'];?>"  class="fa fa-pencil fa-fw"></i></a></td>
              
               <div class="modal fade" id="alterarModal<?=$get['chave'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h2 class="modal-title">Alterar</h2>
							</div>

<!-- conteúdo do modal -->
       <div class="modal-body">

<!-- cadastro   -->
         <div class="validation-system"> 		
 		        <div class="validation-form">

  	    
        <form method="post">
         	<div class="vali-form">
	       
            <input type="hidden" name="id" VALUE="<?=$get['chave'];?>">

             

            <div class="col-md-12 form-group1">
              <label class="control-label">Parts No</label>
              <input type="text" name="parts" required="" VALUE="<?php echo $get['PARTS_NO'];?>">
            </div>
          <div class="clearfix"> </div> 
          	<div class="vali-form">
            <div class="col-md-12 form-group1">
              <label class="control-label">Unt Usg</label>
				<input class="w3-input" type="text" name="unt" required="" VALUE="<?php echo $get['UNT_USG'];?>" style="text-transform: uppercase">
            </div>
            <div class="clearfix"> </div>
            </div>           
        
          	<div class="vali-form">
            <div class="col-md-12 form-group1">
              <label class="control-label">Description</label>
				<input class="w3-input" type="text" name="description" required="" VALUE="<?php echo $get['DESCRIPTION'];?>" style="text-transform: uppercase">
            </div>
            <div class="clearfix"> </div>
            </div> 
          	<div class="vali-form">
            <div class="col-md-12 form-group1">
              <label class="control-label">Ref Designator</label>
				<input class="w3-input" type="text" name="ref" required="" VALUE="<?php echo $get['REF_DESIGNATOR'];?>" style="text-transform: uppercase">
            </div>
            <div class="clearfix"> </div>
            </div>       

    
             
		<div class="modal-footer">
             <button type="submit" name="buttonAlterar" class="btn btn-primary">Alterar</button>
             <button type="reset" class="btn btn-default">Limpar</button>								
			  <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
		</div>

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
     <td><a ><i data-toggle="modal" data-target="#remover<?=$get['chave'];?>" class="fa fa-trash fa-fw"></i></a></td>

                  
               <div class="modal fade" id="remover<?=$get['chave'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h2 class="modal-title">Remover </h2>
							</div>

<!-- conteúdo do modal -->
       <div class="modal-body">
       <form method="post">
          <h3 style="text-align:center;">Desejar remover? </br> <?=$get['PARTS_NO'];?> </h3>   
          <input type="hidden" name="id" VALUE="<?=$get['chave'];?>">
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
							</br>								
              </br>
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
	$idpart	= $_POST["idpart"];  	
  $parts  	= $_POST["parts"];
	$unt		= $_POST["unt"];
	$description	= $_POST["description"];
	$ref		= $_POST["ref"];
 

  echo  $idpart;
  echo "<br/>";
  echo  $parts;
  echo "<br/>";
   echo  $unt;
  echo "<br/>";
   echo  $description;
  echo "<br/>";
   echo  $ref;
  echo "<br/>";  
    // Validar entrada
    if( $parts == "" || $unt == "" || $description == "" ){
      echo "<script> alert('Apenas o campo ref pode fica nulo!'); </script>";
     
    }else{
            $query = $mysqli->query("SELECT * FROM DQC841 WHERE PARTS_NO='$parts' ");
            $row = $query->num_rows;
            if($row >0){
              echo "<script> alert ('Já existe no Banco de Dados!'); </script>";
            }else{
              // query insert
              $query2 = $mysqli->query("INSERT INTO `DQC841` (`FAT_PART_NO`, `PARTS_NO`,`UNT_USG`, `DESCRIPTION`, `REF_DESIGNATOR`)
               VALUES ('$idpart', UPPER('$parts'), '$unt', UPPER('$description'), '$ref')");
         
              // verifica query
              if($query2){
                echo "<script> alert('Incluido com sucesso!'); location.href='cadastroDQC841.php'</script>";
              }else{
                echo "<script> alert('Erro ao Adicionar!'); </script>";
              }
            }
          }
    }
  


 // Método Alterar
  if(isset($_POST["buttonAlterar"])){
    $id   		= $_POST["id"];
    $parts  	= $_POST["parts"];
    $unt		= $_POST["unt"];
    $description	= $_POST["description"];
    $ref		= $_POST["ref"];
    

    echo  $parts;
    echo "<br/>";
     echo  $unt;
    echo "<br/>";
     echo  $description;
    echo "<br/>";
     echo  $ref;
    echo "<br/>";
    
              // query update
              $query2 = $mysqli->query("UPDATE `DQC841` SET 
																              	 `PARTS_NO`=UPPER('$parts'),
										                             `UNT_USG`='$unt',
										                             `DESCRIPTION`=UPPER('$description'),
										                             `REF_DESIGNATOR`=UPPER('$ref'),
                                                 `UPDATE_DT`=NOW()
                                                  WHERE `ID`='$id'");       
              // verifica query
              if($query2){
                echo "<script> alert('Alterado com sucesso!'); location.href='cadastroDQC841.php'</script>";
              }else{
                echo "<script> alert('Erro ao Alterar!'); </script>";
              }
            }
          
    
  

 // Método Remover
  if(isset($_POST["buttonRemover"])){
    $id   = $_POST["id"];

  
      // query delete
      $query = $mysqli->query("DELETE FROM DQC841 WHERE `ID` ='$id' limit 1");
      // verifica query
      if($query){
        echo "<script> alert('Removido com sucesso!'); location.href='cadastroDQC841.php'</script>";
      }else{
        echo "<script> alert('Erro ao Remover!'); </script>";
      }
    
  }

  ?>