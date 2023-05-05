<?php
	include 'connxionBD.php';
	try{		
                /*Sélectionne les valeurs dans les colonnes prenom et mail de la table
                 *users pour chaque entrée de la table*/
                $sth = $dbco->prepare("SELECT ap.MATRICULE, ap.NOM, ap.PRENOM, ap.DATE_NAISSANCE, ap.LIEUX_NAISSANCE, ap.EMAIL, ap.TEL, ap.PROFESSION FROM apprenant as ap");
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
			<th>Matricule</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Date Naissance</th>
			<th>Lieux Naissance</th>
			<th>Email</th><th>Telephone</th>
			<th>Profession</th>
		  </tr>
		  
		  <?php foreach ($resultat as $value){?>
		  <tr>
			<td><?php echo($value['MATRICULE']) ?></td>
			<td><?php echo($value['NOM']) ?></td>
			<td><?php echo($value['PRENOM']) ?></td>
			<td><?php echo($value['DATE_NAISSANCE']) ?></td>
			<td><?php echo($value['LIEUX_NAISSANCE']) ?></td>
			<td><?php echo($value['EMAIL']) ?></td>
			<td><?php echo($value['TEL']) ?></td>
			<td><?php echo($value['PROFESSION']) ?></td>
		  </tr>
		  <?php }?>
		  
		</table>
		<a href="index.php">
			<button type="submit" class="btn btn-primary">Precedent</button>
		</a>
	</body
	
</html>