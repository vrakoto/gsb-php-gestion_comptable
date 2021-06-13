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

------------------------------------------------------------------------------------
 
# Page de connexion
  
![connexion](https://user-images.githubusercontent.com/25708184/121803000-b8c73100-cc3f-11eb-98c1-4ee65e8b1fd2.JPG)
  
# Connexion en tant que Visiteur
  
![visiteur](https://user-images.githubusercontent.com/25708184/121803002-b95fc780-cc3f-11eb-9069-2ac0e6bb2d70.JPG)
  
# Visiteur => Saisir des fiches de frais qui sera évaluée par le Comptable
  
![visiteur_SaisirFicheFrais](https://user-images.githubusercontent.com/25708184/121803004-b9f85e00-cc3f-11eb-9538-a8cb2a01b6d0.JPG)  
  
# Visiteur => Consulter la liste des fiches de frais saisies par le visiteur en question
  
![visiteur_ConsulterFiche](https://user-images.githubusercontent.com/25708184/121803003-b95fc780-cc3f-11eb-9797-1660c24c34c1.JPG)
  
# Déconnexion et passage à la partie Comptable
  
# Connexion en tant que Comptable
  
![comptable](https://user-images.githubusercontent.com/25708184/121802993-b82e9a80-cc3f-11eb-803e-b97b316cb02a.JPG)
  
# Comptable => Valider une fiche de frais d'un visiteur
  
![comptable_ValiderFiche](https://user-images.githubusercontent.com/25708184/121802995-b8c73100-cc3f-11eb-9abd-6b8dff265ea7.JPG)
  
# Comptable => Affiche uniquement les fiches de frais des 6 derniers mois  
  
![comptable_ValiderFiche-6lastmois](https://user-images.githubusercontent.com/25708184/121802997-b8c73100-cc3f-11eb-8f05-123cab991ade.jpg)
  
# Comptable => Affiche la liste de tous les visiteurs ayant au moins une fiche de frais les 6 derniers moi
  
![comptable_ValiderFiche-listeVisiteurs](https://user-images.githubusercontent.com/25708184/121802998-b8c73100-cc3f-11eb-8591-7128f9fa82f8.png)
  
# Comptable => Suivement du paiement des fiches de frais validé par le Comptable + affiche en détail la constitution de chaque fiche
![comptable_suivrePaiement](https://user-images.githubusercontent.com/25708184/121802994-b82e9a80-cc3f-11eb-856d-ffdd4c757614.JPG)
  
# Schema du projet
![schema](https://user-images.githubusercontent.com/25708184/121803001-b95fc780-cc3f-11eb-9b39-49e0744e0e6b.JPG)
