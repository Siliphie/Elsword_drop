Elsword Drop Tool
1. Présentation du projet

Elsword Drop Tool est une application web dynamique développée avec le framework Laravel 11. Elle permet aux joueurs du jeu Elsword de suivre et de gérer leurs taux de drop d'objets (comme la Barion's Fur) en enregistrant leurs tentatives de runs. L'application propose une gestion complète des utilisateurs (Profil, ERP est le niveau de compte global) et un système de suivi des objets.


2. Prérequis techniques
Pour faire fonctionner ce projet, vous aurez besoin de :


PHP >= 8.3.30

Composer (Gestionnaire de dépendances PHP)


Serveur MySQL avec laragon en lançant apache MySQL et mailbit


3. Installation et Configuration
Installation des dépendances

Bash
composer install

Configuration de la base de données
Copiez le fichier d'exemple : cp .env.example .env.

Modifiez le fichier .env pour configurer votre connexion (exemple pour SQLite):

Lancement des migrations
Pour créer les tables (Utilisateurs et Items) :

Bash
php artisan migrate
4. Lancement de l'application
Pour démarrer le serveur de développement local 

Bash
php artisant serve
L'application sera accessible sur http://127.0.0.1:8000.

5. Architecture et Fonctionnement
L'application respecte strictement le pattern MVC (Model-View-Controller):

Models : Utilisation de l'ORM Eloquent pour User.php et ItemDropRate.php. Les relations sont définies (un utilisateur possède plusieurs drops).

Views : Moteur de template Blade utilisé pour toutes les interfaces (Layout centralisé, formulaires de gestion).

Controllers :


AuthController : Gestion de l'inscription et de la connexion.


ItemDropRateController : Logique CRUD pour la gestion des objets.


ProfileController : Mise à jour sécurisée du profil et suppression du compte.


Admin pour la gestion des entrées utilisateur dans la bdd 

6. Sécurité et Bonnes Pratiques

Protection CSRF 


Hachage des mots de passe : Utilisation de Bcrypt (via Hash::make).


Validation serveur : Toutes les entrées (nom d'item, ERP, mot de passe) sont validées dans les contrôleurs avant traitement.
