import { gsap } from "gsap";
import { Flip } from "gsap/dist/Flip.js";

// https://gsap.com/community/forums/topic/30406-animate-growing-grid-items/
// https://codepen.io/GreenSock/pen/mdPzJKp

gsap.registerPlugin(Flip);

const filterGallery = () => {
  const allCheckbox = document.querySelector('button.gallery-collections__collection--all');
  const filters = gsap.utils.toArray('.gallery-collections__collection:not(.gallery-collections__collection--all)');
  const items = gsap.utils.toArray('.gallery-item__image');

  filters.forEach(btn => btn.addEventListener('click', () => {
    updateFilters(filters, items, false);
  }));

  allCheckbox.addEventListener('click', () => {
    updateFilters(filters, items, true);
  });
}

const updateFilters = (filters, items, showAll = false) => {
  const state = Flip.getState(items); // get the current state
  let collections = [];

  if ( showAll ) {
    collections = filters.map(filter => filter.dataset.termSlug);
  } else {
    collections = filters.filter(filter => filter.classList.contains('gallery-collections__collection--active')).map(item => item.dataset.termSlug);
  }

  // adjust the display property of each item ("none" for filtered ones, "inline-flex" for matching ones)
  // items.forEach(item => item.style.display = matches.indexOf(item.dataset.terms) === -1 ? "none" : "inline-flex"); // If we need to support multiple collections on one
  items.forEach(item => item.style.display = collections.indexOf(item.dataset.terms) === -1 ? "none" : "inline-flex");

  // animate from the previous state
  Flip.from(state, {
    duration: 1,
    scale: true,
    absolute: true,
    ease: "power1.inOut",
    onEnter: elements => gsap.fromTo(elements, {opacity: 0, scale: 0}, {opacity: 1, scale: 1, duration: 1}),
    onLeave: elements => gsap.to(elements, {opacity: 0, scale: 0, duration: 1})
  });
}

export default filterGallery;

