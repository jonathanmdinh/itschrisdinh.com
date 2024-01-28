import { Splide, SplidePagination } from "@splidejs/splide";

const initiateSplideSlider = ( selector = '.splide' ) => {
  const sliders = document.querySelectorAll(`${selector}`);
  if ( sliders.length > 0 ) {
    sliders.forEach( slider => {

      const sliderSettings = setSliderSettings( slider );
      const sliderId = slider.id;

      if ( sliderId ) {
        const splide = new Splide(`#${sliderId}`, sliderSettings).mount();

        if (slider.dataset.customPagination === 'true') {
          applyCustomPagination(splide);
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

  const sliderOptions = {
    rewind: true, //allow the carousel to infinitely loop.
    pagination: desktopPagination,
    breakpoints: {
      //mobile
      768: {

        pagination: mobilePagination
      },
      //tablet
      1120: {
        pagination: tabletPagination
      }
    }
  };
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


const applyCustomPagination = (splide) => {
  const pagination = splide.Components.Elements.pagination;

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
