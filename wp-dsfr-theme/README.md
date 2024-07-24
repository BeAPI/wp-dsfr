[![EN](https://img.shields.io/badge/lang-en-red.svg)](https://github.com/BeAPI/dsfr/blob/develop/wp-dsfr-theme/README.EN.md)

# 🇫🇷 Thème WordPress DSFR

## Principaux outils :

* [Webpack 5](https://webpack.js.org/) : JS, CSS et assets sont construits avec Webpack.
* [Esbuild Loader](https://github.com/privatenumber/esbuild-loader) : pour la transpilation ESNext et TypeScript.
* [Eslint](https://eslint.org/) : pour le style de code JS.
* [Stylelint](https://stylelint.io/) : pour le style de code CSS.
* [CSSNano](https://cssnano.co/) : pour l'optimisation CSS.
* [PostCSS Preset Env](https://github.com/csstools/postcss-preset-env) : pour la compatibilité avec les propriétés CSS modernes.
* [PostCSS PX to REM](https://github.com/cuth/postcss-pxtorem) : pour convertir automatiquement les unités px en rem.
* [PostCSS Sort Media Queries](https://github.com/solversgroup/postcss-sort-media-queries) : pour combiner plusieurs déclarations de media queries similaires.
* [SVGO](https://github.com/svg/svgo) : pour l'optimisation SVG.
* [Image Webpack Loader](https://github.com/tcoopman/image-webpack-loader) : pour l'optimisation des images.
* [Browser Sync](https://browsersync.io/) : pour tester votre projet sur différents appareils.

## Prérequis

### Node

Consultez le fichier `wp-dsfr-theme/package.json` pour connaître la version actuelle de Node.

## Installation

Téléchargez et extrayez l'archive zip dans le dossier `/themes` de votre installation WordPress.

```bash
|____wp-admin
|____wp-content
| |____plugins
| |____themes
| | |____wp-dsfr-theme
| |____uploads
|____wp-includes
```

Se placer ensuite dans le dossier du thème

```bash
$ cd wp-content/themes/wp-dsfr-theme
```

Installation des modules node

```bash
$ npm install
```

## Configuration

Les fichiers de configuration se trouvent dans le répertoire `config`

### Webpack

Vous pouvez trouver le fichier de configuration commun de Webpack dans `webpack.common.js`. Pour le mode développement, vous pouvez modifier le fichier `webpack.dev.js` et pour le mode production, vous pouvez modifier le fichier `webpack.prod.js`.
Vous avez également les loaders dans le fichier `loaders.js` et les plugins de Webpack dans le fichier `plugins.js`.

### Eslint

Vous pouvez trouver un fichier `.eslintrc` pour modifier la configuration d'Eslint.

Exécutez la commande suivante depuis le thème :

```bash
$ npm start
```

### Build

```bash
$ npm run build
```

### Rapport de bundle

Vous pouvez lancer un rapport de bundle avec la commande suivante :

```bash
$ npm run bundle-report
```