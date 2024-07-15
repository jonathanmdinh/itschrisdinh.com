const handleGalleryCollectionFilterClick = () => {
  const galleryCollections = document.querySelectorAll('button.gallery-collections__collection');

  if (galleryCollections.length < 1) return;

  galleryCollections.forEach(filter => {
    filter.addEventListener('click', (e) => {
      e.preventDefault();

      galleryCollections.forEach(filter => {
        if ( filter.classList.contains('gallery-collections__collection--active') ) {
          filter.classList.remove('gallery-collections__collection--active');
          filter.classList.remove('border-b');
        }
      });

      filter.classList.add('gallery-collections__collection--active');
    });
  });
}

export default handleGalleryCollectionFilterClick;
