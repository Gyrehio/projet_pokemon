# Informations liées au projet de Développement Web de Victor Loiseau - **Étape 3**

## Présentation du projet

Ce projet consiste en la création d'une application de gestion de Pokémons, le tout se basant notamment sur la définition de classes `Pokemon` et `Type`.

<br>

## Comment faire fonctionner l'application

Pour faire fonctionner l'application, il vous suffit de mettre le dossier contenu dans l'archive à la racine même de votre serveur Web, que ce soit par le biais d'un XAMPP ou bien d'un Docker.

De plus, il est important de noter qu'il vous faudra également entrer les informations liées à votre serveur Web afin d'accéder à votre session PHPMyAdmin afin de mettre en place les bases de données. Cela est nécessaire au sein des fonctions `getBdd` situées dans les fichiers `Pokemon.php` ainsi que `Type.php`.

<br>

## Contenu du fichier

Cette archive est composée des différents sous-dossiers que voici :

- controller : Contient l'ensemble des scripts PHP nécessaires au bon fonctionnement des contrôleurs.
  
- database : Contient un fichier SQL permettant de créer deux bases de données différentes :

  - `pokemon` : Correspond à la base de données fourni en annexe du projet.
  
  - `pokemonFR` : Correspond à une base de données contenant toutes les informations connues à ce jour sur l'ensemble des Pokémons existants, le tout traduit en français.

  > Cette dernière base de données est une fonctionnalité supplémentaire, non demandée initialement pour la création de cette application.

  > Sources des données présentes dans la base de données `pokemonFR` : https://www.pokepedia.fr.

  Notez également que la base de données utilisée durant les prochaines Étapes du projet sera la base de données `pokemonFR`.

- model : Contient l'ensemble des scripts PHP nécessaires à la définition des modèles.

> **Attention** : il sera nécessaire de définir l'identifiant ainsi que le mot de passe vous permettant d'accéder à votre session PHPMyAdmin, afin d'y créer des 2 bases de données utilisées par l'application.

- others : Contient un fichier DTD ainsi qu'un fichier XML, nécessaires à la vue Historisation.

- public : Contient le script CSS définissant le style de l'ensemble des pages de l'application, le script JS nécessaire au bon fonctionnement de la vue `Afficher Pokémon` ainsi qu'un logo affiché sur la vue Accueil de l'application.

- view : Contient l'ensemble des scripts PHP nécessaires aux fichiers des vues, gabarit compris.

De plus, cette archive contient également à sa racine un script nommé `index.php`, qui s'occupe notamment de gérer les routes d’accès aux différentes pages et fonctions.

Enfin, elle contient également ce fichier `README.txt`, contenant toutes les informations liées aux fichiers permettant le bon déploiement de cette application, ainsi que l'état actuel de cette dernière.

<br>

## État actuel de l'application

À l'issue de cette **Étape 3**, l'application répond bien à une implémentation respectant la modélisation MVC (Modèle-Vue-Contrôleur).

Pour le moment, l'application est constituée de 6 potentielles pages pouvant être afficher, à savoir :

- Une page `Accueil`, accessible en tant que page par défaut de l'application, affichant un message de bienvenue à tout nouvel utilisateur. Celle-ci est fonctionnelle.

- Une page `Test Français`, ayant pour but d'afficher un tableau brut de l'ensemble des Pokémons présents dans la base de données `pokemonFR`. Veuillez noter également de chaque Pokémon affiché possède un tableau contenant son ou ses types. Celle-ci est fonctionnelle.

> Cette page n'était pas demandée initialement dans le sujet et relève d'une fonctionnalité supplémentaire.

- Une page `Test Original`, ayant pour but d'afficher un tableau brut de l'ensemble des Pokémons présents dans la base de données `pokemon`. Veuillez noter également de chaque Pokémon affiché possède un tableau contenant son ou ses types. Celle-ci est fonctionnelle.

- Une page `Modifier Pokémon`, qui aura pour but de modifier la base de données même où sont stockées les informations de taille et de poids associées à chaque Pokémon. Cette page est fonctionnelle.

> Précision : Une requête sera acceptée si la taille du Pokémon est comprise entre 0 et 500, et le poids compris entre 0 et 9999. Si la requête est acceptée, un message sera renvoyée sur la page `Modifier Pokémon` pour le confirmer. Le formulaire sera réinitialisé dans tous les cas.

- Une page `Historisation`, qui affichera l'ensemble des opérations qui auront été effectuées par le biais de la base de données chargée au préalable. Ces opérations seront horodatées, et affichées par type (modification, affichage ou autre). Cette page est fonctionnelle.

- Une page `Afficher Pokémon`, qui affichera l'ensemble des Pokémons de la base de données possédant un type sélectionné par l'utilisateur. Cette page est fonctionnelle, à l'exception près qu'il n'y a pas d'ajout à l'historique lors du chargement de tous les Pokémons d'un type chosii par le biais du menu déroulant.

> Note supplémentaire : il est possible de cliquer sur le nom d'un Pokémon afin d'afficher sa page d'informations issue du site `Poképédia`. Cette fonctionnalité n'était pas demandée initialement.

L'ensemble de ses pages chargent un gabarit, correspondant à une barre de menu permettant de sélectionner chacune des 6 pages, un contenu spécifique directement lié au type de page sélectionné, ainsi que d'une barre affichant diverses informations, telles que la promotion chargée d'effectuer ce projet ou bien l'heure de chargement de la page demandée par l'utilisateur. 

