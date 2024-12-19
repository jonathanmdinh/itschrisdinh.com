
/**
 * Calculate the aspect ratio of the image based on the browser size and the images aspect ratio
 *
 * @param {String} width - The width of the image
 * @param {String} height - The height of the image
 * @param {Number} maxWidth - The max width of the browser
 * @param {Number} maxHeight - The max height of the browser
 *
 * @returns {Object} - The width and height of the image based on the browser size and the images aspect ratio
 */
const calculateImageAspectRatio = (width, height, maxWidth, maxHeight) => {
  const imageWidth = parseInt(width);
  const imageHeight = parseInt(height);

  let maxWidthGutter = 0;
  let maxHeightGutter = 0;

  // Based on screen size, reduce the max width to allow for space between the browser window and the image
  if (maxWidth < 500) {
    maxWidthGutter = 40;
    maxHeightGutter = 200;
  } else if (maxWidth < 1024) {
    maxWidthGutter = 200;
    maxHeightGutter = 200;
  } else {
    maxWidthGutter = 200;
    maxHeightGutter = 200;
  }

  const ratio = Math.min((maxWidth - maxWidthGutter) / imageWidth, (maxHeight - maxHeightGutter) / imageHeight);

  return {
    width: imageWidth * ratio,
    height: imageHeight * ratio,
  };
};

export default calculateImageAspectRatio;
