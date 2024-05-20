import AbstractDomElement from './AbstractDomElement'
import { ThrottledEvent } from 'oneloop.js'

// ----
// class
// ----
class Overflow extends AbstractDomElement {
  constructor(element, options) {
    const instance = super(element, options)

    // avoid double init :
    if (!instance.isNewInstance()) {
      return instance
    }

    const scroll = new ThrottledEvent(this._element, 'scroll')
    const resize = ThrottledEvent.getInstance(window, 'resize')
    const onEvent = this.checkScrollPosition.bind(this)

    scroll.add('scroll', onEvent)
    resize.add('resize', onEvent)

    this.checkScrollPosition()
  }

  checkScrollPosition() {
    const el = this._element

    el.style.setProperty('--s', el.scrollLeft + 'px')
    el.classList.toggle('has-hidden-content-left', el.scrollLeft > 0)
    el.classList.toggle('has-hidden-content-right', el.scrollLeft < el.scrollWidth - el.offsetWidth)
  }
}

// ----
// init
// ----
Overflow.init('.wp-block-table')

// ----
// export
// ----
export default Overflow
