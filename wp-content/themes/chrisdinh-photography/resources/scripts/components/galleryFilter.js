import mixitup from 'mixitup';

const galleryFilter = () => {
    const gallery = document.querySelector('#gallery');
    if (gallery) {
      const mixer = mixitup(gallery, {
        callbacks: {
          onMixEnd: (state, futureState) => {
            // console.log(state, futureState);
          }
        }
      });
    }
};

export default galleryFilter;
