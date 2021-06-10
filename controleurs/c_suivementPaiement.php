<?php
include 'vues/v_sommaireComptable.php';
$action = $_REQUEST['action'];
$mois = getMois(date("d/m/Y"));

/* Problème variable $mois : Retourne type "le" ; attendu "String" */
$numAnnee = substr($mois,0,4);
$numMois = substr($mois,4,2);
$idVisiteur = $_SESSION['idVisiteur'];

switch ($action) {

    case 'consulterPaiement': {
        $lesFiches=$pdo->getFicheValide();
        include("vues/v_fichefrais.php");
        break;
    }

    case 'checkout': { // voir le detail d'une fiche de frais avant de payer
        // getInfoFicheValide : 
        // Récupère les informations d'une fiche valide
        $idFiche = $_REQUEST['id'];
        $lesFiches = $pdo->getInfoFicheValide($idFiche);
        $lesFraisForfait = $pdo->getInfosFraisParFiche($idFiche);
		$lesFraisForfaits = $pdo->getLesFraisForfait($idFiche,$mois);
		$lesFraisHorsForfaits = $pdo->getLesFraisHorsForfait($idFiche,$mois);
		include("vues/v_checkout.php");
		break;
    }

    case 'payer': { // met la fiche à l'état MP ('Mise en Paiement')
        $idFiche = $_REQUEST['id'];
        $pdo->mettreEnPaiement($idFiche);
        $lesFiches = $pdo->getFicheValide();
        include 'vues/v_ficheFrais.php';
        break;
    }
}