import domReady from '@roots/sage/client/dom-ready';
import { initiateSplideSlider } from './components/splide.js';
import handleGalleryCollectionFilterClick from './components/galleryCollections.js';
import galleryBackToTopButton from './components/galleryBackToTopButton.js';
import { handlePopupClose } from './util/galleryPopup.js';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
  initiateSplideSlider();
  handleGalleryCollectionFilterClick();
  galleryBackToTopButton();
  handlePopupClose();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
