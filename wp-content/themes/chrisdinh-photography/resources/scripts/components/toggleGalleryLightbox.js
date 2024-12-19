import setImageContainerSize from '../util/setImageContainerSize.js';
import setGalleryLightboxNextPrevClick from '../util/setGalleryLightboxNextPrevClick.js';

const toggleGalleryLightbox = () => {
  const overlay = document.querySelector('.overlay');
  const galleryContainer = document.querySelector('#gallery-test');
  const overlayClose = overlay.querySelector('.overlay__close');

  // Handle opening the overlay
  if (galleryContainer && overlay) {
    galleryContainer.addEventListener('click', (e) => {
      const galleryItem = e.target.closest('.gallery-test__item');

      if (!galleryItem) return;

      const galleryImage = galleryItem.querySelector('img');

      // Set the image for the clicked gallery grid item
      setImageContainerSize(galleryImage.dataset.index);

      // Set the event listeners for the next and previous buttons
      setGalleryLightboxNextPrevClick(galleryImage.dataset.index);

      // Show the overlay
      overlay.classList.add('overlay--active');
    });
  }

  overlay.addEventListener('click', (e) => {
    if (e.target.classList.contains('overlay')) {
      overlay.classList.remove('overlay--active');
    }
  });

  // Handle closing the overlay
  if (overlayClose) {
    overlayClose.addEventListener('click', () => {
      overlay.classList.remove('overlay--active');
    });
  }
}

export default toggleGalleryLightbox;
