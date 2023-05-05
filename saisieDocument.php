<!DOCTYPE html>
<html>

	<head>
	<title>Page Title</title>
	</head>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<body>
		<form method='POST' action="document.php" enctype='multipart/form-data'>
			<div >
			<label name="nom">Nom document: </label>
			<input type="text" id="Nomdoc" name="Nomdoc" placeholder="Nom document" required>
			<label name="nom">Document: </label>
			<input type="file" id="document" name="document" placeholder="document" required>
			<label name="anne">Date: </label>
			<input type="Date" id="date" name="date" placeholder="date" >
		  </div>
		  <?php
	include 'connxionBD.php';
	try{		
                $sth = $dbco->prepare("SELECT * FROM semetre;");
                $sth->execute();
                
                $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
                echo '</pre>';
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
?>
		  <label name="anne">Trimestre: </label>
		  <select name="typeTrimestre" id="etab">
		  <?php foreach ($resultat as $value){
			echo '<option value="'.$value['TYPE_SEMETRE'].'">' . $value['TYPE_SEMETRE'] . '</option>';
		  
		  }?>
		  </select>
		 
		   <button type="submit" class="btn btn-primary">Enregistrer</button>

		</form>
		<div >
			<a href="index.php">
				<button type="submit" class="btn btn-primary">Acceuil</button>
			</a>
		</div>
	</body
	
</html>