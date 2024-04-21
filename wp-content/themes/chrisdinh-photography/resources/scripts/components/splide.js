import { Splide, SplidePagination } from "@splidejs/splide";
import { handleGalleryPopup } from "@scripts/util/galleryPopup";

export const initiateSplideSlider = ( selector = '.splide' ) => {
  const sliders = document.querySelectorAll(`${selector}`);

  // The gallery will have a thumbnail slider that needs to be syncd. do not call this by default on that page
  if ( sliders.length > 0 && !document.body.classList.contains('gallery') ) {
    sliders.forEach( slider => {
      let sliderSettingsJSON = slider.dataset.splide ? JSON.parse(slider.dataset.splide) : {};
      sliderSettingsJSON = handleMergingCustomSettings(slider, sliderSettingsJSON);
      const sliderId = slider.id;

      if ( sliderId && Object.keys(sliderSettingsJSON).length > 0 ) {
        const splide = new Splide(`#${sliderId}`, sliderSettingsJSON).mount();

        if (slider.dataset.customPagination === 'true') {
          applyCustomPagination(slider, splide);
        }
      }
    });
  } else {
    const allGalleryImages = document.querySelectorAll('.gallery-item__image img');

    initializeMainAndThumbnailSliders();

    setUpClickEvent(allGalleryImages);
  }
};

/**
 * Loops through the gallery images and adds a click event to open the popup, allowing users to traverse through
 * the images shown currently
 *
 * @param {NodeList} galleryImages all gallery images (not in the sliders)
 */
export const setUpClickEvent = (galleryImages) => {
  if ( galleryImages.length ) {
    galleryImages.forEach(image => {
      image.addEventListener('click', (e) => {

        // thumbnail.go(image.dataset.index);
        window.sliders.thumbnail.go(image.dataset.index);

        handleGalleryPopup();
      });
    })
  }
}

/**
 * Helper function that returns the element of the main and thumbnail slider along with the settings for each respective slider when called.
 * This helps us grab the element and settings if we need to destory and rebuild due to filtering
 *
 * @returns Object
 */
export const getMainAndThumbnailSlidersAndSettings = () => {
  const mainSlider = document.querySelector('#main-slider');
  let mainSliderSettings = mainSlider.dataset.splide ? JSON.parse(mainSlider.dataset.splide) : {};
  mainSliderSettings = handleMergingCustomSettings(mainSlider, mainSliderSettings);

  const thumbnailSlider = document.querySelector('#thumbnail-slider');
  let thumbnailSliderSettings = thumbnailSlider.dataset.splide ? JSON.parse(thumbnailSlider.dataset.splide) : {};
  thumbnailSliderSettings = handleMergingCustomSettings(thumbnailSlider, thumbnailSliderSettings);

  return {
    main: {
      mainSlider,
      mainSliderSettings
    },
    thumbnail: {
      thumbnailSlider,
      thumbnailSliderSettings
    }
  };
}

/**
 * Helper function that will grab the main and thumbnail sliders on the gallery page, set up splide, sync
 * the two, then set our window object so they can be used in other files
 *
 */
export const initializeMainAndThumbnailSliders = () => {
  // Get out main and thumbnail sliders and settings
  const { main, thumbnail } = getMainAndThumbnailSlidersAndSettings();

  // Initialize Splide for each
  const mainSlider = new Splide(`#${main.mainSlider.id}`, main.mainSliderSettings);
  const thumbnailSlider = new Splide(`#${thumbnail.thumbnailSlider.id}`, thumbnail.thumbnailSliderSettings);

  // Sync and mount so the thumbnail slider changes the main slider when clicking on thumbnails
  mainSlider.sync( thumbnailSlider );
  mainSlider.mount();
  thumbnailSlider.mount();

  // Set our sliders in the window
  window.sliders = {
    main: mainSlider,
    thumbnail: thumbnailSlider
  };
}

/**
 * Destroys the main and thumbnail sliders, readds new filtered slides, then reintializes both so the user can
 * traverse the gallery based on the fitlered slides
 *
 * @param {String} mainFilteredSlides The string of new main slider slides to be added to the slider
 * @param {String} thumbnailFilteredSlides The string of new thumbnail slider slides to be added to the slider
 */
export const reinitializeSplideAfterFiltering = (mainFilteredSlides, thumbnailFilteredSlides) => {
  if ( window.sliders.main && window.sliders.thumbnail ) {
    window.sliders.main.destroy();
    window.sliders.thumbnail.destroy();

    // Go through the main and thumbnail popup splideJS elements, remove the current slides and add the filtered ones
    ['main', 'thumbnail'].forEach(sliderType => {
      const allCurrentSlides = window.sliders[sliderType].root.querySelectorAll('.splide__slide');

      if ( allCurrentSlides.length ) {
        allCurrentSlides.forEach(slide => slide.remove());

        const splideList = window.sliders[sliderType].root.querySelector('.splide__list');

        if ( splideList ) {
          let slidesToAdd = sliderType === 'main' ? mainFilteredSlides : thumbnailFilteredSlides;
          splideList.insertAdjacentHTML('beforeend', slidesToAdd);
        }
      }
    });

    // reinitialize the sliders and readd them to the window
    initializeMainAndThumbnailSliders();
  }
}

/**
 * Combines both the default admin settings with any custom settings
 *
 * @param {HTMLElement} slider The slider which we'll use to pull data attributes from
 * @param {Object} sliderSettingsJSON The object containing the slider settings set via the admin
 * @returns {Object} The combined default settings + any custom settings
 */
const handleMergingCustomSettings = (slider, sliderSettingsJSON) => {
  const mobileCustomSettings = slider.dataset.mobileCustomSettings ? JSON.parse(slider.dataset.mobileCustomSettings) : {};
  const tabletCustomSettings = slider.dataset.tabletCustomSettings ? JSON.parse(slider.dataset.tabletCustomSettings) : {};
  const desktopCustomSettings = slider.dataset.desktopCustomSettings ? JSON.parse(slider.dataset.desktopCustomSettings) : {};

  if ( Object.keys(mobileCustomSettings).length > 0 ) {
    sliderSettingsJSON.breakpoints['768'] = {...sliderSettingsJSON.breakpoints['768'], ...mobileCustomSettings};
  }

  if ( Object.keys(tabletCustomSettings).length > 0 ) {
    sliderSettingsJSON.breakpoints['1120'] = {...sliderSettingsJSON.breakpoints['1120'], ...tabletCustomSettings};
  }

  if ( Object.keys(desktopCustomSettings).length > 0 ) {
    sliderSettingsJSON = {...sliderSettingsJSON, ...desktopCustomSettings};
  }

  return sliderSettingsJSON;
}

const applyCustomPagination = (slider, splide) => {
  const pagination = slider.querySelector('.splide__custom-pagination');

  const updatePagination = () => {
    const activeIndex = splide.index;
    const totalSlides = splide.length;
    const paginationText = `${activeIndex + 1} - ${totalSlides}`;
    pagination.innerHTML = paginationText;
  };

  updatePagination();
  splide.on('moved', updatePagination);
};
