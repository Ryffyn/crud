 <?php
	session_start();
	include_once('connection.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Contato</title>
	<head>
	<body>
		<?php
		
		$arquivo = 'planilha.xls';
		
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7" style="text-align:center"><b>MODELS</b></tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>MODEL</b></td>';
		$html .= '<td><b>FAT PART NO</b></td>';
		$html .= '<td><b>TOTAL LOCATION</b></td>';
		$html .= '<td><b>PARTS NO</b></td>';
        $html .= '<td><b>UNT USG</b></td>';
        $html .= '<td><b>DESCRIPTION</b></td>';
        $html .= '<td><b>REF DESIGNATOR</b></td>';
       
		$html .= '</tr>';
		
	
       
        $verifica= $_SESSION['busca'];

        if(!$verifica=""){
            $busca= $_SESSION['busca'];
                  $select = $mysqli->query("SELECT DM.MODEL, DQ.FAT_PART_NO,  DQ.TOTAL_LOCATION, DC.PARTS_NO, DC.UNT_USG, DC.DESCRIPTION, DC.REF_DESIGNATOR
                  FROM DQCMODEL AS DM
                  INNER JOIN DQC84 AS DQ ON DM.ID= DQ.MODEL
                  INNER JOIN DQC841 AS DC ON DQ.ID= DC.FAT_PART_NO WHERE DM.MODEL LIKE '$busca%' ");
                  $row = $select->num_rows;
                
             
      }else{
       $select = $mysqli->query("SELECT DM.MODEL, DQ.FAT_PART_NO,  DQ.TOTAL_LOCATION, DC.PARTS_NO, DC.UNT_USG, DC.DESCRIPTION, DC.REF_DESIGNATOR
       FROM DQCMODEL AS DM
       INNER JOIN DQC84 AS DQ ON DM.ID= DQ.MODEL
       INNER JOIN DQC841 AS DC ON DQ.ID= DC.FAT_PART_NO");
        $row = $select->num_rows;
      }
		
		while($get = $select->fetch_array()){
			$html .= '<tr>';
			$html .= '<td>'.$get["MODEL"].'</td>';
            $html .= '<td>'.$get["FAT_PART_NO"].'</td>';
            $html .= '<td>'.$get["TOTAL_LOCATION"].'</td>';
            $html .= '<td>'.$get["PARTS_NO"].'</td>';
            $html .= '<td>'.$get["UNT_USG"].'</td>';
            $html .= '<td>'.$get["DESCRIPTION"].'</td>';
            $html .= '<td>'.$get["REF_DESIGNATOR"].'</td>';
			$html .= '</tr>';
			;
		}
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		
		echo $html;

        $_SESSION['busca']="";
		exit; ?>
	</body>
</html>