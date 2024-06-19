[![FR](https://img.shields.io/badge/lang-fr-blue.svg)](https://github.com/BeAPI/dsfr/blob/develop/dsfr-theme/README.md)

# 🇫🇷 DSFR theme

## Main tools

* [Webpack 5](https://webpack.js.org/) JS, CSS and assets are built with Webpack.
* [Esbuild Loader](https://github.com/privatenumber/esbuild-loader) for ESNext & TypeScript transpilation.
* [Eslint](https://eslint.org/) for JS code style.
* [Stylelint](https://stylelint.io/) for CSS code style.
* [CSSNano](https://cssnano.co/) for CSS optimization
* [PostCSS Preset Env](https://github.com/csstools/postcss-preset-env) for modern CSS properties compatibility.
* [PostCSS PX to REM](https://github.com/cuth/postcss-pxtorem) to automatically convert px units to rem.
* [PostCSS Sort Media Queries](https://github.com/solversgroup/postcss-sort-media-queries) to combine multiple similar medie queries declarations.
* [SVGO](svgo-loader) for SVG optimization.
* [Image Webpack Loader](image-webpack-loader) for images optimization.
* [Browser Sync](https://browsersync.io/) to test your project on different devices.

## Requirements

### Node

See in `dsfr-theme/package.json` file the current node version.

## Installation

Download and extract the zip archive into your `/themes` WordPress's folder.

```bash
|____wp-admin
|____wp-content
| |____plugins
| |____themes
| | |____dsfr-theme
| |____uploads
|____wp-includes
```

Next, go to your theme folder.

```bash
$ cd wp-content/themes/dsfr-theme
```

Install node modules

```bash
$ npm install
```

## Configuration

The configurations files are in `config` directory.

### Webpack
You can find the common Webpack settings file in `webpack.common.js`. For development mode purpose, you can edit `webpack.dev.js` file and for production mode, you can edit `webpack.prod.js`.
You also have the loaders in `loaders.js` file and Webpack's plugin in `plugins.js` file.

### Babel
You can find a `.babelrc` file to modify Babel configuration.

### Eslint
You can find a `.eslintrc` file to modify Eslint configuration.

Run the following command from the theme :

```bash
$ npm start
```

### Build

```bash
$ npm run build
```

### Bundle report

You can launch a bundle report with the following command :

```bash
$ npm run bundle-report
```