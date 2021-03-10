// Preloader

window.onload = function() {
  document.querySelector('.preloader').classList.add("preloader-remove");
};

const body = document.querySelector('body');
const header = document.querySelector('.header');
const footer = document.querySelector('.footer');
const html = document.querySelector('html');
const intro = document.querySelector('.intro');

// Intro viewport height

intro.style.height = `${window.innerHeight}`;
let pageWidth = window.innerWidth;

window.addEventListener('resize', () => {
  if (pageWidth !== window.innerWidth) {
    intro.style.height = `${window.innerHeight}`;
    pageWidth = window.innerWidth;
  }
});

// No scroll for body

const bodyScrollOff = () => {
  body.classList.add('lock');
  body.style.position = 'fixed';
  body.style.width = '100%';
  body.style.top = `-${offset}px`;
}

const bodyScrollOn = () => {
  body.classList.remove('lock');
  body.style.position = '';
  body.style.width = '';
  body.style.top = '';
  window.scrollTo({
    top: offset
  });
}

// Mobile Menu

const burger = document.querySelector('.burger');
const main = document.querySelector('.main');
let offset = null;

burger.addEventListener('click', () => {
  burger.classList.toggle('active');
  header.classList.toggle('active');

  if (burger.classList.contains('active')) {
    offset = pageYOffset;
    bodyScrollOff();
  } else {
    bodyScrollOn();
  }
});

// Scroll to sections

const anchors = document.querySelectorAll('a[data-scroll]');

let headerHeight = 0;

const checkHeaderHeight = () => {
  if (header.classList.contains('fixed')) {
    headerHeight = parseInt(getComputedStyle(header).height.replace('px', ''));
  }
}

anchors.forEach(anchor => {
  anchor.addEventListener('click', (event) => {
    event.preventDefault();

    const section = document.querySelector(anchor.getAttribute('data-scroll'));
    const bodyRect = document.body.getBoundingClientRect().top; 
    const sectionRect = section.getBoundingClientRect().top; 
    const sectionPosition = sectionRect - bodyRect; 
    const setPosition = sectionPosition - headerHeight + 2; 

    if (burger.classList.contains('active')) {
      offset = '';
      bodyScrollOn();
      burger.classList.toggle('active');
      header.classList.toggle('active');
    }

    scrollTo({
      top: setPosition,
      behavior: 'smooth'
    });
  });
});

// Active anchors and fixed header

window.addEventListener('scroll', () => {
  const sections = document.querySelectorAll('.section');

  sections.forEach(section => {
    const top = section.getBoundingClientRect().top + pageYOffset - 300;
    const bottom = top + section.scrollHeight;
    const scroll = window.pageYOffset;
    const id = section.getAttribute('id');

    if ( scroll > top && scroll < bottom) {
      anchors.forEach(anchor => {
        anchor.classList.remove('active');
      });
      document.querySelector(`a[data-scroll=".${id}"]`).classList.add('active');
    }
  });

  if (pageYOffset > (window.innerHeight - 100)) {
    header.classList.add('fixed');
    checkHeaderHeight();
  } else {
    header.classList.remove('fixed');
  }
});

// Modal

const modal = document.querySelector('.modal');
const modalClose = document.querySelector('.modal-close');
const modalLinks = document.querySelectorAll('.modal-link');

const modalOn = () => {
  offset = pageYOffset;
  bodyScrollOff();
  modal.classList.toggle('active');

  if(window.innerWidth > 992) {
    body.style.paddingRight = '17px';
    header.style.paddingRight = '17px';
    footer.style.paddingRight = '17px';
    footer.style.width = 'calc(100% + 17px)';
  }
};

const modalOff = () => {
  bodyScrollOn();
  modal.classList.toggle('active');

  if(window.innerWidth > 992) {
    body.style.paddingRight = '0';
    header.style.paddingRight = '0';
    footer.style.paddingRight = '0';
    footer.style.width = 'auto';
  }
};

modalLinks.forEach(link => {
  link.addEventListener('click', () => {
    modalOn();
  });
});

modalClose.addEventListener('click', () => {
  modalOff();
});

// Slider

$('.intro__slider').owlCarousel({
  loop:false,
  margin:0,
  nav:true,
  lazyLoad:true,
  lazyLoadEager:1,
  items: 1
});

$('.portfolio__slider').owlCarousel({
  loop:false,
  margin:5,
  nav:true,
  thumbs:false,
  mouseDrag:false,
  touchDrag:false,
  autoHeight:true,
  items:1
});

$('.portfolio__inner-slider').owlCarousel({
  loop:false,
  margin:0,
  nav:false,
  thumbs:true,
  thumbsPrerendered:false,
  dots:false,
  lazyLoad:true,
  lazyLoadEager:1,
  items:1
});

// Lazyload

$(function() {
  $('.lazy').lazy({
    combined: true,
    delay:1000
  });
});
