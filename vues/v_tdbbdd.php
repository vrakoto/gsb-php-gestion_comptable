<h1>Tableau de bord - bdd </br>
    Statistiques base MySQL GSB
</h1>

<h3>
    nombre de visiteurs = <?php echo $nbVisiteurs; ?>
</h3>

<?php
/* foreach ($montantFraisForfait as $unMontant) {
  echo $unMontant['libelle'];
  echo ' : ';
  echo $unMontant['montant'];
  echo '</br>';
  } */
?>
 
<table>
    <tr>
        <td>
        <?php
        foreach ($montantFraisForfait as $unMontant) {
            echo $unMontant['libelle'];
            echo $unMontant['montant'];
            echo '</br>';
        }
        ?>
        </td>
    </tr>
</table>

<select>
    <?php
        foreach ($montantFraisForfait as $unMontant) {
            echo $unMontant['libelle'];
            echo $unMontant['montant'];
            echo '</br>';
        }
        ?>
</select>