import setImageContainerSize from './setImageContainerSize.js';
import getNextAndPrevGalleryImageIndex from './getNextAndPrevGalleryImageIndex.js';

/**
 * Sets the next and previous button event listeners for the lightbox to show the next or previous image
 *
 * @param {Number} imageIndex - The index of the image in the gallery
 */
const setGalleryLightboxNextPrevClick = () => {
  const nextOrPrevButton = document.querySelectorAll('.overlay__navigate');

  nextOrPrevButton.forEach((button) => {
    button.addEventListener('click', (e) => {
      e.preventDefault();

      // const allGalleryItems = document.querySelectorAll('.gallery__item');

      const imageContainer = document.querySelector('.image-container');
      const imageIndex = parseInt(imageContainer.dataset.index);
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

      const { nextIndex, prevIndex } = getNextAndPrevGalleryImageIndex(imageIndex, imageState);

      if (button.classList.contains('overlay__next')) {
        setImageContainerSize(nextIndex);
      } else if (button.classList.contains('overlay__prev')) {
        setImageContainerSize(prevIndex);
      }
    });
  });
}

export default setGalleryLightboxNextPrevClick;
