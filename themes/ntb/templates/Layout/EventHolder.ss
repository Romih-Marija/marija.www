

<section>
    <% loop $getEvents %>
        <article >
            <h2><a href="$Link">$Title</a></h2>
            <p><strong>Datum:</strong> $EventDate.Nice</p>
            <p><strong>Lokacija:</strong> $Location</p>
        </article>
    <% end_loop %>
</section>
