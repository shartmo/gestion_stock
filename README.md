## SCRIPT PHP POUR LA GESTION DE STOCKS ##

Ce petit programme est optimisé pour une utilisation sur smartphone.

#### INSTALLATION ####

Ce script nécessite php version 7.4 minimum.

Il faut activer le cas échéant les extensions nécessaires (pdo ...) au fonctionnement de la base de données.

Le seul fichier à renseigner est le fichier config.php.

#### LA BASE DE DONNEES ####
Elle ne contient que deux tables.

La table articles est alimentée à partir du script.

**La table secteurs est à renseigner directement dans la bd (via phpmyadmin par exemple).**

Cette table secteurs permet de classer les articles par catégorie.

Dans la table secteur, pour ajouter une catégorie, indiquer un libellé dans le champ "nom", et attribuer une lettre dans le champ "sigle".

La base de données est chargée avec quelques exemples.

#### FONCTIONNEMENT ####

Pour accéder à la page d'accueil du programme : http://votre_nom_de_domaine/chemin_acces_au_script/


