<% if $Events %>
    <% loop $Events %>
        <p>$Title</p>
    <% end_loop %>
<% else %>
    <p>Ni dogodkov za prikaz.</p>
<% end_if %>