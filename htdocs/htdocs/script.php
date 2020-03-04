<?php

if (($handle = fopen("db.csv", "r")) !== FALSE) {//1
	$i=0;

	$array_nomi_scuole=array('RODARI','DE AMICIS','COLLODI','MILANI','GALILEI','MONTALE','MARCONI','DA VINCI','GIOVANNI XXIII','ALIGHIERI','FERMI','MORO','PASCOLI','BOSCO','MANZONI','PERTINI','VOLTA','CALVINO','MAJORANA','EINAUDI','DE GASPERI','BATTISTI','CARDUCCI');

    while (($data = fgetcsv($handle, 1000, ';')) !== FALSE){//2

		$data[6]=check_nome($data[6],$array_nomi_scuole);

		if((strpos($data[3],'EMILIA'))!==false){
			$data[3]='EMILIA-ROMAGNA';}
		if((strpos($data[8],'Non Disponibile'))!==false){
			$data[8]='NORMALE';}
			
        $map[] = array(   'id'  => $data[0],
						'anno'        => $data[1],
                        'area'    => $data[2],
                        'regione'        => $data[3],
                        'provincia'    => $data[4],
                        'codScu'    => $data[5],
                        'denoScu'    => $data[6],
						'descrComune'    => $data[7],
                        'descrCarattScuola'    => $data[8],
                        'descTipoGrScuola'    => $data[9],
						'alunnimaschi'  => $data[10],
						'alunnifemmine'  => $data[11],
						'totalunni'  => $data[12],
						'maschiregione'  => $data[13],
						'femmineregione'  => $data[14],
						'totregione'  => $data[15]
                );
}//2
            $output = fopen("dw.csv",'w') or die("Can't open file");
            foreach($map as $product) {
                fputcsv($output, $product,";",chr(127));
            }
            fclose($output) or die("Can't close output file");
			fclose($handle) or die("Can't close handle file");
			

require("create.php");
$databasehost = "localhost"; 
$databasename = "dw_scuola"; 
$databasetable = "dw"; 
$databaseusername="root"; 
$databasepassword = ""; 
$fieldseparator = ";"; 
$lineseparator = "\n";
$csvfile = "dw.csv";
create();
if(!file_exists($csvfile)) {
   header("Location: colorlib-error-404-4\index.html");
}

try {
    $pdo = new PDO("mysql:host=$databasehost;dbname=$databasename", 
        $databaseusername, $databasepassword,
        array(
            PDO::MYSQL_ATTR_LOCAL_INFILE => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        )
    );
} catch (PDOException $e) {
    header("Location: connect\index.html");
}
$affectedRows = $pdo->exec("
    LOAD DATA LOCAL INFILE ".$pdo->quote($csvfile)." REPLACE INTO TABLE `$databasetable`
      FIELDS TERMINATED BY ".$pdo->quote($fieldseparator)."
     LINES TERMINATED BY ".$pdo->quote($lineseparator));

	header("Location: complete\index.html");

$myfile="C:/xampp/htdocs/db.csv";
   unlink($myfile) or die("Couldn't delete file");
$myfile="C:/xampp/htdocs/dw.csv";
   unlink($myfile) or die("Couldn't delete file");  
   }else{//1
   header("Location: colorlib-error-404-4\index.html");
}


function check_nome($nomeScuola,$arrayNomi){
	for($i=0; $i <count($arrayNomi) ; $i++){
		if(strpos($nomeScuola,$arrayNomi[$i])!== false){
			$nomeScuola=$arrayNomi[$i];
			return $nomeScuola;
		}
	}
	return $nomeScuola;
}

?>


