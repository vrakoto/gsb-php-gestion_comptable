<?php

$action = $_REQUEST['action'];
switch ($action) {
    case 'php': {
        //fournit des variables d'environnement
            
            $httpd = $_SERVER['SERVER_SOFTWARE'];
            $hote = $_SERVER['SERVER_NAME'];
            $port = $_SERVER['SERVER_PORT'];
            include("vues/v_tdbphp.php");
            break;
    }
    case 'bdd': {
        //fournit des données statistiques de ma base MySQL GSB
        //1- le nombre de visiteurs (integer: il n'y a qu'un seul nombre)
        $nbVisiteurs = $pdo->getNbVisiteurs();
        //2- le montant des frais forfaitaires (array: il y a 4 frais)
        $montantFraisForfait = $pdo->getMontantFraisForfait();
        
        include("vues/v_tdbbdd.php");
        break;
    }
}
?>
