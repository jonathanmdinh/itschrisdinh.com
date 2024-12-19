import calculateImageAspectRatio from './calculateImageAspectRatio.js';

/**
 * Set the size of the image container based on the image index
 *
 * @param {Number} imageIndex - The index of the image in the gallery
 */
const setImageContainerSize = (imageIndex) => {
  const imageContainer = document.querySelector('.image-container');
  const image = document.querySelector('.overlay__image');
  const imageDescription = document.querySelector('.overlay__image-description');
  const galleryItems = document.querySelectorAll('.gallery-test__item img');
  const sizes = [];

  const imageHasSrc = image.src !== '';

  // If the image has a src, we need to fade out the image description and remove the image
  if (imageHasSrc) {
    imageDescription.classList.remove('fade-in');
    imageDescription.classList.add('opacity-0');
    image.src = '';
  }

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
    imageContainer.classList.add('overlay__image-load'); // Add the "loading" animation

    // imageContainer.src = sizes[imageIndex].src;
    setTimeout(() => {
      imageContainer.classList.remove('overlay__image-load'); // Remove the "loading" animation

      // Fade in the image description
      imageDescription.classList.remove('fade-out');
      imageDescription.classList.add('fade-in');

      // Load in the image
      image.src = sizes[imageIndex].src;
    }, 1000);
  }
}

export default setImageContainerSize;

