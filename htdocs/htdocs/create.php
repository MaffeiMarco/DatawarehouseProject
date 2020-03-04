 <?php
 function create(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dw_scuola";

// Create connection
$link =mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS dw (
ID INT(10) NOT NULL PRIMARY KEY,
ANNOSCOLASTICO INT(6),
AREAGEOGRAFICA VARCHAR(12),
REGIONE VARCHAR(17),
PROVINCIA VARCHAR(21),
CODICESCUOLA VARCHAR(10),
DENOMINAZIONESCUOLA VARCHAR(46),
DESCRIZIONECOMUNE VARCHAR(30),
DESCRIZIONECARATTERISTICASCUOLA VARCHAR(20),
DESCRIZIONETIPOLOGIAGRADOISTRUZIONESCUOLA VARCHAR(49),
ALUNNIMASCHI 	int(3) ,
ALUNNIFEMMINE 	int(3),
TOTALUNNI 	int(11),
MASCHIREGIONE int(6),
FEMMINEREGIONE 	int(6) ,
TOTREGIONE 	int(11)
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
 }
?> 