<?php 
    foreach ($lesFiches as $uneFiche):
        $prenom = $uneFiche['prenom'];
        $nom = $uneFiche['nom'];
		$id = $uneFiche['idVisiteur'];
		$etat = $uneFiche['idEtat'];
		$nbJustificatifs = $uneFiche['nbJustificatifs'];
		$montant = $uneFiche['montantValide'];
		$date = $uneFiche['dateModif'];
    ?>

<div id="contenu">
    <h2 style="text-align: center">Fiche frais de : <?= "$nom $prenom"?></h2>

    <?= '<table>
            <th>Id </th>
            <th>Etat fiche </th>
            <th>Nombres justificatif </th>
			<th>Montants valides </th>
			<th>dateModif</th>
                
            <tr>
                <td>'.$id.'</td>
                <td>'.$etat.'</td>
                <td>'.$nbJustificatifs.'</td>
				<td>'.$montant.'</td>
				<td>'.$date.'</td>
            </tr>
        </table>
        '
    ?>

	<br><br>
	<?php
		echo "<h2>Consitution du montant total :</h2>";
		echo '<table>
		<th>Forfait Etape</th>
		<th>Total Frais au Forfait</th>
		<th>Total Frais Hors Forfait</th>';
		
		foreach ($lesFraisForfait as $unFrais){
			$forfaitEtape = $unFrais['montant'];
						
			echo '<tr class="ficheComptable">
					<td>'.$forfaitEtape.'</td>
				 </tr>';
		}


		foreach ($lesFraisHorsForfaits as $unFraisHorsForfait) {
			$totalHorsForfait = $unFraisHorsForfait['montant'];

			echo '<tr class="ficheComptable">
			<td>'.var_dump("Montant Hors forfait : " . $totalHorsForfait).'</td>
			</tr>';
		}
	?>
	  </table><br><br>

    <br>
    <a href=index.php?uc=suivementPaiement&action=consulterPaiement>Retour</a>
<?php var_dump($lesFraisForfait);
		echo "<h2>Frais Forfaitisés visu :</h2>";
		echo '<table>
		<th >libelle</th>
		<th>Quantite</th>
		<th>Montant</th>';
		
		foreach ($lesFraisForfait as $unFrais){
			$libelle = $unFrais['libelle'];
			$quantite = $unFrais['quantite'];
			$montant = $unFrais['montant'];
						
			echo '<tr class="ficheComptable">
					<td>'.$libelle.'</td>
					<td>'.$quantite.'</td>
					<td>'.$montant.'</td>
				 </tr>';
		}
	?>
	  </table><br><br>
	<?php
		echo	"<h2>Frais Hors Forfaits :</h2>";
		echo	'<table>
					<th>Libelle  </th>
					<th>Montant  </th>
					<th>Date</th>';

		foreach ($lesFraisHorsForfaits as $unFraisHorsForfait){
			$libelle = $unFraisHorsForfait['libelle'];
			$montant = $unFraisHorsForfait['montant'];
			$date    = $unFraisHorsForfait['date'];
			
			echo '<tr class="ficheComptable">
					<td>'.$libelle.'</td>
					<td>'.$montant.'</td>
					<td>'.$date.'</td>
				 </tr>';
		}	
		?>
<?php endforeach ?>
</div>