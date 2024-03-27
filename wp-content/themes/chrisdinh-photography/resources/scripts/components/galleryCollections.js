import sendRequest from "@scripts/util/sendRequest";

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

            // Create our string of HTML that will be parsed and injected into the DOM after all current gallery items are removed
            data.forEach(image => {
              newImagesHtml += `<div class="gallery-item__image block overflow-hidden cursor-pointer">
                    <img src="${image.imageUrl}" alt="${image.imageAlt}" class="relative object-cover block transition-all duration-1000 w-full h-full">
                </div>`;
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
          }

        })
        .catch(error => console.error(error));
    });
  });
}

export default handleGalleryCollectionFilterClick;
