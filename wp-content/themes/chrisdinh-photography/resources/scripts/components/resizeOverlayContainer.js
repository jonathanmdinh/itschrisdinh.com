const resizeOverlayContainer = (imageIndex) => {
    const nextOrPrevButton = document.querySelectorAll('.overlay__navigate');
    const imageContainer = document.querySelector('.image-container');
    const galleryItems = document.querySelectorAll('.gallery-test__item img');
    // console.log(galleryItems);
    const sizes = [];

    if (!galleryItems.length) {
      console.error('No gallery items found');
      return;
    }

    // Set our sizes array that contain the width and height of each image in the gallery
    Array.from(galleryItems).map((item) => {
      sizes.push({
        width: parseInt(item.dataset.width),
        height: parseInt(item.dataset.height),
      });
    });

    console.log(imageIndex);
    console.log(sizes[imageIndex]);

    // setImageContainerSize(imageIndex);

    // Placeholder sizes for the image container - replace with actual sizes from images in the gallery grid
    // const sizes = [
    //   {
    //     width: '1000px',
    //     height: '700px',
    //   },
    //   {
    //     width: '500px',
    //     height: '350px',
    //   },
    //   {
    //     width: '1500px',
    //     height: '1050px',
    //   },
    //   {
    //     width: '400px',
    //     height: '890px',
    //   }
    // ];

    // The on the next/prev image button. Handles resizing the image based on the browser size and the images aspect ratio
    nextOrPrevButton.forEach((button) => {
      button.addEventListener('click', (e) => {
        e.preventDefault();

        if (button.classList.contains('overlay__next')) {
          if (imageIndex < sizes.length - 1) {
            setImageContainerSize(imageIndex + 1);
          } else {
            setImageContainerSize(0);
          }
        } else if (button.classList.contains('overlay__prev')) {
          if (imageIndex > 0) {
            setImageContainerSize(imageIndex - 1);
          } else {
            setImageContainerSize(sizes.length - 1);
          }
        }

        // Get the current size of the image container
        // const currentSize = {
        //   width: imageContainer.style.width,
        //   height: imageContainer.style.height,
        // };

        // // Find the index of the current size in the sizes array
        // // let index = sizes.findIndex(size => size.width === currentSize.width && size.height === currentSize.height);

        // console.log(index);

        // // Get the max width and height of the browser
        // const maxWidth = window.innerWidth;
        // const maxHeight = window.innerHeight;

        // // Declare a variable to store the size of the image based on the browser size and the images aspect ratio
        // let imageSizedByBrowser;

        // // Based on the current index, get the next size of the image in the sizes array
        // if (index < sizes.length - 1) {
        //   imageSizedByBrowser = calculateAspectRatio(sizes[index + 1].width, sizes[index + 1].height, maxWidth, maxHeight);
        //   index++;
        //   // imageContainer.style.width = sizes[index + 1].width;
        //   // imageContainer.style.height = sizes[index + 1].height;
        // } else {
        //   imageSizedByBrowser = calculateAspectRatio(sizes[0].width, sizes[0].height, maxWidth, maxHeight);
        //   index = 0;
        //   // imageContainer.style.width = sizes[0].width;
        //   // imageContainer.style.height = sizes[0].height;
        // }

        // imageContainer.style.width = `${imageSizedByBrowser.width}px`;
        // imageContainer.style.height = `${imageSizedByBrowser.height}px`;

        // Set the size of the next image based on its intrinsic size
        // if (index < sizes.length - 1) {
        //   imageContainer.style.width = sizes[index + 1].width;
        //   imageContainer.style.height = sizes[index + 1].height;
        // } else {
        //   imageContainer.style.width = sizes[0].width;
        //   imageContainer.style.height = sizes[0].height;
        // }

        handleBrowserResize();

        // const nextSize = sizes.find(size => size.width > currentSize.width && size.height > currentSize.height);

        // if (nextSize) {
        //   imageContainer.style.width = `${nextSize.width}px`;
        //   imageContainer.style.height = `${nextSize.height}px`;
        // }
      });
    });
};

// const setImageContainerSize = (imageIndex) => {
//   const imageContainer = document.querySelector('.image-container');
//   const galleryItems = document.querySelectorAll('.gallery-test__item img');
//   const sizes = [];

//   console.log(imageIndex);

//   Array.from(galleryItems).map((item) => {
//     sizes.push({
//       width: parseInt(item.dataset.width),
//       height: parseInt(item.dataset.height),
//       src: item.src,
//     });
//   });

//   const maxWidth = window.innerWidth;
//   const maxHeight = window.innerHeight;

//   if (sizes[imageIndex]) {
//     const imageSizedByBrowser = calculateAspectRatio(sizes[imageIndex].width, sizes[imageIndex].height, maxWidth, maxHeight);

//     imageContainer.src = sizes[imageIndex].src;
//     imageContainer.style.width = `${imageSizedByBrowser.width}px`;
//     imageContainer.style.height = `${imageSizedByBrowser.height}px`;
//   }
// }


const handleBrowserResize = () => {
  const imageContainer = document.querySelector('.image-container');
  const overlayContainer = document.querySelector('.overlay');

  let overlayWidth = 0;
  let overlayHeight = 0;

  const resizeObserver = new ResizeObserver((entries) => {
    // console.log('resize');
    // console.log(entries);

    if (entries.length) {
      overlayWidth = entries[0].contentRect.width;
      overlayHeight = entries[0].contentRect.height;
    }

    // console.log(overlayWidth);
    // console.log(overlayHeight);

    // for (const entry of entries) {
    //   console.log(entry.contentRect);
    // }
  });

  resizeObserver.observe(overlayContainer);

  // manually dispatch resize event to trigger resize observer
  window.dispatchEvent(new Event('resize'));

  // window.addEventListener('resize', () => {
  //   console.log('resize');

  //   const browserWidth = window.innerWidth;
  //   const browserHeight = window.innerHeight;

  //   console.log(browserWidth);
  //   console.log(browserHeight);
  // });
};

// /**
//  * Calculate the aspect ratio of the image based on the browser size and the images aspect ratio
//  *
//  * @param {String} width - The width of the image
//  * @param {String} height - The height of the image
//  * @param {Number} maxWidth - The max width of the browser
//  * @param {Number} maxHeight - The max height of the browser
//  *
//  * @returns {Object} - The width and height of the image based on the browser size and the images aspect ratio
//  */
// const calculateAspectRatio = (width, height, maxWidth, maxHeight) => {
//   const imageWidth = parseInt(width);
//   const imageHeight = parseInt(height);

//   let maxWidthGutter = 0;
//   let maxHeightGutter = 0;

//   // Based on screen size, reduce the max width to allow for space between the browser window and the image
//   if (maxWidth < 500) {
//     maxWidthGutter = 40;
//     maxHeightGutter = 200;
//   } else if (maxWidth < 1024) {
//     maxWidthGutter = 200;
//     maxHeightGutter = 200;
//   } else {
//     maxWidthGutter = 200;
//     maxHeightGutter = 200;
//   }

//   const ratio = Math.min((maxWidth - maxWidthGutter) / imageWidth, (maxHeight - maxHeightGutter) / imageHeight);

//   return {
//     width: imageWidth * ratio,
//     height: imageHeight * ratio,
//   };
// };

export default resizeOverlayContainer;
