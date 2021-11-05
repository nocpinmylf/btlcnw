$(document).ready(() => {
  const collapseBTN = document.getElementById('collaspe-btn');
  const headerNavContent = document.getElementsByClassName('nav')[0];
  const headerNav = document.querySelector('.header-nav');

  // header
  collapseBTN.addEventListener('click', () => {
    headerNavContent.classList.toggle('hide');
  });

  window.addEventListener('scroll', () => {
    if (window.pageYOffset > 50) {
      headerNav.classList.add('show');
    }

    else {
      headerNav.classList.remove('show');
    }
  })
  // Quantity
  let min = 1;
  let max = 99;
  $('#quantity-sub').click(() => {
    let num = parseInt($('#quantity').val());
    if(num > min) num--;
    else return;
    if(num == min) $('#quantity-sub').prop('disabled', true);
    if(num < max) $('#quantity-add').prop('disabled', false);
    $('#quantity').val(num);
  });

  $('#quantity-add').click(() => {
    let num = parseInt($('#quantity').val());
    if(num < max) num++;
    else return;
    if(num == max) $('#quantity-add').prop('disabled', true);
    if(num > min) $('#quantity-sub').prop('disabled', false);
    $('#quantity').val(num);
  });

  $('#quantity').change(() => {
    let num = parseInt($('#quantity').val());
    if(num > max) {
      num = max;
      $('#quantity').val(max);
    }
    if(num < min) {
      num = min; 
      $('#quantity').val(min);
    }
    if(num == max) $('#quantity-add').prop('disabled', true);
    if(num == min) $('#quantity-sub').prop('disabled', true);
  });

  // Slides
  $('.slick-carousel').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    arrows: true,
    dots: false,
    autoplay: true,
    autoplaySpeed: 4000
  });

  $('.items-slide').slick({
    dots: false,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 670,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          centerMode: true,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  $('.detail-slide-small').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    asNavFor: '.detail-slide-img',
    responsive: [{
      breakpoint: 480,
      settings: {
        centerMode: true,
        arrows: false,
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }]
  });

  $('.detail-slide-img').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    asNavFor: '.detail-slide-small'
  });

  //-----JS for Price Range slider-----
  $(() => {
    if (document.getElementsByTagName('main')[0].classList.contains('product-list')) {
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

    }
  });
});