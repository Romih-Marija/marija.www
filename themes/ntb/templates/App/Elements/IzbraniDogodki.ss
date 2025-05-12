
<% if $IzbraniDogodki.exists %>
    <div class="dogodki_seznam">
        <% loop $IzbraniDogodki %>
            <% include EventMini %>
        <% end_loop %>
    </div>
<% end_if %>

