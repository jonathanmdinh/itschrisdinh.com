import smoothScroll from "@scripts/util/smoothScroll";

const galleryBackToTopButton = () => {
  const backToTopButton = document.querySelector('.gallery__back-to-top');

  if ( ! backToTopButton ) return;

  backToTopButton.addEventListener('click', (e) => {
    e.preventDefault();

    smoothScroll({});
  });
};

export default galleryBackToTopButton;
