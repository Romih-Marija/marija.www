<% if $Image %>
    <div class="container center-container">
        <img class="$ImageTypeClass" src="$Image.Link" alt="$Image.Title" />
    </div>
<% else %>
    <p>No image uploaded.</p>
<% end_if %>
