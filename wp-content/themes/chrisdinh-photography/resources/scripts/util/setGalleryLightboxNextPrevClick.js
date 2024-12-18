import setImageContainerSize from './setImageContainerSize.js';

/**
 * Set the size of the image container based on the image index
 *
 * @param {Number} imageIndex - The index of the image in the gallery
 */
const setGalleryLightboxNextPrevClick = (index) => {
  const nextOrPrevButton = document.querySelectorAll('.overlay__navigate');

  nextOrPrevButton.forEach((button) => {
    button.addEventListener('click', (e) => {
      e.preventDefault();

      const imageContainer = document.querySelector('.image-container');
      const imageIndex = parseInt(imageContainer.dataset.index);
      const allGalleryItems = document.querySelectorAll('.gallery-test__item img');
      // let imageIndex = parseInt(index);
      console.log(`imageIndex initial click:${imageIndex}`);
      // console.log(imageIndex + 1);

      if (button.classList.contains('overlay__next')) {
        if (imageIndex < allGalleryItems.length - 1) {
          setImageContainerSize(imageIndex + 1);
        } else {
          setImageContainerSize(0);
        }
      } else if (button.classList.contains('overlay__prev')) {
        if (imageIndex > 0) {
          setImageContainerSize(imageIndex - 1);
        } else {
          setImageContainerSize(allGalleryItems.length - 1);
        }
      }

      console.log(`imageIndex after click: ${imageIndex}`);
    });
  });

  // const galleryItems = document.querySelectorAll('.gallery-test__item img');
  // const sizes = [];

  // console.log(imageIndex);

  // if (!galleryItems.length) {
  //   console.error('No gallery items found');
  //   return;
  // }

  // // Set our sizes array that contain the width and height of each image in the gallery
  // Array.from(galleryItems).map((item) => {
  //   sizes.push({
  //     width: parseInt(item.dataset.width),
  //     height: parseInt(item.dataset.height),
  //   });
  // });

  // console.log(sizes);
}

export default setGalleryLightboxNextPrevClick;
