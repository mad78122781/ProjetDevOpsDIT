<?php
	include 'connxionBD.php';
    try{				
		$nom = $_POST['nom'];
		$lieux = $_POST['lieux'];
		$id_localite = $_POST['id_localite'];
        $sql = "INSERT INTO etablissement( ID_LOCALITE, NOM_ETABLISSEMENT, LIEUX_ETABLISSEMENT) VALUES ($id_localite,'$nom','$lieux')";
                
        $dbco->exec($sql);
        echo ($nom.' a été bien ajouté dans la base de donnée. ');
		echo "<br>";
        }
            
        catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
        }
?>

<?php
	try{		
                /*Sélectionne les valeurs dans les colonnes prenom et mail de la table
                 *users pour chaque entrée de la table*/
                $sth = $dbco->prepare("SELECT e.NOM_ETABLISSEMENT,e.LIEUX_ETABLISSEMENT,l.NOM_LOCALITE FROM etablissement as e INNER JOIN localite as l ON l.ID_LOCALITE = e.ID_LOCALITE");
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

	<table border="1">
		  <tr>
			<th>Etablissement</th>
			<th>Localité</th>
			<th>Lieux</th>
		  </tr>
		  
		  <?php foreach ($resultat as $value){?>
		  <tr>
			<td><?php echo($value['NOM_ETABLISSEMENT']) ?></td>
			<td><?php echo($value['NOM_LOCALITE']) ?></td>
			<td><?php echo($value['LIEUX_ETABLISSEMENT']) ?></td>
		  </tr>
		  <?php }?>
		  
		</table>