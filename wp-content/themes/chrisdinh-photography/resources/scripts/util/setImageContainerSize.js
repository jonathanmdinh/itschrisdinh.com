import calculateImageAspectRatio from './calculateImageAspectRatio.js';

/**
 * Set the size of the image container based on the image index
 *
 * @param {Number} imageIndex - The index of the image in the gallery
 */
const setImageContainerSize = (imageIndex) => {
  const imageContainer = document.querySelector('.image-container');
  const galleryItems = document.querySelectorAll('.gallery-test__item img');
  const sizes = [];

  // Generate an array of image sizes and srcs based on the gallery items at the time this is called. Allows us to set the correct image size after filtering
  Array.from(galleryItems).map((item) => {
    sizes.push({
      width: parseInt(item.dataset.width),
      height: parseInt(item.dataset.height),
      src: item.src,
    });
  });

  const maxWidth = window.innerWidth;
  const maxHeight = window.innerHeight;

  if (sizes[imageIndex]) {
    const imageSizedByBrowser = calculateImageAspectRatio(sizes[imageIndex].width, sizes[imageIndex].height, maxWidth, maxHeight);

    imageContainer.style.width = `${imageSizedByBrowser.width}px`;
    imageContainer.style.height = `${imageSizedByBrowser.height}px`;
    imageContainer.dataset.index = imageIndex;
    imageContainer.src = sizes[imageIndex].src;
  }
}

export default setImageContainerSize;
