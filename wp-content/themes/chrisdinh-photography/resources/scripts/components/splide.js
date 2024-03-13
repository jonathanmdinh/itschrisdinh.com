import { Splide, SplidePagination } from "@splidejs/splide";

const initiateSplideSlider = ( selector = '.splide' ) => {
  const sliders = document.querySelectorAll(`${selector}`);
  if ( sliders.length > 0 ) {
    sliders.forEach( slider => {

      const sliderSettingsJSON = slider.dataset.splide ? JSON.parse(slider.dataset.splide) : {};
      const sliderId = slider.id;

      if ( sliderId && Object.keys(sliderSettingsJSON).length > 0 ) {
        const splide = new Splide(`#${sliderId}`, sliderSettingsJSON).mount();

        if (slider.dataset.customPagination === 'true') {
          applyCustomPagination(slider, splide);
        }
      }
    });
  }
};

const setSliderSettings = ( slider ) => {
  const paginationSettings = slider.dataset.pagination.split(',');
  const mobilePagination = paginationSettings[0] === 'true';
  const tabletPagination = paginationSettings[1] === 'true';
  const desktopPagination = paginationSettings[2] === 'true';

  const arrowSettings = slider.dataset.arrows.split(',');
  const mobileArrows = arrowSettings[0] === 'true';
  const tabletArrows = arrowSettings[1] === 'true';
  const desktopArrows = arrowSettings[2] === 'true';

  const mobileCustomSettings = slider.dataset.mobileCustomSettings;
  const tabletCustomSettings = slider.dataset.tabletCustomSettings;
  const desktopCustomSettings = slider.dataset.desktopCustomSettings;

  console.log(JSON.parse(mobileCustomSettings), JSON.parse(tabletCustomSettings), JSON.parse(desktopCustomSettings));

  const sliderOptions = {
    rewind: true, //allow the carousel to infinitely loop.
    pagination: desktopPagination,
    arrows: desktopArrows,
    breakpoints: {
      //mobile
      768: {
        arrows: mobileArrows,
        pagination: mobilePagination
      },
      //tablet
      1120: {
        arrows: tabletArrows,
        pagination: tabletPagination
      }
    }
  };

  // sliderOptions.breakpoints['768'] = {...sliderOptions.breakpoints['768'], ...mobileCustomSettings.reduce( (obj, item) => (obj[item.key] = item.value, obj))};
  console.log(sliderOptions);
  console.log( JSON.parse(mobileCustomSettings).reduce( (obj, item) => (obj[item.key] = item.value, obj), {}) )

  sliderOptions.type = slider.dataset.sliderType ? slider.dataset.sliderType : 'loop'; // Set loop as default slider type if none is provided
  sliderOptions.mediaQuery = 'min'; // Set mediaQuery to min so our breakpoints are mobile first

  const sliderDataset = slider.dataset;

  for ( let attribute in sliderDataset ) {
    if ( attribute === 'type' ) {
      sliderOptions.type = sliderDataset[attribute];
    } else {

      if ( sliderDataset[attribute] !== ',,' ) {

        const settingsArray = sliderDataset[attribute].split(',');

        if ( settingsArray.length === 3 ) {
          // Settings with breakpoint capabilities
          sliderOptions[attribute] = settingsArray[0];
          sliderOptions.breakpoints['768'][attribute] = settingsArray[1];
          sliderOptions.breakpoints['1120'][attribute] = settingsArray[2];
        } else {
          // Settings without breakpoint capabilities
          sliderOptions[attribute] = sliderDataset[attribute];
        }
      }
    }
  }

  return sliderOptions;
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
