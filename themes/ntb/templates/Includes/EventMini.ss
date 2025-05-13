<div class="dogodek">
    <a href="$Link">
        <div class="slika_container">
        <% if $SlikaMajhna %>
            <img calss="dogodek_slika" src="$SlikaMajhna.Link" alt="$Title" class="" />
        <% end_if %>
        <div class="overlay">
            <p>Preberi več</p>
        </div>
        </div>
    </a>

    <p class="ime_dogodka">
        <a href="$Link">$Title</a>
    </p>

    <div class="lokacija_datum">
        <p>
        <i class="fa-solid fa-location-dot"></i> &nbsp;$Location
        </p>
        <p>
        <i class="fas fa-calendar-alt"></i> &nbsp;$DisplayDate
        </p>
    </div>
    </div>