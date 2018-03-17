# Utilisation

### Setup
```
bin/validate.sh
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

On utilise la terminaison localhost pour éviter problèmes de https dans les dernières versions des navigateurs.

Utiliser:
```
http://uqam.app.localhost:8000/
```