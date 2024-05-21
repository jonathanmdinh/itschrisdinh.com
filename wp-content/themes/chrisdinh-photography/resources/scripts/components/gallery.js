const initializeGallery = () => {
  const allGalleryImages = document.querySelectorAll('.gallery-items .gallery-item__image');

  if ( allGalleryImages ) {
    allGalleryImages.forEach(item => {
      requestAnimationFrame(() => {
        item.classList.remove('opacity-0');
        item.classList.add('opacity-1');
      });
    });
  }
};

export default initializeGallery;
