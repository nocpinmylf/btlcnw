$(document).ready(() => {
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

  $('.slick-carousel').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    arrows:true,
    dots: false,
    autoplay: true,
    autoplaySpeed: 4000
  });

  //-----JS for Price Range slider-----
  $(() => {
    let minPrice = document.getElementById('amountMin');
    let maxPrice = document.getElementById('amountMax');
    
    $("#slider-range").slider({
      range: true,
      min: parseFloat(minPrice.value),
      max: parseFloat(maxPrice.value),
      values: [parseFloat(minPrice.value), parseFloat(maxPrice.value)],
      slide: (event, ui) => {
      $("#amountMin").val(ui.values[0]);
      $("#amountMax").val(ui.values[1]);
      }
    });
    $("#amountMin, #amountMax").on("change", () => {
      $("#slider-range").slider("values", [parseFloat(minPrice.value), parseFloat(maxPrice.value)]);
    });
  });
});