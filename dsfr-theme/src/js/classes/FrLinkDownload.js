import AbstractDomElement from './AbstractDomElement'

// ----
// class
// ----
class FrLinkDownload extends AbstractDomElement {
  constructor(element, options) {
    const instance = super(element, options)

    // avoid double init :
    if (!instance.isNewInstance()) {
      return instance
    }

    const el = this._element
    const text = el.childNodes[0]
    const detail = this._element.querySelector('.fr-link__detail')
    let html = ''

    if (text && text.nodeType === 3) {
      html = text.textContent.trim() + '&nbsp;<span class="fr-link__icon" aria-hidden="true"></span>'

      if (detail) {
        html += ' ' + detail.outerHTML
      }

      el.innerHTML = html
      el.classList.add('has-js-fr-download-link-icon')
    }
  }
}

// ----
// init
// ----
FrLinkDownload.init('.fr-link--download')

// ----
// export
// ----
export default FrLinkDownload
