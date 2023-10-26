import domReady from '@roots/sage/client/dom-ready';
import initiateSplideSlider from './components/splide.js';
import handleGalleryCollectionFilterClick from './components/galleryCollections.js';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
  initiateSplideSlider();
  handleGalleryCollectionFilterClick();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
