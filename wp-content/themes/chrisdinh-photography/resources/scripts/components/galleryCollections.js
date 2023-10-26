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

      console.log(data)

      sendRequest(`${window.location.origin}/wp-admin/admin-ajax.php?action=handle_filtering_gallery`, {}, data)
        .then(data => console.log(data))
        .catch(error => console.error(error));
    });
  });
}

export default handleGalleryCollectionFilterClick;
