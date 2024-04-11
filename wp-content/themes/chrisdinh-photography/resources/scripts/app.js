import domReady from '@roots/sage/client/dom-ready';
import initiateSplideSlider from './components/splide.js';
import initiateNavigation  from './components/navigation.js';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
  initiateSplideSlider();
  initiateNavigation();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
