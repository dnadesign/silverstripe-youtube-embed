<style>
  #youtube-embed-{$ID} .youtube-embed__poster {
    <% if $Poster %>
    background-image: url({$Poster.URL});
    <% else %>
    background-image: url(https://i1.ytimg.com/vi/{$VideoID}/maxresdefault.jpg);
  <% end_if %>
  }
</style>

<button type="button" class="youtube-embed__poster">
  <svg width="66" height="66" xmlns="http://www.w3.org/2000/svg"><g fill-rule="nonzero" stroke="#fff" stroke-width="2" fill="none"><path d="M41.5 33l-14 8.5v-17z"/><circle cx="33" cy="33" r="32"/></g></svg>
</button>
