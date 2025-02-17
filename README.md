[![EN](https://img.shields.io/badge/lang-en-red.svg)](https://github.com/BeAPI/dsfr/blob/develop/README.EN.md)

# 🇫🇷 WP DSFR

WP DSFR est un portage en WordPress du Système de Design Français (ou DSFR) sous forme de thème WordPress porté par [`l'agence WordPress Be API`](https://beapi.fr/).

## Installation du thème WordPress et du plugin de Blocks

Vous pouvez télécharger la dernière archive [ici](https://github.com/BeAPI/wp-dsfr/tags). Celle ci contient deux dossiers :

1. Le dossier wp-dsfr-theme à placer dans le dossier `themes`.
2. Le dossier wp-dsfr-blocks à placer dans le dossier `plugins` et à activer dans le backoffice de votre site.

## Comment l'utiliser

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

## Ils utilisent WP DSFR

* [`Hôpital d’Instruction des Armées Bégin`](https://hiabegin.sante.defense.gouv.fr/)

## En savoir plus

Veuillez consulter le [`site de démonstration`](https://www.wp-dsfr.fr/demo/) pour découvrir les fonctionnalités et possibilités de contribution offertes par le thème.

*AVERTISSEMENT : conçu pour faciliter l’identification des sites de l’État français, le DSFR est destiné uniquement aux sites Internet et applications mobiles relevant du périmètre de l’État. Toute autre utilisation est strictement interdite. Pour plus d’informations, consultez les [`conditions générales d’utilisation du DSFR`](https://www.systeme-de-design.gouv.fr/a-propos/conditions-generales-d-utilisation).*
