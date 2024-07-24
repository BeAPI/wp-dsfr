/**
 * DSFR
 * 
 * This task copy folders from node_modules/@gouvfr/dsfr/dist/
 * in order to recreate the DFSR recommended implementation :
 * https://github.com/GouvernementFR/dsfr
 * 
 * Files are then loaded from inc/Services/Assets.php   
 */
const fs = require('fs')

const dsfrNodeModulesDistPath = './node_modules/@gouvfr/dsfr/dist/'
const dsfrThemeDistFolderName = 'dist-dsfr'
const assets = [
  'artwork/',
  'fonts/',
  'icons/',
  'utility/utility.css',
  'utility/utility.min.css',
  'dsfr.css',
  'dsfr.min.css',
  'dsfr.module.js',
  'dsfr.module.min.js',
];

if (!fs.existsSync(dsfrNodeModulesDistPath)) {
  return
}

if (fs.existsSync( dsfrThemeDistFolderName)) {
  fs.rmSync( dsfrThemeDistFolderName, {recursive: true, force: true})
}

fs.mkdirSync( dsfrThemeDistFolderName)

for (let i = 0; i < assets.length; i++) {
  fs.cpSync(
    dsfrNodeModulesDistPath + assets[i],
    dsfrThemeDistFolderName + '/' + assets[i],
    {
      recursive: true,
    }
  )
}
