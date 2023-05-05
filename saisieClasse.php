<!DOCTYPE html>
<html>

	<head>
	<title>Page Title</title>
	</head>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<body>
		<form method='POST' action='classe.php'>
			<div >
			<label name="nom">Niveau: </label>
			<input type="text" id="niveau" name="niveau" placeholder="Niveau" required>
			<label name="anne">Année Scolaire: </label>
			<input type="text" id="anne" name="anne" placeholder="Année Scolaire" required>
		  </div>
		  <?php
	include 'connxionBD.php';
	try{		
                $sth = $dbco->prepare("SELECT * FROM etablissement;");
                $sth->execute();
                
                $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
                echo '</pre>';
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
?>
		  <select name="id_etablissement" id="etab">
		  <?php foreach ($resultat as $value){
			echo '<option value="'.$value['ID_ETABLISSEMENT'].'">' . $value['ID_ETABLISSEMENT'] . '</option>';
		  
		  }?>
		  </select>
		  
		   <button type="submit" class="btn btn-primary">Enregistrer</button>

		</form>
		
	</body
	
</html>