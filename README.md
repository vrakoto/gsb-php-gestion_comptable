# Galaxy Swiss Bourdin

<img src="https://camo.githubusercontent.com/de39a83b4f2d7d7214dad8e79e91f204b6a61e2b505ef8c9691e73e22057a577/68747470733a2f2f696d6775722e636f6d2f79544d646c684b2e706e67" alt="Icone GSB">

Projet Personnel Encadré développé dans le cadre d'un BTS SIO spécialité Solutions Logicielles et Applications Métiers.

# Introduction

Code PHP de l'application sur notre dépots Git, local et distant (sourceforge) :

- Installer Netbeans
- Installer Apache UwAmp
- Cloner le projet GSBapplication de remboursement des frais (une partie du projet a déjà été réalisé) via NetBeans qui dispose de Git.

<br>

Code SQL fourni dans le dossier :

- Les scripts de création des tables de la base de données MySQL
- L'outil de génération de fiches de frais (peuplé la base de donné)
<br>
En plus du code PHP, il faut créer la base de donnees GSB et créer un jeu d'essai.

<br>
<br>


<b>1- Créer la base de données MySQLavec PHPMyAdmin.</b>
<ul>
  <li> Créer la base GSB vide, selectionner la base GSB</li>
  <li> Importer-executer les  scripts de création des tables</li>
</ul>
  
<b>2- Peupler la base de données avec l'outil de génération de fiches de frais</b>

- Suivre GSB-generationDonnees-consignes, utiliser GSB-generationDonnees.rar

<b>3- Exécuter l'application dans un navigateur</b>

- Repérer dans le code les paramètres de connexion à la base de données
- Corriger au besoin


<b>4- Se connecter en tant que visiteur (exemple cbedos/gmhxd)</b>




# Cas comptable

<b>Développement des cas d'utilisation des comptables</b>

<ul>
    <li>Prendre connaissance des cas d'utilisation comptables</li>
    <li>Maquetter les écrans comptables</li>
    <li>Repérer les éléments du code fourni qui sont réutilisbles</li>
    <li>Coder et tester les cas d'utilisation des comptables</li>
</ul>

Base de données, ajout du role Comptable :
L'idée est d'ajouter les comptables dans la base de données. Pour cela on va les ajouter dans
la table visiteur.
- renommer la table visiteur en utilisateur
- ajouter une colonne nommée role à la table, elle peut prendre deux valeurs 'V' ou
'C' (visiteur ou comptable)
- mettre toutes les lignes à 'V' (pour l'instant ce sont tous des visiteurs)
- ajouter un comptable
- refaire marcher le projet.

Connexion et écran comptable :
Il faut présenter un menu différent aux comptables 
- ajouter la colonne role dans getInfosVisiteur  ***DANS LA REQUETE SQL*** 
- coder un if dans c_connection.php qui appelle une nouvelle vue
- pour la lisibilité du code, renommer getInfosVisiteur en getInfosUtilisateur
Pour cela utiliser Netbeans : clic droit sur le nom de la fonction et refactor->rename.
Tous les appels à la fonction seront renommés.
- Tester

UC validerFichesFrais choix de la fiche
La page qui correspond le mieux chez les visiteurs est c_etatFrais.php
- Étudier cette page
- copier en c_ValiderFrais (pour les comptables)
- ajouter dans le formulaire un nouveau <select> pour afficher tous les visiteurs
- modifier le <select> du mois : il faut afficher les 6 derniers mois ! ! !


*******NB warning datetimezone //possible avec une installation sur uwAmp *****
pour enlever ce warning, ajouter au tout début du controleur principal de gsbMVC (index.php) la ligne
date_default_timezone_set('Europe/Paris');
