import { Splide, SplidePagination } from "@splidejs/splide";
import { handleGalleryPopup } from "@scripts/util/galleryPopup";

const initiateSplideSlider = ( selector = '.splide' ) => {
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

    const mainSlider = document.querySelector('#main-slider');
    let mainSliderSettings = mainSlider.dataset.splide ? JSON.parse(mainSlider.dataset.splide) : {};
    mainSliderSettings = handleMergingCustomSettings(mainSlider, mainSliderSettings);

    const thumbnailSlider = document.querySelector('#thumbnail-slider');
    let thumbnailSliderSettings = thumbnailSlider.dataset.splide ? JSON.parse(thumbnailSlider.dataset.splide) : {};
    thumbnailSliderSettings = handleMergingCustomSettings(thumbnailSlider, thumbnailSliderSettings);

    const main = new Splide(`#${mainSlider.id}`, mainSliderSettings);
    const thumbnail = new Splide(`#${thumbnailSlider.id}`, thumbnailSliderSettings);

    main.sync( thumbnail );
    main.mount();
    thumbnail.mount();

    const allGalleryImages = document.querySelectorAll('.gallery-item__image img');

    if ( allGalleryImages ) {
      allGalleryImages.forEach(image => {
        image.addEventListener('click', (e) => {
          handleGalleryPopup(thumbnail, image.dataset.index);
        });
      })
    }
  }
};

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

export default initiateSplideSlider;
