import calculateImageAspectRatio from '../util/calculateImageAspectRatio.js';

const galleryState = {
  galleryItems: [],
  currentImageIndex: 0,
  nextImageIndex: 0,
  prevImageIndex: 0,

  init() {
    this.handleGalleryLightboxState(); // Set event listeners for opening the lightbox and showing the selected image
    this.setNextAndPrevButtonListeners(); // Set event listeners for the next and previous buttons
  },

  /**
   * Handles the lightbox open and close state
   */
  handleGalleryLightboxState() {
    const overlay = document.querySelector('.overlay');
    const galleryContainer = document.querySelector('#gallery');
    const overlayClose = overlay.querySelector('.overlay__close');

    if (galleryContainer && overlay) {
      galleryContainer.addEventListener('click', (e) => {
        const galleryItem = e.target.closest('.gallery__item');

        if (!galleryItem) return;

        const galleryImage = galleryItem.querySelector('img');
        const allGalleryItems = document.querySelectorAll('.gallery__item');

        // Creates an array containing only the images that are NOT hidden - this state array will be used to determine which image should be shown next and previous
        // when paginating through the gallery whether the gallery is filtered or not
        this.galleryItems = Array.from(allGalleryItems).map(item => {
          return {
            hidden: item.style.display === 'none',
            index: parseInt(item.querySelector('img').dataset.index),
            width: parseInt(item.querySelector('img').dataset.width),
            height: parseInt(item.querySelector('img').dataset.height),
            src: item.querySelector('img').src,
          }
        }).filter((item) => {
          return item.hidden === false;
        });

        this.currentImageIndex = parseInt(galleryImage.dataset.index);

        // Set the size of the image container based on the index of the clicked image and then show the image
        this.setGalleryLightboxSizeAndShowImage(this.currentImageIndex);

        // Set the next/previous image indexes in our state
        this.setNextAndPrevGalleryImageIndex(this.currentImageIndex);

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
  },

  setGalleryLightboxSizeAndShowImage(imageDataIndex) {
    const imageContainer = document.querySelector('.image-container');
    const image = document.querySelector('.overlay__image');
    const imageDescription = document.querySelector('.overlay__image-description');

    const imageHasSrc = image.src !== '';

    // If the image has a src, we need to fade out the image description and remove the image
    if (imageHasSrc) {
      imageDescription.classList.remove('fade-in');
      imageDescription.classList.add('opacity-0');
      image.src = '';
    }

    // Uses the array of all images that are currently shown + the clicked image
    const imageData = this.galleryItems.find(item => item.index === imageDataIndex);

    const maxWidth = window.innerWidth;
    const maxHeight = window.innerHeight;

    if (imageData) {
      const imageSizedByBrowser = calculateImageAspectRatio(imageData.width, imageData.height, maxWidth, maxHeight);

      imageContainer.style.width = `${imageSizedByBrowser.width}px`;
      imageContainer.style.height = `${imageSizedByBrowser.height}px`;
      imageContainer.classList.add('overlay__image-load'); // Add the "loading" animation

      setTimeout(() => {
        imageContainer.classList.remove('overlay__image-load'); // Remove the "loading" animation

        // Fade in the image description
        imageDescription.classList.remove('fade-out');
        imageDescription.classList.add('fade-in');

        // Load in the image
        image.src = imageData.src;
      }, 1000);
    }
  },

  setNextAndPrevGalleryImageIndex(currentImageIndex) {
    // The data of the current image in the images array
    const imageData = this.galleryItems.find(item => item.index === currentImageIndex);

    // The index in the array of the current image we want to find the next/prev indexes for
    const currentImageDataIndex = this.galleryItems.findIndex(item => item.index === currentImageIndex);

    const totalIndexes = this.galleryItems.length;

    let nextIndex = -1;
    let prevIndex = -1;

    // If the current image is the last image in the gallery (filtered or not), we need to set the next index to the first image in the gallery
    // Otherwise, we set the next index to the next image in the gallery
    if ((currentImageDataIndex + 1) >= totalIndexes) {
      nextIndex = this.galleryItems[0].index;
    } else {
      nextIndex = this.galleryItems[currentImageDataIndex + 1].index;
    }

    // If the current image is the first image in the gallery (filtered or not), we need to set the previous index to the last image in the gallery
    // Otherwise, we set the previous index to the previous image in the gallery
    if ((currentImageDataIndex - 1) < 0) {
      prevIndex = this.galleryItems[totalIndexes - 1].index;
    } else {
      prevIndex = this.galleryItems[currentImageDataIndex - 1].index;
    }

    this.nextImageIndex = nextIndex;
    this.prevImageIndex = prevIndex;
  },

  setNextAndPrevButtonListeners() {
    const nextOrPrevButton = document.querySelectorAll('.overlay__navigate');

    nextOrPrevButton.forEach((button) => {
      button.addEventListener('click', (e) => {
        e.preventDefault();

        if (button.classList.contains('overlay__next')) {

          // Set the next image in the gallery and then the next/prev indexes
          this.setGalleryLightboxSizeAndShowImage(this.nextImageIndex);
          this.setNextAndPrevGalleryImageIndex(this.nextImageIndex);
          this.currentImageIndex = this.nextImageIndex;
        } else if (button.classList.contains('overlay__prev')) {

          // Set the prev image in the gallery and then the next/prev indexes
          this.setGalleryLightboxSizeAndShowImage(this.prevImageIndex);
          this.setNextAndPrevGalleryImageIndex(this.prevImageIndex);
          this.currentImageIndex = this.prevImageIndex;
        }
      });
    });
  }
}

export default galleryState;