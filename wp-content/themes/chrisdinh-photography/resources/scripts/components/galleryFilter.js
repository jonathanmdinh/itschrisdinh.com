import mixitup from 'mixitup';

const galleryFilter = () => {
    const gallery = document.querySelector('#gallery');
    if (gallery) {
      const mixer = mixitup(gallery, {
        animation: {
          duration: 300
        }
      });
    }
};

export default galleryFilter;
