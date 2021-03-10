"use strict";

// Preloader
window.onload = function () {
  document.querySelector('.preloader').classList.add("preloader-remove");
};

var body = document.querySelector('body');
var header = document.querySelector('.header');
var footer = document.querySelector('.footer');
var html = document.querySelector('html');
var intro = document.querySelector('.intro'); // Intro viewport height

intro.style.height = "".concat(window.innerHeight);
var pageWidth = window.innerWidth;
window.addEventListener('resize', function () {
  if (pageWidth !== window.innerWidth) {
    intro.style.height = "".concat(window.innerHeight);
    pageWidth = window.innerWidth;
  }
}); // No scroll for body

var bodyScrollOff = function bodyScrollOff() {
  body.classList.add('lock');
  body.style.position = 'fixed';
  body.style.width = '100%';
  body.style.top = "-".concat(offset, "px");
};

var bodyScrollOn = function bodyScrollOn() {
  body.classList.remove('lock');
  body.style.position = '';
  body.style.width = '';
  body.style.top = '';
  window.scrollTo({
    top: offset
  });
}; // Mobile Menu


var burger = document.querySelector('.burger');
var main = document.querySelector('.main');
var offset = null;
burger.addEventListener('click', function () {
  burger.classList.toggle('active');
  header.classList.toggle('active');

  if (burger.classList.contains('active')) {
    offset = pageYOffset;
    bodyScrollOff();
  } else {
    bodyScrollOn();
  }
}); // Scroll to sections

var anchors = document.querySelectorAll('a[data-scroll]');
var headerHeight = 0;

var checkHeaderHeight = function checkHeaderHeight() {
  if (header.classList.contains('fixed')) {
    headerHeight = parseInt(getComputedStyle(header).height.replace('px', ''));
  }
};

anchors.forEach(function (anchor) {
  anchor.addEventListener('click', function (event) {
    event.preventDefault();
    var section = document.querySelector(anchor.getAttribute('data-scroll'));
    var bodyRect = document.body.getBoundingClientRect().top;
    var sectionRect = section.getBoundingClientRect().top;
    var sectionPosition = sectionRect - bodyRect;
    var setPosition = sectionPosition - headerHeight + 2;

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
}); // Active anchors and fixed header

window.addEventListener('scroll', function () {
  var sections = document.querySelectorAll('.section');
  sections.forEach(function (section) {
    var top = section.getBoundingClientRect().top + pageYOffset - 300;
    var bottom = top + section.scrollHeight;
    var scroll = window.pageYOffset;
    var id = section.getAttribute('id');

    if (scroll > top && scroll < bottom) {
      anchors.forEach(function (anchor) {
        anchor.classList.remove('active');
      });
      document.querySelector("a[data-scroll=\".".concat(id, "\"]")).classList.add('active');
    }
  });

  if (pageYOffset > window.innerHeight - 100) {
    header.classList.add('fixed');
    checkHeaderHeight();
  } else {
    header.classList.remove('fixed');
  }
}); // Modal

var modal = document.querySelector('.modal');
var modalClose = document.querySelector('.modal-close');
var modalLinks = document.querySelectorAll('.modal-link');

var modalOn = function modalOn() {
  offset = pageYOffset;
  bodyScrollOff();
  modal.classList.toggle('active');

  if (window.innerWidth > 992) {
    body.style.paddingRight = '17px';
    header.style.paddingRight = '17px';
    footer.style.paddingRight = '17px';
    footer.style.width = 'calc(100% + 17px)';
  }
};

var modalOff = function modalOff() {
  bodyScrollOn();
  modal.classList.toggle('active');

  if (window.innerWidth > 992) {
    body.style.paddingRight = '0';
    header.style.paddingRight = '0';
    footer.style.paddingRight = '0';
    footer.style.width = 'auto';
  }
};

modalLinks.forEach(function (link) {
  link.addEventListener('click', function () {
    modalOn();
  });
});
modalClose.addEventListener('click', function () {
  modalOff();
}); // Slider

$('.intro__slider').owlCarousel({
  loop: false,
  margin: 0,
  nav: true,
  lazyLoad: true,
  lazyLoadEager: 1,
  items: 1
});
$('.portfolio__slider').owlCarousel({
  loop: false,
  margin: 5,
  nav: true,
  thumbs: false,
  mouseDrag: false,
  touchDrag: false,
  autoHeight: true,
  items: 1
});
$('.portfolio__inner-slider').owlCarousel({
  loop: false,
  margin: 0,
  nav: false,
  thumbs: true,
  thumbsPrerendered: false,
  dots: false,
  lazyLoad: true,
  lazyLoadEager: 1,
  items: 1
}); // Lazyload

$(function () {
  $('.lazy').lazy({
    combined: true,
    delay: 1000
  });
});