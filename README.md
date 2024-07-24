[![EN](https://img.shields.io/badge/lang-en-red.svg)](https://github.com/BeAPI/dsfr/blob/develop/README.EN.md)

# 🇫🇷 WordPress DSFR

## Outils

### Environnement local

Ce dépôt utilise le package [`@wordpress/env`](https://www.npmjs.com/package/@wordpress/env) pour configurer facilement un environnement local pour travailler sur le thème DSFR et les plugins associés.

L'environnement local est disponible à l'URL http://localhost:8888
Vous pouvez utiliser `admin`/`password` pour vous connecter à l'administration.

Vous devrez d'abord installer les dépendances :
```bash
npm install
```

Après l'installation, vous pouvez utiliser la commande `env` pour gérer l'environnement local :
```bash
# Démarrer l'environnement local (disponible à http://localhost:8888)
npm start

# Arrêter l'environnement local
npm run stop

# Réinitialiser la base de données (supprimera toutes les données de manière permanente)
npm run clean

# Supprimer l'environnement local (supprimera toutes les données et fichiers de manière permanente)
npm run destroy
```
