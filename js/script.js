const navbarTop = document.querySelector('.navbar-top');
const collapseNavbar = document.querySelector('.collapse-navbar');

collapseNavbar.addEventListener('show.bs.collapse', () => {
  navbarTop.classList.toggle('rounded-5', true);
  navbarTop.classList.toggle('rounded-pill', false);
});

collapseNavbar.addEventListener('hide.bs.collapse', () => {
  navbarTop.classList.toggle('rounded-5', false);
  navbarTop.classList.toggle('rounded-pill', true);
});