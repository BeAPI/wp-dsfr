import extend from '../utils/extend'

const { createHigherOrderComponent } = wp.compose
const { InspectorControls, BlockControls } = wp.blockEditor
const { createElement, Fragment } = wp.element
const { PanelBody, ToolbarGroup, ToolbarButton } = wp.components

let id = 0

class GutenbergBlockWrapper {
  constructor(targets, options) {
    this._targets = typeof targets === 'string' ? [targets] : targets
    this._id = `gutenberg-block-wrapper-${id++}`
    this._settings = extend(true, {}, GutenbergBlockWrapper.defaults, options)

    this._sidebarPanelBodies = {}
    this._toolbarGroups = {}

    wp.hooks.addFilter('blocks.registerBlockType', this._id, (settings, name) => {
      return !this._targets.includes(name)
        ? settings
        : extend(true, settings, { attributes: this._settings.additionalAttributes })
    })

    wp.hooks.addFilter(
      'editor.BlockEdit',
      this._id,
      createHigherOrderComponent((BlockEdit) => {
        return (props) => {
          const { name, attributes } = props
          const newProps = addKey(props, 'wrapped-element')

          if (!this._targets.includes(name) || !this._settings.blockFilter(name, attributes)) {
            return createElement(BlockEdit, props)
          }

          const fragmentChildren = [createElement(BlockEdit, newProps)]

          if (this.hasSidebarPanelBody()) {
            fragmentChildren.push(this.getSidebarInspectorControls(newProps))
          }

          if (this.hasToolbarGroup()) {
            fragmentChildren.push(this.getToolbarBlockControls(newProps))
          }

          return createElement(Fragment, { key: this._id }, fragmentChildren)
        }
      }, this._id)
    )
  }

  getId() {
    return this._id
  }

  addAttributes(attributes) {
    Object.assign(this._settings.additionalAttributes, attributes)
    return this
  }

  // ----
  // Side bar
  // ----
  addSidebarPanelBody(panelBodyId, panelBodyOptions) {
    this._sidebarPanelBodies[panelBodyId] = {
      settings: panelBodyOptions,
      children: [],
    }

    return this
  }

  hasSidebarPanelBody() {
    return Object.keys(this._sidebarPanelBodies).length > 0
  }

  getSidebarInspectorControls({ name, attributes, setAttributes }) {
    const panels = []

    for (let panelId in this._sidebarPanelBodies) {
      let controls = []

      this._sidebarPanelBodies[panelId].children.forEach(function (child, i) {
        controls.push(
          createElement(
            wp.components[child.controlType],
            addKey(child.getControlSettings(name, attributes, setAttributes), i)
          )
        )
      })

      panels.push(createElement(PanelBody, addKey(this._sidebarPanelBodies[panelId].settings, panelId), controls))
    }

    return createElement(InspectorControls, { key: 'sideBarInspectorControls' }, panels)
  }

  addSidebarControl(panelBodyId, controlType, getControlOptions) {
    this._sidebarPanelBodies[panelBodyId].children.push({
      controlType: controlType,
      getControlSettings: getControlOptions,
    })

    return this
  }

  addSidebarClassSelector(panelBodyId, options) {
    this.addSidebarControl(panelBodyId, 'SelectControl', function (name, attributes, setAttributes) {
      let currentClass = ''
      let hasDefault = false

      if (!attributes.className) {
        attributes.className = ''
      }

      options.options.forEach(function ({ value }) {
        if (value !== '') {
          if (attributes.className.split(' ').indexOf(value) > -1) {
            currentClass = value
          }
        } else {
          hasDefault = true
        }
      })

      if (!hasDefault && !currentClass) {
        currentClass = options.options[0].value

        setAttributes({
          className: attributes.className + ' ' + currentClass,
        })
      }

      return extend(
        {
          value: currentClass,
          onChange: (value) => {
            // if the user start to edit class in text field, do nothing
            if (currentClass && !attributes.className.split(' ').includes(currentClass)) {
              currentClass = ''
              return
            }

            let className = attributes.className.replace(currentClass, '').replace(/\s+/g, ' ').trim()

            if (value !== '') {
              className += ' ' + value
            }

            setAttributes({
              className: className,
            })
          },
        },
        options
      )
    })

    return this
  }

  // ----
  // Tool bar
  // ----
  addToolbarGroup(toolbarGroupId) {
    this._toolbarGroups[toolbarGroupId] = []
    return this
  }

  hasToolbarGroup() {
    return Object.keys(this._toolbarGroups).length > 0
  }

  getToolbarBlockControls({ name, attributes, setAttributes }) {
    const groups = []

    for (let toolbarGroupId in this._toolbarGroups) {
      const buttons = []

      this._toolbarGroups[toolbarGroupId].forEach(function (getButtonSettings, i) {
        buttons.push(createElement(ToolbarButton, addKey(getButtonSettings(name, attributes, setAttributes), i)))
      })

      groups.push(createElement(ToolbarGroup, { key: toolbarGroupId }, buttons))
    }

    return createElement(BlockControls, { key: 'toolbarBlockControls' }, groups)
  }

  addToolbarButton(toolbarGroupId, getButtonOptions) {
    this._toolbarGroups[toolbarGroupId].push(getButtonOptions)
    return
  }
}

GutenbergBlockWrapper.defaults = {
  blockFilter: () => true,
  additionalAttributes: {},
}

function addKey(object, keyValue) {
  return Object.assign({ key: keyValue }, object)
}

export default GutenbergBlockWrapper
