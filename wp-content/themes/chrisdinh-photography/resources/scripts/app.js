import domReady from '@roots/sage/client/dom-ready';
import initiateNavigation  from './components/navigation.js';
import { initiateSplideSlider } from './components/splide.js';
import handleGalleryCollectionFilterClick from './components/galleryCollections.js';
import galleryBackToTopButton from './components/galleryBackToTopButton.js';
import { handlePopupClose } from './util/galleryPopup.js';
import initializeGallery from './components/gallery.js';
import { initializeFadeEffect } from './components/textFadeEffect.js';


/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
  if (document.body.classList.contains('about')) {
    initializeFadeEffect('bioContainer', 'fadeEffect');
  }
  initiateSplideSlider();
  handleGalleryCollectionFilterClick();
  galleryBackToTopButton();
  handlePopupClose();
  initializeGallery();
  initiateNavigation();

});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
