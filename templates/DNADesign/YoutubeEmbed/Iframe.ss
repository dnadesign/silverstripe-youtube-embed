<% if $IsMobileBrowser %>
  <iframe
    src="//www.youtube.com/embed/{$VideoID}?rel=0&showinfo=0&controls=1&autohide=1&modestbranding=1&enablejsapi=1&playsinline=1"
    frameborder="0"
    title="youtube video"
    allowTransparency="true"
    allowfullscreen>
  </iframe>
<% else %>
  <iframe
    src=""
    title="youtube video"
    frameborder="0"
    allowTransparency="true"
    allowfullscreen
    data-src="//www.youtube.com/embed/{$VideoID}?rel=0&showinfo=0&controls=1&autohide=1&modestbranding=1&enablejsapi=1&playsinline=1&autoplay=1">
  </iframe>
<% end_if %>
