
<p>
    Etat : <?php echo $libEtat ?> depuis le <?php echo $dateModif ?> <br> Montant validé : <?php echo $montantValide ?>


</p>

    <form method="POST"  action="index.php?uc=ValiderFrais&action=validerMajElementForfait">
        
        <div class="corpsForm">
        <p>
            <b>Fiche de</b> : <?php foreach ($lesVisiteurs as $unVisiteur):
                if($unVisiteur['id']==$leVisiteur):
                    echo $unVisiteur['nom']." ".$unVisiteur['prenom'];
                endif;
            endforeach;
                ?>
        </p>
            <fieldset>
                <legend>Eléments forfaitisés</legend>
                <?php
                $cumul = 0;
                foreach ($lesFraisForfait as $unFrais) {
                    $idFrais = $unFrais['idfrais'];
                    $libelle = $unFrais['libelle'];
                    $quantite = $unFrais['quantite'];
                    ?>
                    <p>
                        <label for="idFrais"><?php echo $libelle ?></label>
                        <input type="text" id="idFrais" name="lesElements[<?php echo $idFrais ?>]" size="10" maxlength="5" value="<?php echo $quantite ?>" >
                    </p>
                    <?php
                }
                ?>

            </fieldset>
            
        </div>
        <div class="piedForm">
            <p>
                <input id="ok" type="submit" value="Valider" size="20" />
                <input id="annuler" type="reset" value="Effacer" size="20" />
            </p> 
    </form>

        
    <table class="listeLegere">
        <caption>Descriptif des éléments hors forfait -<?php echo $nbJustificatifs ?> justificatifs reçus -
        </caption>
        <tr>
            <th class="date">Date</th>
            <th class="libelle">Libellé</th>
            <th class='montant'>Montant</th>   
            <th class='rejet'>Rejet</th> 
        </tr>

        <?php
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $date = $unFraisHorsForfait['date'];
            $libelle = $unFraisHorsForfait['libelle'];
            $montant = $unFraisHorsForfait['montant'];
            $id = $unFraisHorsForfait['id'];
            ?>

                <tr>
                    <td><?php echo $date ?></td>
                    <td><?php echo $libelle ?></td>
                    <td><?php echo $montant  ?></td>
                    <?php
                    if ($libelle == preg_match("#REFUSER#", $libelle)) {
                        ?>
                    <td>
                        <form action="index.php?uc=ValiderFrais&action=refuserFrais" method="post">
                        <input id="id" type="submit" value="Refuser" />
                        <input type="hidden" name="libelle" value="<?php echo $libelle; ?>"/>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        </form>
                    </td>
                <?php
                    }
                    ?>
                </tr>

        <?php
        }
        ?>
    </table>
        <form method="POST"  action="index.php?uc=ValiderFrais&action=validationFrais">
    <input id="Valider" type="submit" value="Valider la fiche"/> 
    </form>
    </div>
    
