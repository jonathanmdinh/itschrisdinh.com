import smoothScroll from "@scripts/util/smoothScroll";

const galleryBackToTopButton = () => {
  const backToTopButton = document.querySelector('.back-to-top');

  if ( ! backToTopButton ) return;

  backToTopButton.addEventListener('click', (e) => {
    e.preventDefault();

    smoothScroll({});
  });

  window.addEventListener('scroll', () => {
    // When the user scrolls a third of the page, show the back to top button
    if ( window.scrollY > ( document.body.clientHeight / 3 ) ) {
      backToTopButton.style.opacity = 1;
      backToTopButton.style.zIndex = 30;
    } else {
      backToTopButton.style.opacity = 0;
      backToTopButton.style.zIndex = -1;
    }
  });
};

export default galleryBackToTopButton;
