[![FR](https://img.shields.io/badge/lang-fr-blue.svg)](https://github.com/BeAPI/dsfr/blob/develop/README.md)

# 🇫🇷 WordPress DSFR

WP DSFR is a WordPress port of the French Design System (or DSFR) in the form of a WordPress theme.

## How to use it

This repository use [`@wordpress/env`](https://www.npmjs.com/package/@wordpress/env) package to easily setup a local
environment to work on the DSFR theme and the associated plugins.

The local environment is available at the URL http://localhost:8888
You ca use `admin`/`password` to log in to the admin.

You'll need to install the dependencies first 
```bash
npm install
```

After the installation in complete you can use the `env` command to manage the local environment
```bash
# Start the local environement (available at http://localhost:8888)
npm start

# Stop the local environement
npm run stop

# Reset the database (will delete all data permanently)
npm run clean

# Remove the local environment (will delete all data and files permanently)
npm run destroy
```
## Use cases

* [`Hôpital d'Instruction des Armées Bégin`](https://hiabegin.sante.defense.gouv.fr/)

## To find out more

Please visit the [`demonstration site`](https://www.wp-dsfr.fr/demo/) to discover the features and contribution possibilities offered by the theme.

*WARNING: designed to facilitate the identification of French government sites, the DSFR is intended only for websites and mobile applications within the scope of the French government. Any other use is strictly prohibited. For further information, please consult [`the DSFR terms and conditions of use`](https://www.systeme-de-design.gouv.fr/a-propos/conditions-generales-d-utilisation).*
