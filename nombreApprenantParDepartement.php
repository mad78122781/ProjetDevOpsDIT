<?php
	include 'connxionBD.php';
	try{		
                /*Sélectionne les valeurs dans les colonnes prenom et mail de la table
                 *users pour chaque entrée de la table*/
                $sth = $dbco->prepare("SELECT count(departement.ID_DEPARTEMENT) as 'Nbre Apprenant', departement.NOM_DEPARTEMENT FROM apprenant
                    inner JOIN etablissement ON etablissement.ID_ETABLISSEMENT=apprenant.ID_ETABLISSEMENT
                    inner JOIN commune ON commune.ID_COMMUNE= etablissement.ID_COMMUNE
                    inner JOIN departement ON departement.ID_DEPARTEMENT = commune.ID_DEPARTEMENT
                    GROUP by departement.ID_DEPARTEMENT;");
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
			<th>Apprenant</th>
			<th>Departement</th>
		  </tr>
		  
		  <?php foreach ($resultat as $value){?>	

		  <tr>
			<td><?php echo($value['Nbre Apprenant']) ?></td>
			<td><?php echo($value['DEPARTEMENT']) ?></td>
		  </tr>
		  <?php }?>
		  
		</table>
		<a href="index.php">
			<button type="submit" class="btn btn-primary">Precedent</button>
		</a>
	</body
	
</html>