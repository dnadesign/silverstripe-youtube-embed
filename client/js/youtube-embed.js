if (typeof Element.prototype.closest !== 'function') {
  Element.prototype.closest = function closestElement(selector) {
    const doc = this.ownerDocument;
    for (let traverse = this; traverse && traverse !== doc; traverse = traverse.parentNode) {
      if (traverse.matches(selector)) {
        return traverse;
      }
    }
    return null;
  };
}

Array.prototype.slice.call(document.querySelectorAll('.youtube-embed__poster')).forEach(function(item) {
  item.addEventListener('click',function(e) {
    e.preventDefault();
    var poster = e.currentTarget;
    var wrapper = poster.closest('.youtube-embed__container');
    videoPlay(wrapper);
  });
});

function videoPlay(wrapper) {
  var iframe = wrapper.querySelector('iframe');
  var src = iframe.getAttribute('data-src');
  wrapper.classList.add('is-active');
  iframe.setAttribute('src', src);
}
