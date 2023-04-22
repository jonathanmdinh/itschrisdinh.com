import { Splide } from "@splidejs/splide";

const initiateSplideSlider = ( selector = '.splide' ) => {
  const sliders = document.querySelectorAll(`${selector}`);

  if ( sliders.length > 0 ) {
    sliders.forEach( slider => {

      const sliderSettings = setSliderSettings( slider );
      const sliderId = slider.id;

      if ( sliderId ) {
        new Splide(`#${sliderId}`, sliderSettings).mount();
      }
    });
  }
};

const setSliderSettings = ( slider ) => {
  const sliderOptions = {
    breakpoints: {
      768: {},
      1120: {}
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

export default initiateSplideSlider;
