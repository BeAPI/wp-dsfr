import domReady from '@wordpress/dom-ready'
import { addFilter } from '@wordpress/hooks'
import { unregisterBlockStyle, getBlockVariations, unregisterBlockVariation } from '@wordpress/blocks'

import GutenbergBlockWrapper from './classes/GutenbergBlockWrapper'

// Native Gutenberg
domReady(() => {
  unregisterBlockStyle('core/button', ['outline'])
  unregisterBlockStyle('core/separator', ['wide', 'dots'])
  // whitelist core embeds
  const allowedEmbedVariants = ['youtube', 'vimeo', 'dailymotion']
  getBlockVariations('core/embed').forEach((variant) => {
    if (!allowedEmbedVariants.includes(variant.name)) {
      unregisterBlockVariation('core/embed', variant.name)
    }
  })
})

// ACF Blocks
if (window.acf) {
  // Do stuff
}

addFilter('blocks.registerBlockType', 'beapi-framework', function (settings, name) {
  if (name === 'core/paragraph') {
    settings.example.attributes.dropCap = false
  }

  if (name === 'core/separator' || name === 'core/quote' || name === 'core/pullquote' || name === 'core/table') {
    // remove custom styles
    settings.styles = []
  }

  if (name === 'core/image') {
    // remove custom styles
    settings.styles = []
    // set default aligment for images to null
    settings.attributes.align = {
      type: 'string',
    }
  }

  return settings
})

// ----
// COLORS
// ----
function getDsfrColors(prefix) {
  const colors = [
    {
      value: '',
      label: 'Defaut',
    },
  ]

  for (let color in window.dsfrData.editorColors) {
    colors.push({
      value: prefix + color,
      label: window.dsfrData.editorColors[color],
    })
  }

  return colors
}

// ----
// PARAGRAPH / LIST-ITEM BADGE
// ----
const blockListItemBadge = new GutenbergBlockWrapper('core/list-item', {
  blockFilter: function (name, attributes) {
    return /fr-badge/g.test(attributes.className)
  },
})

blockListItemBadge.addSidebarPanelBody('dsfr-panel', { title: 'DSFR' })

blockListItemBadge.addSidebarClassSelector('dsfr-panel', {
  label: 'Classe css de couleur',
  options: getDsfrColors('fr-badge--'),
})

const blockParagraphBadge = new GutenbergBlockWrapper('core/paragraph', {
  blockFilter: function (name, attributes) {
    return /fr-badge/g.test(attributes.className)
  },
})

blockParagraphBadge.addSidebarPanelBody('dsfr-panel', { title: 'DSFR' })

blockParagraphBadge.addSidebarClassSelector('dsfr-panel', {
  label: 'Classe css de couleur',
  options: getDsfrColors('fr-badge--'),
})

// ----
// GROUP FR-CALLOUT
// ----
const blockGroupFrCallout = new GutenbergBlockWrapper('core/group', {
  blockFilter: function (name, attributes) {
    return /fr-callout/g.test(attributes.className)
  },
})

blockGroupFrCallout.addSidebarPanelBody('dsfr-panel', { title: 'DSFR' })

blockGroupFrCallout.addSidebarClassSelector('dsfr-panel', {
  label: 'Classe css de couleur',
  options: getDsfrColors('fr-callout--'),
})

// ----
// GROUP FR-HIGHLIGHT
// ----
const blockGroupFrHighlight = new GutenbergBlockWrapper('core/group', {
  blockFilter: function (name, attributes) {
    return /fr-highlight/g.test(attributes.className)
  },
})

blockGroupFrHighlight.addSidebarPanelBody('dsfr-panel', { title: 'DSFR' })

blockGroupFrHighlight.addSidebarClassSelector('dsfr-panel', {
  label: 'Classe css de couleur',
  options: getDsfrColors('fr-highlight--'),
})

// ----
// GROUP FR-ALERT
// ----
const blockGroupFrAlert = new GutenbergBlockWrapper('core/group', {
  blockFilter: function (name, attributes) {
    return /fr-alert/g.test(attributes.className)
  },
})

blockGroupFrAlert.addSidebarPanelBody('dsfr-panel', { title: 'DSFR' })

blockGroupFrAlert.addSidebarClassSelector('dsfr-panel', {
  label: "Classe css du type d'alerte",
  options: [
    { value: '', label: 'Défaut' },
    { value: 'fr-alert--info', label: 'Information' },
    { value: 'fr-alert--success', label: 'Succès' },
    { value: 'fr-alert--error', label: 'Erreur' },
    { value: 'fr-alert--warning', label: 'Avertissement' },
  ],
})

// ----
// TABLE
// ----
const blockTable = new GutenbergBlockWrapper('core/table')

blockTable.addSidebarPanelBody('dsfr-panel', { title: 'DSFR' })

blockTable.addSidebarClassSelector('dsfr-panel', {
  label: 'Classe css de couleur',
  options: getDsfrColors('fr-table--'),
})

// ----
// EXPOSE CLASSES AND UTILS FOR CHILD THEME
// ----
window.dsfrData['classes'] = {
  GutenbergBlockWrapper: GutenbergBlockWrapper,
}
window.dsfrData['utils'] = {
  getDsfrColors: getDsfrColors,
}
