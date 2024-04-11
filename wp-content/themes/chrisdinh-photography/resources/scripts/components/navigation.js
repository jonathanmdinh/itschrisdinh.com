function initiateNavigation() {
  const hamburger = document.getElementById('hamburger');
  const menuOverlay = document.getElementById('menuOverlay');
  const backgroundImageContainer = document.getElementById('backgroundImageContainer');
  const backgroundImageContainer2 = document.getElementById('backgroundImageContainer2');

  // Event listener for hamburger click to toggle menu overlay
  hamburger.addEventListener('click', () => {
    const isVisible = menuOverlay.classList.contains('hidden');
    toggleMenu(menuOverlay, backgroundImageContainer, backgroundImageContainer2, isVisible);
  });

  // Initialize hover effect on navigation items
  setupNavItemHoverEffect();

  let currentBackgroundImage = '';

  // Sets up a hover effect on each navigation item
  function setupNavItemHoverEffect() {
    document.querySelectorAll('.nav-item').forEach(item => {
      item.addEventListener('mouseenter', function() {
        const backgroundImage = this.getAttribute('data-image');
        if (currentBackgroundImage !== backgroundImage) {
          updateBackgroundImage(backgroundImage, backgroundImageContainer, backgroundImageContainer2);
          currentBackgroundImage = backgroundImage;
        }
      })
    })
  }
}

// Toggle menu overlay visibility and resets background images
function toggleMenu (overlay, container1, container2, isVisible) {
  toggleVisibility(overlay, isVisible);
  resetBackgroundImages(container1, container2, isVisible);
}

// Toggle visibility of an element with a fade-in/out effect
function toggleVisibility(element, show) {
  if (show) {
    element.classList.remove('hidden');
    setTimeout(() => element.classList.add('opacity-100'), 10);
    setTimeout(() => element.classList.remove('opacity-0'),10);
  }
  else {
    element.classList.remove('opacity-100');
    setTimeout(() => element.classList.add('opacity-0'), 10);
    setTimeout(() => element.classList.add('hidden'), 300);
  }
}

// Reset background images when hamburger menu is closed
function resetBackgroundImages(container1, container2, isVisible) {
  if (!isVisible) {
    container1.classList.remove('opacity-40');
    container1.classList.add('opacity-0');
    container2.classList.remove('opacity-40');
    container2.classList.add('opacity-0');
  }
}

// Update the background image
function updateBackgroundImage(newBackgroundImage, container1, container2) {
  const targetContainer = container1.classList.contains('opacity-40') ? container2 : container1;
  const fadeOutContainer = container1.classList.contains('opacity-40') ? container1 : container2;

  targetContainer.style.backgroundImage = `url(${newBackgroundImage})`;
  targetContainer.classList.remove('opacity-0');
  targetContainer.classList.add('opacity-40');

  fadeOutContainer.classList.remove('opacity-40');
  fadeOutContainer.classList.add('opacity-0');
}



export default initiateNavigation;
