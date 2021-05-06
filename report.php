<?php
session_start();
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
   
     <a href="gerarExcel.php"> <button type="submit" class="btn btn-primary btn-lg"> Gerar Excel </button></a>
 

    <form class=" navbar-left-right" method="post" style="float:right;">
              <input type="text"  name="busca" placeholder="Pesquisar Model...">
              <input type="submit"  value="" class="fa fa-search">
            </form>
            <div class="clearfix"> </div>
    <?php
      // Método pesquisar
      if(isset($_POST["busca"])){
        $busca   = $_POST["busca"];
        $_SESSION['busca'] = $busca;
        // Inicio Validar entrada
        if($busca == ""){
          echo "<script> alert('Invalido!'); location.href='cadastroModel.php'</script>";
        } else {
                  $select = $mysqli->query("SELECT DM.MODEL, DQ.FAT_PART_NO,  DQ.TOTAL_LOCATION, DC.PARTS_NO, DC.UNT_USG, DC.DESCRIPTION, DC.REF_DESIGNATOR
                  FROM DQCMODEL AS DM
                  INNER JOIN DQC84 AS DQ ON DM.ID= DQ.MODEL
                  INNER JOIN DQC841 AS DC ON DQ.ID= DC.FAT_PART_NO WHERE DM.MODEL LIKE '$busca%' ");
                  $row = $select->num_rows;
                }
        // Fim Validar entrada
      }else{
       $select = $mysqli->query("SELECT DM.MODEL, DQ.FAT_PART_NO,  DQ.TOTAL_LOCATION, DC.PARTS_NO, DC.UNT_USG, DC.DESCRIPTION, DC.REF_DESIGNATOR
       FROM DQCMODEL AS DM
       INNER JOIN DQC84 AS DQ ON DM.ID= DQ.MODEL
       INNER JOIN DQC841 AS DC ON DQ.ID= DC.FAT_PART_NO");
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
        <th scope="col">Parts No</th>
        <th scope="col">Unt Usg</th>
        <th scope="col">Description</th>
        <th scope="col">Ref Designator</th>
               
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
        <td><?=$get["FAT_PART_NO"]?></td>
        <td><?=$get["TOTAL_LOCATION"]?></td>
        <td><?=$get["PARTS_NO"]?></td>
        <td><?=$get["UNT_USG"]?></td>
        <td><?=$get["DESCRIPTION"]?></td>
        <td><?=$get["REF_DESIGNATOR"]?></td>
   
      
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
              $query2 = $mysqli->query("INSERT INTO `DQCMODEL`(`MODEL`) VALUES ('$model')");
			        // verifica query
              if($query2){
                echo "<script> alert('Incluido com sucesso!'); location.href='cadastroModel.php'</script>";
              }else{
                echo "<script> alert('Erro ao Salvar!'); </script>";
              }
            }
          }
    }
  


  ?>