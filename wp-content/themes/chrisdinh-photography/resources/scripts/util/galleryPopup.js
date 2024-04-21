// Collection of functions that help the gallery popup

export const handleGalleryPopup = () => {
  const galleryPopup = document.querySelector('.gallery-popup');

  if ( galleryPopup ) {
    galleryPopup.classList.add('opacity-100');
    galleryPopup.classList.remove('opacity-0');
    galleryPopup.classList.add('z-[40]');
    galleryPopup.classList.remove('-z-1');

    // Prevent scrolling
    document.body.classList.add('popup-active');
  }
};

export const handlePopupClose = () => {
  const closePopupButton = document.querySelector('.gallery-popup__close');
  const galleryPopup = document.querySelector('.gallery-popup');

  if ( closePopupButton && galleryPopup ) {
    closePopupButton.addEventListener('click', (e) => {
      e.preventDefault();

      galleryPopup.classList.remove('opacity-100');
      galleryPopup.classList.add('opacity-0');
      galleryPopup.classList.remove('z-[40]');
      galleryPopup.classList.add('-z-1');

      // allow scrolling
      document.body.classList.remove('popup-active');
    })
  }
}
