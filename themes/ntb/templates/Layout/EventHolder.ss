<div class="center-container">
    <h3 class="dogodek_naslov">PRIHAJAJOČI DOGODKI</h3>
    <div class="dogodki_seznam">
        <% loop $getUpcomingEvents %>
            <% include EventMini %>
        <% end_loop %>
    </div>
    <h3 class="dogodek_naslov">PRETEKLI DOGODKI + GALERIJA</h3>
    <div class="dogodki_seznam">
        <% loop $getPastEvents %>
            <% include EventMini %>
        <% end_loop %>
    </div>
</div>