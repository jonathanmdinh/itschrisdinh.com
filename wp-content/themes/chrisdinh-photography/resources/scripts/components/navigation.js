function initiateNavigation() {
  const hamburger = document.getElementById('hamburger');
  const menuOverlay = document.getElementById('menuOverlay');
  // Close menu on menu-item click
  const menuLinks = document.querySelectorAll('.menu-link');

  hamburger.addEventListener('click', function () {
    if (menuOverlay.classList.contains('hidden')) {
      menuOverlay.classList.remove('hidden');
      setTimeout(() => menuOverlay.classList.add('opacity-100'), 10); // Add opacity-100
      setTimeout(() => menuOverlay.classList.remove('opacity-0'), 10); // Remove opacity-0
    } else {
      menuOverlay.classList.remove('opacity-100');
      setTimeout(() => menuOverlay.classList.add('opacity-0'), 10); // Add opacity-0
      setTimeout(() => menuOverlay.classList.add('hidden'), 300); // Remove opacity and then hide
    }
  });

  document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('mouseenter', function() {
      const mobileImageUrl = this.getAttribute('data-image-mobile');
      const desktopImageUrl = this.getAttribute('data-image-desktop');
      const imageUrl = window.innerWidth >= 1024 ? desktopImageUrl : mobileImageUrl;

      console.log("Hovered Image URL:", imageUrl); // Log the URL
      menuOverlay.style.backgroundImage = `url(${imageUrl})`;
    });

    item.addEventListener('mouseleave', function() {
      menuOverlay.style.backgroundImage = 'none';
    });
  });



}


export default initiateNavigation;
