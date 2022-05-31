const galleryActions = document.querySelector('.gallery__actions');
let photos = document.querySelectorAll('.gallery__checkbox');

photos.forEach((photo) => {
  photo.addEventListener("change", (e) => {
    restrictSelection(photo);
  });
});

function restrictSelection(item) {
  item.classList.toggle('gallery__checkbox-checked');
  let activeItems = document.querySelectorAll('.gallery__checkbox-checked');
  galleryActions.classList.toggle('gallery__actions-visible');

  if (activeItems.length > 1) {
    item.checked = false;
    galleryActions.classList.toggle('gallery__actions-visible');
    item.classList.remove('gallery__checkbox-checked');
  }
}