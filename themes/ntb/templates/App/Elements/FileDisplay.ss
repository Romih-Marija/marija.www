<% if $DownloadFile %>
    <div class="tekst-block">
        <p>
            <% if $FileType %>$FileType<% else %>Prenesi datoteko<% end_if %>:
            <a class="podcrtaj" href="$DownloadFile.URL" target="_blank" rel="noopener">
            <% if $FileTitle %>$FileTitle<% else %>$DownloadFile.Name<% end_if %>
            </a>
        </p>
    </div>
<% end_if %>