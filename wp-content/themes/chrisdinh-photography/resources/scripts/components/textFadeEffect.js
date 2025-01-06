/**
 * Handles the fade effect visibility for a container with scrolling content.
 *
 * @param {string} bioContainerId - The ID of the scrollable container.
 * @param {string} fadeEffectId - The ID of the fade effect container.
 */
export function initializeFadeEffect(bioContainerId, fadeEffectId) {

  const bioContainer = document.getElementById(bioContainerId);
  const fadeEffect = document.getElementById(fadeEffectId);

  if (!bioContainer || !fadeEffect) {
      console.warn('Fade effect: Container or fade element not found.');
      return;
  }

  const updateFadeEffect = () => {
    console.log('Screen Width:', window.innerWidth);
    console.log('bioContainer.scrollHeight:', bioContainer.scrollHeight);
    console.log('bioContainer.clientHeight:', bioContainer.clientHeight);

    if (window.innerWidth >= 1280) { // Tailwind's xl breakpoint
      if (bioContainer.scrollHeight > 500) {
        fadeEffect.classList.remove('!hidden'); // Show fade effect by default
      } else {
        fadeEffect.classList.add('!hidden'); // Hide fade effect if no scroll is needed
      }
    } else {
      fadeEffect.classList.add('!hidden'); // Always hide fade effect on smaller screens
    }
  };

  const handleScroll = () => {
    // Check if the user has scrolled to the bottom of the container
    const isAtBottom = Math.ceil(bioContainer.scrollTop + bioContainer.clientHeight) >= bioContainer.scrollHeight;

    if (isAtBottom) {
      fadeEffect.classList.add('!hidden'); // Hide fade effect when at the bottom
    } else {
      fadeEffect.classList.remove('!hidden'); // Show fade effect otherwise
    }
  };

  // Initial check
  updateFadeEffect();

  // Listen for scrolling inside the container
  bioContainer.addEventListener('scroll', handleScroll);

  // Re-check on window resize
  window.addEventListener('resize', updateFadeEffect);
}
