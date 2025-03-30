import setImageContainerSize from '../util/setImageContainerSize.js';
import setGalleryLightboxNextPrevClick from '../util/setGalleryLightboxNextPrevClick.js';

/**
 * Handles toggling the lightbox to show the gallery image when clicked
 */
const toggleGalleryLightbox = () => {
  const overlay = document.querySelector('.overlay');
  const galleryContainer = document.querySelector('#gallery');
  const overlayClose = overlay.querySelector('.overlay__close');

  // Handle opening the overlay
  if (galleryContainer && overlay) {
    galleryContainer.addEventListener('click', (e) => {
      const galleryItem = e.target.closest('.gallery__item');

      if (!galleryItem) return;

      const galleryImage = galleryItem.querySelector('img');
      const allGalleryItems = document.querySelectorAll('.gallery__item');

      // Creates an array containing only the images that are NOT hidden - this state array will be used to determine which image should be shown next and previous
      // when paginating through the gallery whether the gallery is filtered or not
      const imageState = Array.from(allGalleryItems).map(item => {
        return {
          hidden: item.style.display === 'none',
          index: parseInt(item.querySelector('img').dataset.index)
        }
      }).filter((item) => {
        return item.hidden === false;
      });

      console.log('imageState');
      console.log(imageState);

      // Set the size of the image container based on the index of the clicked image and then show the image
      setImageContainerSize(galleryImage.dataset.index);

      // When clicking on a gallery item, we set the event listeners for the next and previous buttons
      // based on the current index of the clicked image
      setGalleryLightboxNextPrevClick(imageState);

      // Show the overlay
      overlay.classList.add('overlay--active');
    });
  }

  // Handle closing the overlay when the overlay is clicked
  overlay.addEventListener('click', (e) => {
    if (e.target.classList.contains('overlay')) {
      overlay.classList.remove('overlay--active');
    }
  });

  // Handle closing the overlay when the close button is clicked
  if (overlayClose) {
    overlayClose.addEventListener('click', () => {
      overlay.classList.remove('overlay--active');
    });
  }
}

export default toggleGalleryLightbox;
