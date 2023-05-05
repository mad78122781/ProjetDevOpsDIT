<?php
	include 'connxionBD.php';
	try{		
                /*Sélectionne les valeurs dans les colonnes prenom et mail de la table
                 *users pour chaque entrée de la table*/
                $sth = $dbco->prepare("SELECT etablissement.nom_etab,departement.nom_dep FROM etablissement
                    inner JOIN commune ON commune.Id_commune=etablissement.Id_commune
                    inner JOIN departement ON departement.Id_departement=commune.Id_departement
                    WHERE departement.departement ='Dakar';");
                $sth->execute();
                
                /*Retourne un tableau associatif pour chaque entrée de notre table
                 *avec le nom des colonnes sélectionnées en clefs*/
                $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
                
                /*print_r permet un affichage lisible des résultats,
                 *<pre> rend le tout un peu plus lisible*/
            
				 // print_r($resultat);
                echo '</pre>';
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
?>

<html>

	<head>
	<title>Page Title</title>
	</head>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<body>
		<table border="1">
		  <tr>
			<th>NOM DEPARTEMENT</th>
			<th>NOM DEPARTEMENT</th>
		  </tr>
		  
		  <?php foreach ($resultat as $value){?>	

		  <tr>
			<td><?php echo($value['NOM_ETABLISSEMENT']) ?></td>
			<td><?php echo($value['NOM_DEPARTEMENT']) ?></td>
		  </tr>
		  <?php }?>
		  
		</table>
		<a href="index.php">
			<button type="submit" class="btn btn-primary">Precedent</button>
		</a>
	</body
	
</html>