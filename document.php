<?php
	include 'connxionBD.php';
    try{		
		if ($_POST['typeTrimestre'] == 'Premier Semestre') {
			 $trimestre=1;
			 echo("trimestre==".$trimestre);
		}

		if ($_POST['typeTrimestre'] == "Deuxieme Semestre") {
					 $trimestre=2;
					 echo("trimestre==".$trimestre);
		}
		echo($trimestre);
		$Nomdoc = $_POST['Nomdoc'];
		$date = $_POST['date'];
		$nomdocument = $_FILES['document']['name'];
		$file_tmp_name = $_FILES['document']['tmp_name'];
		move_uploaded_file($file_tmp_name,"./document/$nomdocument");
		
        $sql = "INSERT INTO documment(ID_SEMETRE,TYPE_DOC,NOM_DOC,DATE	) VALUES ($trimestre,'$Nomdoc','$nomdocument','$date')";
        echo ($nomdocument.' a été bien ajouté dans la base de donnée avec succes. ');
        $dbco->exec($sql);
        }
            
        catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
        }
		
		
?>

<?php
	try{		
                $sth = $dbco->prepare("SELECT d.TYPE_DOC as 'Type Document',d.NOM_DOC as 'Nom Document', d.DATE FROM documment as d;");
                $sth->execute();
                
                $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
                
            
				 // print_r($resultat); 
                echo '</pre>';
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
?>
<html>
	<table border="1">
		  <tr>
			<th>Type Document</th>
			<th>Nom Document</th>
			<th>DATE</th>
		  </tr>

		  <?php foreach ($resultat as $value){?>
		  <tr>
			<td><?php echo($value['Type Document']) ?></td>
			<td><?php echo($value['Nom Document']) ?></td>
			<td><?php echo($value['DATE']) ?></td>
		  </tr>
		  <?php }?>
		  
		</table>
		</table>
		
		<a href="saisieDocument.php">
			<button type="submit" class="btn btn-primary">Revenir a saisie document</button>
		</a>
		
		<a href="index.php">
			<button type="submit" class="btn btn-primary">Acceuil</button>
		</a>
</html>