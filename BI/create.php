<?php
	function obtainInfo1($Con){
			$File="DataTables/dolarPrice.txt";
			$Manejador=fopen($File, 'r');
			//Open file
			if(file_exists($File)){
				//Insert data
				while($Linea=fgets($Manejador)){ 
					$SQL='INSERT INTO DolarPrices VALUES (';
					$Valores = explode("	", $Linea);
					$QUERY = $SQL."'".$Valores[0]."'".",".$Valores[1].");";
					//Insert data
					enviarQuery($Con,$QUERY);
				}
				//Close file
				fclose($Manejador); 
				return $QUERY;  	
			}else{
				return NULL;
			}
			
	}	

	function obtainInfo2($Con){
		$File="DataTables/appleStock.txt";
		$Manejador=fopen($File, 'r');
		//Open file
		if(file_exists($File)){
			//Insert data
			while($Linea=fgets($Manejador)){ 
				$SQL='INSERT INTO AppleStockPrices VALUES (';
				$Valores = explode("	", $Linea);
				$QUERY = $SQL."'".$Valores[0]."'".",".$Valores[1].");";
				//Insert data
				enviarQuery($Con,$QUERY);
			}
			//Close file
			fclose($Manejador); 
			return $QUERY;  	
		}else{
			return NULL;
		}
		
	}	

	function obtainInfo3($Con){
		$File="DataTables/bitcoin.txt";
		$Manejador=fopen($File, 'r');
		//Open file
		if(file_exists($File)){
			//Insert data
			while($Linea=fgets($Manejador)){ 
				$SQL='INSERT INTO BitcoinPrices VALUES (';
				$Valores = explode("	", $Linea);
				$QUERY = $SQL."'".$Valores[0]."'".",".$Valores[1].");";
				//Insert data
				enviarQuery($Con,$QUERY);
			}
			//Close file
			fclose($Manejador); 
			return $QUERY;  	
		}else{
			return NULL;
		}
		
	}	

		  
	function obtainInfo4($Con){
		$File="DataTables/metaStock.txt";
		$Manejador=fopen($File, 'r');
		//Open file
		if(file_exists($File)){
			//Insert data
			while($Linea=fgets($Manejador)){ 
				$SQL='INSERT INTO MetaStockPrices VALUES (';
				$Valores = explode("	", $Linea);
				$QUERY = $SQL."'".$Valores[0]."'".",".$Valores[1].");";
				//Insert data
				enviarQuery($Con,$QUERY);
			}
			//Close file
			fclose($Manejador); 
			return $QUERY;  	
		}else{
			return NULL;
		}
		
	}

		  
	function obtainInfo5($Con){
		$File="DataTables/microsoftStock.txt";
		$Manejador=fopen($File, 'r');
		//Open file
		if(file_exists($File)){
			//Insert data
			while($Linea=fgets($Manejador)){ 
				$SQL='INSERT INTO MicrosoftStockPrices VALUES (';
				$Valores = explode("	", $Linea);
				$QUERY = $SQL."'".$Valores[0]."'".",".$Valores[1].");";
				//Insert data
				enviarQuery($Con,$QUERY);
			}
			//Close file
			fclose($Manejador); 
			return $QUERY;  	
		}else{
			return NULL;
		}
		
	}	

	function enviarQuery($Con, $QUERY){
		$SQL=$QUERY;
		return mysqli_query($Con, $SQL);
	}



//Crear tabla
	//Conectar al SMBD
	$Con = mysqli_connect("localhost","root","","pronosticos");
	$SQL1='CREATE TABLE DolarPrices (
		Periodo date,
		Frecuencia decimal(10,5)
	);';
	$SQL2='CREATE TABLE AppleStockPrices (
		Periodo date,
		Frecuencia decimal(10,5)
	);';
	$SQL3='CREATE TABLE BitcoinPrices (
		Periodo date,
		Frecuencia decimal(10,5)
	);';
	$SQL4= 'CREATE TABLE MetaStockPrices (
		Periodo date,
		Frecuencia decimal(10,5)
	);';
	$SQL5='CREATE TABLE MicrosoftStockPrices (
		Periodo date,
		Frecuencia decimal(10,5)
	);';
	enviarQuery($Con, $SQL1);
	enviarQuery($Con, $SQL2);
	enviarQuery($Con, $SQL3);
	enviarQuery($Con, $SQL4);
	enviarQuery($Con, $SQL5);
	obtainInfo1($Con);
	obtainInfo2($Con);
	obtainInfo3($Con);
	obtainInfo4($Con);
	obtainInfo5($Con);

	header( "refresh:2; url=form.php" );
?>