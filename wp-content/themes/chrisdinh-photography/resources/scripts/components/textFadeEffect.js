/**
 * Handles the fade effect visibility for a container with scrolling content.
 *
 * @param {string} bioContainerId - The ID of the scrollable container.
 * @param {string} fadeEffectId - The ID of the fade effect container.
 */
export function initializeFadeEffect(bioContainerId, fadeEffectId) {
  console.log('initializeFadeEffect is running');

  const bioContainer = document.getElementById(bioContainerId);
  const fadeEffect = document.getElementById(fadeEffectId);

  if (!bioContainer || !fadeEffect) {
      console.warn('Fade effect: Container or fade element not found.');
      return;
  }

  const updateFadeEffect = () => {
      if (bioContainer.scrollHeight > bioContainer.clientHeight) {
          fadeEffect.classList.remove('hidden');
      } else {
          fadeEffect.classList.add('hidden');
      }
  };

  // Initial check
  updateFadeEffect();

  // Re-check on window resize
  window.addEventListener('resize', updateFadeEffect);
}
