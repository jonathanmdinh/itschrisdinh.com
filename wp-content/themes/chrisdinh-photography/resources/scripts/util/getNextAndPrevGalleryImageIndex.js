/**
 * Get the next and previous image index for the gallery lightbox
 *
 * @param {Int} currentImageIndex - The index of the current image in the gallery
 * @param {Array} imageState - The state of the gallery images (will only contain images that are NOT hidden)
 * @returns {Object} - The next and previous image index
 */
const getNextAndPrevGalleryImageIndex = (currentImageIndex, imageState) => {
  const imageData = Array.from(imageState).filter(item => item.index === currentImageIndex); // The Array item object that contains the image's index in the gallery
  const currentImageDataIndex = imageState.findIndex(item => item.index === currentImageIndex); // The index of the iamge data in the array

  // console.log('getNextAndPrevGalleryImageIndex');
  // console.log(imageState);
  // console.log(imageData);
  // console.log(currentImageDataIndex);

  if (!imageData.length) {
    console.error('Image data not found - cannot paginate back or forward');
    return {
      nextIndex: 1,
      prevIndex: 0,
    }
  }

  const imageIndex = imageData[0].index;
  const totalIndexes = imageState.length;

  let nextIndex = -1;
  let prevIndex = -1;

  // If the current image is the last image in the gallery (filtered or not), we need to set the next index to the first image in the gallery
  // Otherwise, we set the next index to the next image in the gallery
  if ((currentImageDataIndex + 1) >= totalIndexes) {
    nextIndex = imageState[0].index;
  } else {
    nextIndex = imageState[currentImageDataIndex + 1].index;
  }

  // If the current image is the first image in the gallery (filtered or not), we need to set the previous index to the last image in the gallery
  // Otherwise, we set the previous index to the previous image in the gallery
  if ((currentImageDataIndex - 1) < 0) {
    prevIndex = imageState[totalIndexes - 1].index;
  } else {
    prevIndex = imageState[currentImageDataIndex - 1].index;
  }

  console.log({
    nextIndex,
    prevIndex,
  });

  return {
    nextIndex,
    prevIndex,
  };
};

export default getNextAndPrevGalleryImageIndex;
