<?php
include("vues/v_sommaireComptable.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch ($action) {
    case 'selectionnerMois': {
            $lesMois = $pdo->getLesSixDerniersMois();
            $lesVisiteurs = $pdo->getLesVisiteurs();
            // Afin de sélectionner par défaut le dernier mois dans la zone de liste
            // on demande toutes les clés, et on prend la première,
            // les mois étant triés décroissants
            include("vues/v_listeMois_Visiteur.php");
            break;
        }
    case 'voirEtatFrais': {
            $leMois = $_REQUEST['lstMois'];
            $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
            $moisASelectionner = $leMois;
            include("vues/v_listeMois.php");
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
            $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
            $numAnnee = substr($leMois, 0, 4);
            $numMois = substr($leMois, 4, 2);
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif = $lesInfosFicheFrais['dateModif'];
            $dateModif = dateAnglaisVersFrancais($dateModif);
            include("vues/v_etatFrais.php");
            break;
        }
    case 'ficheFrais': {
            //var_dump($_REQUEST);
            $leMois = $_REQUEST['lstMois'];
            $leVisiteur = $_REQUEST['lstVisiteur'];
            $_SESSION['lstMois'] = $leMois;
            $_SESSION['lstVisiteur'] = $leVisiteur;
            $lesMois = $pdo->getLesSixDerniersMois();
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_listeMois_Visiteur.php");
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($leVisiteur, $leMois);
            $lesFraisForfait = $pdo->getLesFraisForfait($leVisiteur, $leMois);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($leVisiteur, $leMois);
            $numAnnee = substr($leMois, 0, 4);
            $numMois = substr($leMois, 4, 2);
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif = $lesInfosFicheFrais['dateModif'];
            $dateModif = dateAnglaisVersFrancais($dateModif);
            include("vues/v_ficheFrais2.php");
            break;
        }
    case 'validationFrais': {
            //var_dump($_REQUEST);
            $leVisiteur = $_SESSION['lstVisiteur'];
            $leMois = $_SESSION['lstMois'];
            $pdo->majEtat($leVisiteur, $leMois);
            $lesMois = $pdo->getLesSixDerniersMois();
            $lesVisiteurs = $pdo->getLesVisiteurs();
            $refuserfrais = $pdo->majligneFraisHorsForfait($leVisiteur);
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($leVisiteur, $leMois);
            $lesFraisForfait = $pdo->getLesFraisForfait($leVisiteur, $leMois);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($leVisiteur, $leMois);
            $numAnnee = substr($leMois, 0, 4);
            $numMois = substr($leMois, 4, 2);
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif = $lesInfosFicheFrais['dateModif'];
            $dateModif = dateAnglaisVersFrancais($dateModif);
            include("vues/v_listeMois_Visiteur.php");
            include("vues/v_ficheFrais2.php");
            break;
        }

    case 'refuserFrais': {
            $lesMois = $pdo->getLesSixDerniersMois();
            $lesVisiteurs = $pdo->getLesVisiteurs();
            $leVisiteur = $_SESSION['lstVisiteur'];
            $leMois = $_SESSION['lstMois'];
            $idFraisHorsForfait = $_REQUEST['id'];
            $lesFraisHorsForfait = $pdo->majligneFraisHorsForfait($idFraisHorsForfait);
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($leVisiteur, $leMois);
            $lesFraisForfait = $pdo->getLesFraisForfait($leVisiteur, $leMois);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($leVisiteur, $leMois);
            $numAnnee = substr($leMois, 0, 4);
            $numMois = substr($leMois, 4, 2);
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif = $lesInfosFicheFrais['dateModif'];
            $dateModif = dateAnglaisVersFrancais($dateModif);
            include("vues/v_listeMois_Visiteur.php");
            include("vues/v_ficheFrais2.php");
            break;
        }

    case 'validerMajElementForfait': {
            $leVisiteur = $_SESSION['lstVisiteur'];
            $leMois = $_SESSION['lstMois'];
            $lesElements = $_REQUEST['lesElements'];
            if (lesQteFraisValides($lesElements)) {
                $pdo->majFraisForfait($leVisiteur, $leMois, $lesElements);
            } else {
                ajouterErreur("Les valeurs des frais doivent être numériques");
                include("vues/v_erreurs.php");
            }
            $lesMois = $pdo->getLesSixDerniersMois();
            $lesVisiteurs = $pdo->getLesVisiteurs();
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($leVisiteur, $leMois);
            $lesFraisForfait = $pdo->getLesFraisForfait($leVisiteur, $leMois);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($leVisiteur, $leMois);
            $numAnnee = substr($leMois, 0, 4);
            $numMois = substr($leMois, 4, 2);
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif = $lesInfosFicheFrais['dateModif'];
            $dateModif = dateAnglaisVersFrancais($dateModif);
            include("vues/v_listeMois_Visiteur.php");
            include("vues/v_ficheFrais2.php");
            break;
        }
}
?>