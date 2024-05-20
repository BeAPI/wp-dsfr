# DSFR

## Tooling

### Local environment

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
npm run env start

# Stop the local environement
npm run env stop

# Reset the database (will delete all data permanently)
npm run env clean all

# Remove the local environment (will delete all data and files permanently)
npm run env destroy
```
