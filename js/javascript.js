$(document).ready(() => {
  $(".owl-carousel").owlCarousel({
    loop:true,
    items:1,
    center: true,
    margin:0,
    nav: true,
    navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
    lazyLoad:true,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true
  });

  const collapseBTN = document.getElementById('collaspe-btn');
  const headerNavContent = document.getElementsByClassName('nav')[0];
  const headerNav = document.querySelector('.header-nav');
  const modalAds = document.querySelector('.modal');

  // header
  collapseBTN.addEventListener('click', () => {
    headerNavContent.classList.toggle('hide');
  });

  window.addEventListener('scroll', () => {
    if(window.pageYOffset > 150) {
      headerNav.classList.add('show');
    }

    else {
      headerNav.classList.remove('show');
    }
  })

  //
  // document.getElementById('close-modal').addEventListener('click', () => {
  //   modalAds.classList.toggle('hide')
  // })
});