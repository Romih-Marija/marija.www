document.addEventListener("DOMContentLoaded", function () {
    const button = document.getElementById("hamburger-button");
    const menu = document.getElementById("mobile-menu");
  
    if (button && menu) {
      button.addEventListener("click", function () {
        menu.classList.toggle("active");
      });
    }
  });
  
// GALERIJA  
let currentIndex = 0;
let images = [];

function openModal(imgElement) {
  images = Array.from(document.querySelectorAll('.thumbnail'));
  currentIndex = parseInt(imgElement.dataset.index);
  const fullSrc = imgElement.dataset.full;

  document.getElementById('modal-img').src = fullSrc;
  document.getElementById('modal').style.display = 'flex';
}

function closeModal(e) {
  if (e.target.id === 'modal' || e.target.classList.contains('close')) {
    document.getElementById('modal').style.display = 'none';
  }
}

function changeImage(direction) {
  currentIndex = (currentIndex + direction + images.length) % images.length;
  const newImg = images[currentIndex];
  document.getElementById('modal-img').src = newImg.dataset.full;
}

// Klaviatura
document.addEventListener('keydown', function(e) {
  if (document.getElementById('modal').style.display === 'flex') {
    if (e.key === 'ArrowLeft') changeImage(-1);
    if (e.key === 'ArrowRight') changeImage(1);
    if (e.key === 'Escape') document.getElementById('modal').style.display = 'none';
  }
});
 