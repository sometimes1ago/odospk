let dockOpener = document.querySelector('.dock-opener');
let dockContent = document.querySelector('.bottom-dock');
let dockCloser = document.querySelector('.dock-closer');
let pageFilter = document.querySelector('.filter');

dockOpener.addEventListener('click', () => {
  pageFilter.classList.remove('hidden');
  dockContent.classList.remove('hidden');
});

dockCloser.addEventListener('click', () => {
  pageFilter.classList.add('hidden');
  dockContent.classList.add('hidden');
});