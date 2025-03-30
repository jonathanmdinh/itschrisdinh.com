import domReady from '@roots/sage/client/dom-ready';
import initiateNavigation  from './components/navigation.js';
import { initiateSplideSlider } from './components/splide.js';
import galleryBackToTopButton from './components/galleryBackToTopButton.js';
// import toggleGalleryLightbox from './components/toggleGalleryLightbox.js';
import galleryFilter from './components/galleryFilter.js';
import galleryState from './modules/galleryState.js';
/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
  initiateSplideSlider();
  galleryBackToTopButton();
  initiateNavigation();
  // toggleGalleryLightbox();
  galleryFilter();
  galleryState.init();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
