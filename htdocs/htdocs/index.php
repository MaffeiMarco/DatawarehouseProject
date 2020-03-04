<!DOCTYPE html>
<html>
	<head>
		<title>Script</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet"> 
	</head>
	<body>

		<header>
			<h1>E.T.L.</h1>
			<h2>Extraction, Transformation, Loading</h2>
		</header>

		<section>
				<div id="left">
					<h3>Esporta il tuo database: <i>Scuola</i></h3>
				</div>
				
				<div id="right">
					<input type="submit" id="db_name" value="Esporta" onClick="return ConfirmDownload()" style="position:relative; top: -6px;">
	<script>    				
function ConfirmDownload()
{
  var x = confirm("Sei sicuro di voler scaricare?");
  if (x){
	  window.location.href = "download.php";
  } else
    return false;
}
</script>    
</form>
				</div>
				
	    </section>

	  
	  </section>
	  <div class="footer"><p>Creato da: <strong>Marco Maffei</strong> & <strong>Francesco Moscato</strong>.</p></div>
	</body>

</html>