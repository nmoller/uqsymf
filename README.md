# Utilisation

### Setup
```
bin/validate.sh
# votre mot de passe sera demandé pour sudo nécessaire à écriture de /etc/hosts
```
Partir docker-compose
```
docker-compose up -d
```
Corriger permissions
```
bin/setPermissions
```

Ces deux bin (validate et setPermissions) seront lancés lors de la première execution.

#### Installer dépendences
Pour installer les dépendences (vendor dans symfony):
```
bin/composer install
```

### Symfony bin/console

Pour rouler `bin/console` dans le container symfony.

## Travailler
On a modifié app_dev.php de symfony pour que l'adresse de dev soit reconnue pour voir debouge:
```
http://uqam.app.localhost:8000/app_dev.php/
```
On utilise la terminaison localhost pour éviter problèmes de https dans les dernières versions des navigateurs.

Utiliser:
```
http://uqam.app.localhost:8000/
```

Pour visualiser les mails:
```
http://0.0.0.0:1080/
```
on peut s'assurer que le tout fonctionne en faisant:
```
bin/console swiftmailer:email:send --from=test@test.com --to=nmoller.c@gmail.com
```

## Frontend dev

Initialiser:
```
docker-compose run nodejs npm install
```

La config nécessaire a été enregistrée dans webpack.config.js

Avec la version 4 de webpack, on a des erreurs... Cela va sûrement évoluer.

https://symfony.com/doc/3.4/frontend/encore/bootstrap.html

Tous les éléments ont été ajoutés dans le fichier package.json pour npm.

```
docker-compose run nodejs /src/node_modules/.bin/encore dev
# Pour produire les assets de prod: (tout est minimisé)
docker-compose run nodejs /src/node_modules/.bin/encore production
```