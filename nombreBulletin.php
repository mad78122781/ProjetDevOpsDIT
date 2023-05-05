<?php
	include 'connxionBD.php';
	try{		
        /*Sélectionne les valeurs dans les colonnes prenom et mail de la table
         *users pour chaque entrée de la table*/
        $sth = $dbco->prepare("SELECT COUNT(*) as 'Nbulletin' FROM documment d
            WHERE d.TYPE_DOC ='bulletin';");
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
	<title>Propjet Base de données</title>
	</head>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<body>
		<table border="1">
		  <tr>
			<th>Nombre total de bulletin </th>
		  </tr>
		  
		  <?php foreach ($resultat as $value){?>	

		  <tr>
			<td><?php echo($value['Nbulletin']) ?></td>
		  </tr>
		  <?php }?>
		  
		</table>
		<a href="index.php">
			<button type="submit" class="btn btn-primary">Precedent</button>
		</a>
	</body
	
</html>