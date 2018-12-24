<div id="youtube-embed-{$ID}" class="youtube-embed__container">
  <% include DNADesign\YoutubeEmbed\Iframe %>
  <% if not $IsMobileBrowser %>
    <% include DNADesign\YoutubeEmbed\Poster %>
  <% end_if %>
</div>

<% require css("dnadesign/silverstripe-youtube-embed:client/css/youtube-embed.css") %>
<% require javascript("dnadesign/silverstripe-youtube-embed:client/js/youtube-embed.js") %>
