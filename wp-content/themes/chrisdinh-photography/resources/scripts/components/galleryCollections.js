import sendRequest from "@scripts/util/sendRequest";
import { reinitializeSplideAfterFiltering, setUpClickEvent } from "./splide.js";
import initializeGallery from "./gallery.js";

const handleGalleryCollectionFilterClick = () => {
  const galleryCollections = document.querySelectorAll('button.gallery-collections__collection');

  if (galleryCollections.length < 1) return;

  galleryCollections.forEach(filter => {
    filter.addEventListener('click', (e) => {
      e.preventDefault();

      const termSlug = filter.dataset.termSlug;
      const termId = filter.dataset.termId;

      const data = {
        termSlug,
        termId
      };

      galleryCollections.forEach(filter => {
        if ( filter.classList.contains('gallery-collections__collection--active') ) {
          filter.classList.remove('gallery-collections__collection--active');
          filter.classList.remove('border-b');
        }
      });

      filter.classList.add('gallery-collections__collection--active');

      sendRequest(`${window.location.origin}/wp-admin/admin-ajax.php?action=handle_filtering_gallery`, {
        headers: {
          'Content-Type': 'application/json'
        }
      }, data)
        .then(data => {
          const galleryItemsOverlay = document.querySelector('.gallery-items__overlay');

          if ( data.length > 0 ) {
            const galleryImagesContainer = document.querySelector('section.gallery-items');
            const allCurrentGalleryImages = document.querySelectorAll('.gallery-item__image');
            let newImagesHtml = '';
            let newThumbnailImages = '';
            let newMainImages = '';

            // Create our string of HTML that will be parsed and injected into the DOM after all current gallery items are removed
            data.forEach((image, index) => {
              newImagesHtml += `<div class="gallery-item__image block overflow-hidden cursor-pointer transition-all duration-500 opacity-0 delay-150">
                    <img data-index="${index}" src="${image.imageUrl}" alt="${image.imageAlt}" class="relative object-cover block transition-all duration-1000 w-full h-full">
                </div>`;

              newThumbnailImages += `<li class="splide__slide">
                  <picture class="max-w-[100px] max-h-auto">
                      <img src="${image.imageUrl}" alt="${image.imageAlt}" class="w-full h-full object-cover">
                  </picture>
              </li>`;

              newMainImages += `<li class="splide__slide">
                  <div class="lg:max-h-[90vh] flex flex-col justify-center items-center">
                      <picture class="w-full h-auto">
                          <img
                              src="${image.imageUrl}"
                              alt="${image.imageAlt}"
                              class="relative w-full h-full object-cover md:object-fill md:h-auto md:max-w-[90%] mx-auto"
                              >
                      </picture>
                      <div class="gallery-main-slider__meta-data pt-5">
                        <p class="gallery-main-slider__description text-white text-center">${image.excerpt ? image.excerpt : ''}</p>
                      </div>
                  </div>
              </li>`;
            });

            // Dont show the transition of images by activating the overlay
            if ( galleryItemsOverlay ) {
              galleryItemsOverlay.classList.add('gallery-items__overlay--active');
            }

            if ( allCurrentGalleryImages.length > 0 ) {
              allCurrentGalleryImages.forEach(image => image.remove());
            }

            galleryImagesContainer.insertAdjacentHTML('beforeend', newImagesHtml);

            // Remove the overlay so users can see the new images
            if ( galleryItemsOverlay ) {
              galleryItemsOverlay.classList.remove('gallery-items__overlay--active');
            }

            initializeGallery();

            setUpClickEvent(galleryImagesContainer.querySelectorAll('.gallery-item__image img'));

            reinitializeSplideAfterFiltering(newMainImages, newThumbnailImages);
          }

        })
        .catch(error => console.error(error));
    });
  });
}

export default handleGalleryCollectionFilterClick;
