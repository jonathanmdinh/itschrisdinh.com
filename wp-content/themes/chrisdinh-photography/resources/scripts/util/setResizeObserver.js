const handleBrowserResize = () => {
  const imageContainer = document.querySelector('.image-container');
  const overlayContainer = document.querySelector('.overlay');

  let overlayWidth = 0;
  let overlayHeight = 0;

  const resizeObserver = new ResizeObserver((entries) => {
    if (entries.length) {
      overlayWidth = entries[0].contentRect.width;
      overlayHeight = entries[0].contentRect.height;
    }
  });

  resizeObserver.observe(overlayContainer);

  // manually dispatch resize event to trigger resize observer
  window.dispatchEvent(new Event('resize'));
};
