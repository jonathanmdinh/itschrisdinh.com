import domReady from '@roots/sage/client/dom-ready';
import initiateNavigation  from './components/navigation.js';
import { initiateSplideSlider } from './components/splide.js';
import galleryBackToTopButton from './components/galleryBackToTopButton.js';
import toggleGalleryLightbox from './components/toggleGalleryLightbox.js';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
  initiateSplideSlider();
  galleryBackToTopButton();
  initiateNavigation();
  toggleGalleryLightbox();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
