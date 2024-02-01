function initiateNavigation() {
  const hamburger = document.getElementById('hamburger');
  const menuOverlay = document.getElementById('menuOverlay');
  // Close menu on menu-item click
  const menuLinks = document.querySelectorAll('.menu-link');
  const backgroundImageContainer = document.getElementById('backgroundImageContainer');
  const backgroundImageContainer2 = document.getElementById('backgroundImageContainer2');

  hamburger.addEventListener('click', function () {
    if (menuOverlay.classList.contains('hidden')) {
      menuOverlay.classList.remove('hidden');
      setTimeout(() => menuOverlay.classList.add('opacity-100'), 10); // Add opacity-100
      setTimeout(() => menuOverlay.classList.remove('opacity-0'), 10); // Remove opacity-0
    } else {
      menuOverlay.classList.remove('opacity-100');
      setTimeout(() => menuOverlay.classList.add('opacity-0'), 10); // Add opacity-0
      setTimeout(() => menuOverlay.classList.add('hidden'), 300); // Remove opacity and then hide
      if (backgroundImageContainer.classList.contains('opacity-40')) {
        backgroundImageContainer.classList.remove('opacity-40');
        backgroundImageContainer.classList.add('opacity-0');
      }
      if (backgroundImageContainer2.classList.contains('opacity-40')) {
        backgroundImageContainer2.classList.remove('opacity-40');
        backgroundImageContainer2.classList.add('opacity-0');
      }
    }
  });

  let currentBackgroundImage = '';

  document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('mouseenter', function() {
      const mobileImageUrl = this.getAttribute('data-image-mobile');
      const desktopImageUrl = this.getAttribute('data-image-desktop');
      const imageUrl = window.innerWidth >= 1024 ? desktopImageUrl : mobileImageUrl;

      if (currentBackgroundImage !== imageUrl) {


        updateBackgroundImage(imageUrl, backgroundImageContainer, backgroundImageContainer2);
        currentBackgroundImage = imageUrl;
      }
    });
  });
}

function updateBackgroundImage(newImageUrl, container1, container2) {
  // Set the new image on the inactive container and fade it in
  if (!container1.classList.contains('opacity-40')) {
    container1.style.backgroundImage = `url(${newImageUrl})`;
    container1.classList.remove('opacity-0');
    container1.classList.add('opacity-40');

    // Fade out the other container
    container2.classList.remove('opacity-40');
    container2.classList.add('opacity-0');
  } else {
    container2.style.backgroundImage = `url(${newImageUrl})`;
    container2.classList.remove('opacity-0');
    container2.classList.add('opacity-40');

    // Fade out the other container
    container1.classList.remove('opacity-40');
    container1.classList.add('opacity-0');
  }
}

export default initiateNavigation;
