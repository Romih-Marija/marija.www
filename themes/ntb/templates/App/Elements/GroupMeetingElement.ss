<div class="unit size1of1">
    <h3  class="pcenter">Mesečna srečanja NTB</h3>
    <br>
    <table class="table-container">
        <thead>
            <tr>
              <th>SKUPINA</th>
              <th>KRAJ</th>
              <th>DATUM in ČAS</th>
            </tr>
          </thead>
          <tbody>
            <% loop $GroupMeetings.Sort('SortOrder') %>
              <tr>
                <td>$GroupName</td>
                <td>$Location</td>
                <td>$DateTimeInfo</td>
              </tr>
            <% end_loop %>
          </tbody>
        </table>
    </div>
        