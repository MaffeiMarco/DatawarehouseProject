<?php
$myfile="C:/xampp/htdocs/db.csv";
if(!file_exists($myfile)) {//1
/* vars for export */
// filename for export
$csv_filename = 'db.csv';
// database variables
$hostname = "localhost";
$user = "root";
$password = "";
$fieldseparator = ";"; 
$lineseparator = "\n";
$port = 3306;
$database = "db_scuola";
$destination="C:/xampp/htdocs/db.csv";
try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", 
        $user, $password,
        array(
            PDO::MYSQL_ATTR_LOCAL_INFILE => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        )
    );
} catch (PDOException $e) {
    header("Location:connect/index.html");
}
$affectedRows = $pdo->exec("select db_scuole.ID,tab_alunni.ANNOSCOLASTICO,db_scuole.AREAGEOGRAFICA,db_scuole.REGIONE,db_scuole.PROVINCIA,tab_alunni.CODICESCUOLA,db_scuole.DENOMINAZIONESCUOLA,db_scuole.DESCRIZIONECOMUNE,db_scuole.DESCRIZIONECARATTERISTICASCUOLA,db_scuole.DESCRIZIONETIPOLOGIAGRADOISTRUZIONESCUOLA,tab_alunni.ALUNNIMASCHI,tab_alunni.ALUNNIFEMMINE,tab_alunni.TOT as TOTALUNNI, regioni.TotaleMaschi as MASCHIREGIONE, regioni.TotaleFemmine as FEMMINEREGIONE, regioni.Tot as TOTREGIONE
into outfile".$pdo->quote($destination)." FIELDS TERMINATED BY ".$pdo->quote($fieldseparator)."
 LINES TERMINATED BY ".$pdo->quote($lineseparator)." FROM (SELECT db_alunni.ANNOSCOLASTICO, db_alunni.CODICESCUOLA, sum(db_alunni.ALUNNIMASCHI)as ALUNNIMASCHI,sum(db_alunni.ALUNNIFEMMINE) AS ALUNNIFEMMINE, sum(db_alunni.TOT ) AS TOT FROM db_alunni GROUP BY db_alunni.CODICESCUOLA, db_alunni.ANNOSCOLASTICO ) tab_alunni, db_scuole, regioni
WHERE tab_alunni.ANNOSCOLASTICO =db_scuole.ANNOSCOLASTICO 
AND db_scuole.CODICESCUOLA=tab_alunni.CODICESCUOLA 
and db_scuole.REGIONE=regioni.Regione 
and db_scuole.ANNOSCOLASTICO=regioni.Anno and 1 ORDER BY 1" );
header("Location:script.php");
}else{//1
	unlink($myfile) or die("Couldn't delete file");
	/* vars for export */
// filename for export
$csv_filename = 'db.csv';
// database variables
$hostname = "localhost";
$user = "root";
$password = "";
$fieldseparator = ";"; 
$lineseparator = "\n";
$port = 3306;
$database = "db_scuola";
$destination="C:/xampp/htdocs/db.csv";
try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", 
        $user, $password,
        array(
            PDO::MYSQL_ATTR_LOCAL_INFILE => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        )
    );
} catch (PDOException $e) {
    header("Location:connect/index.html");
}
$affectedRows = $pdo->exec("select db_scuole.ID,tab_alunni.ANNOSCOLASTICO,db_scuole.AREAGEOGRAFICA,db_scuole.REGIONE,db_scuole.PROVINCIA,tab_alunni.CODICESCUOLA,db_scuole.DENOMINAZIONESCUOLA,db_scuole.DESCRIZIONECOMUNE,db_scuole.DESCRIZIONECARATTERISTICASCUOLA,db_scuole.DESCRIZIONETIPOLOGIAGRADOISTRUZIONESCUOLA,tab_alunni.ALUNNIMASCHI,tab_alunni.ALUNNIFEMMINE,tab_alunni.TOT as TOTALUNNI, regioni.TotaleMaschi as MASCHIREGIONE, regioni.TotaleFemmine as FEMMINEREGIONE, regioni.Tot as TOTREGIONE
into outfile".$pdo->quote($destination)." FIELDS TERMINATED BY ".$pdo->quote($fieldseparator)."
 LINES TERMINATED BY ".$pdo->quote($lineseparator)." FROM (SELECT db_alunni.ANNOSCOLASTICO, db_alunni.CODICESCUOLA, sum(db_alunni.ALUNNIMASCHI)as ALUNNIMASCHI,sum(db_alunni.ALUNNIFEMMINE) AS ALUNNIFEMMINE, sum(db_alunni.TOT ) AS TOT FROM db_alunni GROUP BY db_alunni.CODICESCUOLA, db_alunni.ANNOSCOLASTICO ) tab_alunni, db_scuole, regioni
WHERE tab_alunni.ANNOSCOLASTICO =db_scuole.ANNOSCOLASTICO 
AND db_scuole.CODICESCUOLA=tab_alunni.CODICESCUOLA 
and db_scuole.REGIONE=regioni.Regione 
and db_scuole.ANNOSCOLASTICO=regioni.Anno and 1 ORDER BY 1" );

header("Location:script.php");
}
 
?>






