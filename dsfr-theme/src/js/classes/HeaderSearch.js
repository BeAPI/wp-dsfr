import AbstractDomElement from './AbstractDomElement'

// ----
// class
// ----
class HeaderSearch extends AbstractDomElement {
  constructor(element, options) {
    const instance = super(element, options)

    // avoid double init :
    if (!instance.isNewInstance()) {
      return instance
    }

    this._onFocus = () => {
      this._element.querySelector('input[type="search"]').focus()
    }

    this._element.addEventListener('focus', this._onFocus)
  }

  destroy() {
    super.destroy()
    this._element.removeEventListener('focus', this._onFocus)
  }
}

// ----
// init
// ----
HeaderSearch.init('#header-search[tabindex="-1"]')

// ----
// export
// ----
export default HeaderSearch
