// Collection of functions that help the gallery popup

export const handleGalleryPopup = () => {
  const galleryPopup = document.querySelector('.gallery-popup');
  const galleryPopupContent = document.querySelector('.gallery-popup__content');

  if ( galleryPopup ) {
    galleryPopup.classList.add('opacity-80');
    galleryPopup.classList.remove('opacity-0');
    galleryPopup.classList.add('z-[60]');
    galleryPopup.classList.remove('-z-1');

    // Prevent scrolling
    document.body.classList.add('popup-active');
  }

  if ( galleryPopupContent ) {
    galleryPopupContent.classList.add('gallery-popup__content--active');
  }
};

export const handlePopupClose = () => {
  const closePopupButton = document.querySelector('.gallery-popup__close');
  const galleryPopup = document.querySelector('.gallery-popup');
  const galleryPopupContent = document.querySelector('.gallery-popup__content');

  if ( closePopupButton && galleryPopup ) {
    closePopupButton.addEventListener('click', (e) => {
      e.preventDefault();

      galleryPopup.classList.remove('opacity-80');
      galleryPopup.classList.add('opacity-0');
      galleryPopup.classList.remove('z-[60]');
      galleryPopup.classList.add('-z-1');

      if ( galleryPopupContent ) {
        galleryPopupContent.classList.remove('gallery-popup__content--active');
      }

      // allow scrolling
      document.body.classList.remove('popup-active');
    })
  }

  document.addEventListener('click', (e) => {
    if ( e.target.classList.contains('gallery-popup') ) {
      galleryPopup.classList.remove('opacity-80');
      galleryPopup.classList.add('opacity-0');
      galleryPopup.classList.remove('z-[60]');
      galleryPopup.classList.add('-z-1');

      if ( galleryPopupContent ) {
        galleryPopupContent.classList.remove('gallery-popup__content--active');
      }

      // allow scrolling
      document.body.classList.remove('popup-active');
    }
  });
}
