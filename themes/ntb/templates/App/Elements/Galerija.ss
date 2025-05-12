<div class="center-container">
        <div class="galerija">
            <% loop $Galerija %>
              <img
                src="$URL"
                class="thumbnail"
                data-full="$URL"
                data-index="$Pos"
                onclick="openModal(this)"
              />
            <% end_loop %>
          </div>
          
          <!-- Modal -->
          <div id="modal" class="modal" style="display:none;" onclick="closeModal(event)">
            <span class="close" onclick="closeModal(event)">&times;</span>
            <img id="modal-img" class="modal-content" src="" alt="Ogled slike" />
            <button class="prev" onclick="changeImage(-1)">&#10094;</button>
            <button class="next" onclick="changeImage(1)">&#10095;</button>
          </div>
    </div>
</div>

