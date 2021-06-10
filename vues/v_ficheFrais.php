<div id="contenu">
    <h2>Les fiches de frais validé : </h2>
    <?= '<table>
            <th>Id visiteur</th>
            <th>Mois</th>
            <th>Nom</th>
            <th>Prenom</th>
            ';
        
            
    foreach ($lesFiches as $uneFiche){
        
        $id = $uneFiche['id'];
        $mois = $uneFiche['mois']; 
        $nom = $uneFiche['nom'];
        $prenom = $uneFiche['prenom'];
        
        echo '<tr>
                <td>'.$id.'</td>
                <td>'.$mois.'</td>
                <td>'.$nom.'</td>
                <td>'.$prenom.'</td>
                <td><a href="index.php?uc=suivementPaiement&action=checkout&id='. $id .' ">Détails</a>
                <td><a href="index.php?uc=suivementPaiement&action=payer&id='. $id .' ">Payer</a>
            </tr>';
            '</table>';
    }
    ?>
</div>