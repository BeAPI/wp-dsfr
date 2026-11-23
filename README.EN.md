[![FR](https://img.shields.io/badge/lang-fr-blue.svg)](https://github.com/BeAPI/dsfr/blob/develop/README.md)

# 🇫🇷 WordPress DSFR

WP DSFR is a WordPress port of the French Design System (or DSFR) in the form of a WordPress theme.

## Licence and terms of use

> ⚠️ **Prohibited Use Outside Government Websites**
>
> The DSFR code is licensed under the Etalab 2.0 licence (excluding assets subject to specific conditions, such as the Marianne fonts), but its use is restricted by specific terms of use. Given its role as a marker of the French State's visual identity, the DSFR must not be used by entities outside the public administration. It cannot be used outside a .gouv.fr domain name.
>
> [See terms](https://github.com/GouvernementFR/dsfr/blob/main/doc/legal/cgu.md)

## WordPress theme and Blocks plugin installation

You can download the latest archive [here](https://github.com/BeAPI/wp-dsfr/tags). It contains two folders:

1. The wp-dsfr-theme folder to place in the `themes` directory.
2. The wp-dsfr-blocks folder to place in the `plugins` directory and activate in your site's admin panel.

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
