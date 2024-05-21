/**
 * By default scrolls the user to the top of the page, but accepts an object to change that behavior
 *
 * @param {Object} scrollToObject Settings passed to window.scrollTo
 * @link https://developer.mozilla.org/en-US/docs/Web/API/Window/scrollTo
 */
const smoothScroll = (scrollToObject) => {
  const smoothScrollObjectDefaults = {
    top: 0,
    behavior: 'smooth'
  };

  const settings = {...smoothScrollObjectDefaults, ...scrollToObject};

  window.scrollTo(settings);
};

export default smoothScroll;
