<% if $Image %>
    <div class="center-container">
        <img class="$ImageTypeClass" src="$Image.Link" alt="$Image.Title" />
    </div>
<% else %>
    <p>No image uploaded.</p>
<% end_if %>
