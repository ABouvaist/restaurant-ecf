## Prérequis
- PHP (version 8.2)
- Composer (version 2.5.5)
- Node.js (version 18.5.0)
- MariaDB 10.6.10

## Installation

1. Clonez le dépôt GitHub :
```
git clone https://github.com/ABouvaist/restaurant-ecf.git
```
4. Accédez au répertoire du projet :
```
cd restaurant-ecf
```
6. Installez les dépendances PHP :
```
composer install
```
8. Installez les dépendances Javascript :
```
npm install
```
10. Copiez le fichier `.env.example` et renommez-le en `.env`. Modifiez les paramètres selon votre configuration.
11. Générez la clé de l'application Laravel :
```
php artisan key:generate
```
13. Créez une nouvelle base de données pour le projet.
14. Mettez à jour les informations de connexion à la base de données dans le fichier `.env`.
15. Exécutez les migrations pour créer les tables de la base de données :
```
php artisan migrate
```
17. Créez les liens symboliques pour le stockage des images :
```
php artisan storage:link
```
19. Créez un compte administrateur et suivez les instructions.
```
php artisan make-admin
```
21. Compilez les assets JavaScript et CSS :
 ```
 npm run dev
 ```

## Exécution

1. Démarrez le serveur de développement Laravel :
```
php artisan serve
```
2. Ouvrez votre navigateur et accédez à l'URL suivante :
   [http://localhost:8000](http://localhost:8000)
3. Vous devriez maintenant voir l'application en cours d'exécution localement.
