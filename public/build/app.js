(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_app_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./styles/app.scss */ "./assets/styles/app.scss");
/* harmony import */ var _js_header__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./js/header */ "./assets/js/header.js");
/* harmony import */ var _js_header__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_js_header__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _js_slider__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./js/slider */ "./assets/js/slider.js");
/* harmony import */ var _js_slider__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_js_slider__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _js_scroll_top__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./js/scroll-top */ "./assets/js/scroll-top.js");
/* harmony import */ var _js_scroll_top__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_js_scroll_top__WEBPACK_IMPORTED_MODULE_3__);
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)





/***/ }),

/***/ "./assets/js/header.js":
/*!*****************************!*\
  !*** ./assets/js/header.js ***!
  \*****************************/
/***/ (() => {

var burger = document.querySelector('.hamburger');
var navigation = document.querySelector('.navigation');
var header = document.querySelector('header'); // const link = document.querySelectorAll('li');

burger.addEventListener('click', function () {
  navigation.classList.toggle('menu-hamburger');
  header.classList.toggle('height'); // link.classList.toggle('color');
});

/***/ }),

/***/ "./assets/js/scroll-top.js":
/*!*********************************!*\
  !*** ./assets/js/scroll-top.js ***!
  \*********************************/
/***/ (() => {

var arrow = document.querySelector('.top-arrow'); // La propriété onscroll renvoie le gestionnaire d'évènements pour l'objet window

window.onscroll = function () {
  scroll();
};

arrow.addEventListener('click', top());

function scroll() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    arrow.style.visibility = "visible";
  } else {
    arrow.style.visibility = "hidden";
  }
}

function top() {
  console.log('Where u at again foo ?');
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

/***/ }),

/***/ "./assets/js/slider.js":
/*!*****************************!*\
  !*** ./assets/js/slider.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! core-js/modules/web.timers.js */ "./node_modules/core-js/modules/web.timers.js");

var img = document.getElementsByClassName('img-slider');
var step = 0;
var nbr_img = img.length;
var next = document.querySelector('.next');
var back = document.querySelector('.back');
var slider = document.querySelector('.slider');
next.addEventListener('click', nextSlide);
back.addEventListener('click', previousSlide);

function removeActiveImg() {
  for (var i = 0; i < nbr_img; i++) {
    img[i].classList.remove('active');
  }
}

function nextSlide() {
  step++;

  if (step >= nbr_img) {
    step = 0;
  }

  removeActiveImg();
  img[step].classList.add('active');
}

function previousSlide() {
  step--;

  if (step < 0) {
    step = nbr_img - 1;
  }

  removeActiveImg();
  img[step].classList.add('active'); // console.log(nbr_img);
}

setInterval(function () {
  step++;

  if (step >= nbr_img) {
    step = 0;
  }

  removeActiveImg();
  img[step].classList.add('active');
}, 3000);

/***/ }),

/***/ "./assets/styles/app.scss":
/*!********************************!*\
  !*** ./assets/styles/app.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_modules_web_timers_js"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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SixhQUFULEdBQXdCO0VBQ3BCUCxJQUFJOztFQUNKLElBQUdBLElBQUksR0FBRyxDQUFWLEVBQVk7SUFDUkEsSUFBSSxHQUFHQyxPQUFPLEdBQUcsQ0FBakI7RUFDSDs7RUFDRE8sZUFBZTtFQUNmVixHQUFHLENBQUNFLElBQUQsQ0FBSCxDQUFVaEIsU0FBVixDQUFvQjJCLEdBQXBCLENBQXdCLFFBQXhCLEVBTm9CLENBT3BCO0FBRUg7O0FBRURDLFdBQVcsQ0FBQyxZQUFNO0VBQ2RaLElBQUk7O0VBQ0osSUFBR0EsSUFBSSxJQUFJQyxPQUFYLEVBQW1CO0lBQ2ZELElBQUksR0FBRyxDQUFQO0VBQ0g7O0VBQ0RRLGVBQWU7RUFDZlYsR0FBRyxDQUFDRSxJQUFELENBQUgsQ0FBVWhCLFNBQVYsQ0FBb0IyQixHQUFwQixDQUF3QixRQUF4QjtBQUVILENBUlUsRUFRUixJQVJRLENBQVg7Ozs7Ozs7Ozs7OztBQ3RDQSIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL2Fzc2V0cy9hcHAuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2hlYWRlci5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvc2Nyb2xsLXRvcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvc2xpZGVyLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zdHlsZXMvYXBwLnNjc3MiXSwic291cmNlc0NvbnRlbnQiOlsiLypcbiAqIFdlbGNvbWUgdG8geW91ciBhcHAncyBtYWluIEphdmFTY3JpcHQgZmlsZSFcbiAqXG4gKiBXZSByZWNvbW1lbmQgaW5jbHVkaW5nIHRoZSBidWlsdCB2ZXJzaW9uIG9mIHRoaXMgSmF2YVNjcmlwdCBmaWxlXG4gKiAoYW5kIGl0cyBDU1MgZmlsZSkgaW4geW91ciBiYXNlIGxheW91dCAoYmFzZS5odG1sLnR3aWcpLlxuICovXG5cbi8vIGFueSBDU1MgeW91IGltcG9ydCB3aWxsIG91dHB1dCBpbnRvIGEgc2luZ2xlIGNzcyBmaWxlIChhcHAuY3NzIGluIHRoaXMgY2FzZSlcbmltcG9ydCAnLi9zdHlsZXMvYXBwLnNjc3MnO1xuXG5pbXBvcnQgJy4vanMvaGVhZGVyJztcbmltcG9ydCAnLi9qcy9zbGlkZXInO1xuaW1wb3J0ICcuL2pzL3Njcm9sbC10b3AnO1xuXG4iLCJjb25zdCBidXJnZXIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuaGFtYnVyZ2VyJyk7XHJcbmNvbnN0IG5hdmlnYXRpb24gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcubmF2aWdhdGlvbicpO1xyXG5jb25zdCBoZWFkZXIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdoZWFkZXInKTtcclxuLy8gY29uc3QgbGluayA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJ2xpJyk7XHJcblxyXG5idXJnZXIuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoKT0+e1xyXG4gICAgbmF2aWdhdGlvbi5jbGFzc0xpc3QudG9nZ2xlKCdtZW51LWhhbWJ1cmdlcicpOyBcclxuICAgIGhlYWRlci5jbGFzc0xpc3QudG9nZ2xlKCdoZWlnaHQnKTtcclxuICAgIC8vIGxpbmsuY2xhc3NMaXN0LnRvZ2dsZSgnY29sb3InKTtcclxufSlcclxuXHJcblxyXG5cclxuIiwiXG5cbmNvbnN0IGFycm93ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLnRvcC1hcnJvdycpO1xuXG4vLyBMYSBwcm9wcmnDqXTDqSBvbnNjcm9sbCByZW52b2llIGxlIGdlc3Rpb25uYWlyZSBkJ8OpdsOobmVtZW50cyBwb3VyIGwnb2JqZXQgd2luZG93XG5cbndpbmRvdy5vbnNjcm9sbCA9IGZ1bmN0aW9uKCkge3Njcm9sbCgpfTtcblxuYXJyb3cuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCB0b3AoKSk7XG5cbmZ1bmN0aW9uIHNjcm9sbCgpe1xuICAgIGlmKGRvY3VtZW50LmJvZHkuc2Nyb2xsVG9wID4gMjAgfHwgZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LnNjcm9sbFRvcCA+IDIwKXtcbiAgICAgICAgYXJyb3cuc3R5bGUudmlzaWJpbGl0eSA9IFwidmlzaWJsZVwiO1xuICAgIH0gZWxzZSB7XG4gICAgICAgIGFycm93LnN0eWxlLnZpc2liaWxpdHkgPVwiaGlkZGVuXCI7XG4gICAgfVxufVxuXG5mdW5jdGlvbiB0b3AoKXtcbiAgICBjb25zb2xlLmxvZygnV2hlcmUgdSBhdCBhZ2FpbiBmb28gPycpXG4gICAgZG9jdW1lbnQuYm9keS5zY3JvbGxUb3AgPSAwO1xuICAgIGRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5zY3JvbGxUb3AgPSAwO1xufSIsImxldCBpbWcgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCdpbWctc2xpZGVyJyk7XG5sZXQgc3RlcCA9IDA7XG5sZXQgbmJyX2ltZyA9IGltZy5sZW5ndGg7XG5sZXQgbmV4dCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5uZXh0Jyk7XG5sZXQgYmFjayA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5iYWNrJyk7XG5jb25zdCBzbGlkZXIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuc2xpZGVyJyk7XG5cbm5leHQuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBuZXh0U2xpZGUpO1xuYmFjay5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIHByZXZpb3VzU2xpZGUpO1xuXG5cbmZ1bmN0aW9uIHJlbW92ZUFjdGl2ZUltZygpeyAgIFxuICAgIGZvcihsZXQgaSA9IDA7IGkgPCBuYnJfaW1nOyBpKyspe1xuICAgICAgICBpbWdbaV0uY2xhc3NMaXN0LnJlbW92ZSgnYWN0aXZlJyk7XG4gICAgfVxufVxuXG5mdW5jdGlvbiBuZXh0U2xpZGUoKXtcbiAgICBzdGVwKys7XG4gICAgaWYoc3RlcCA+PSBuYnJfaW1nKXtcbiAgICAgICAgc3RlcCA9IDA7XG4gICAgfVxuICAgIHJlbW92ZUFjdGl2ZUltZygpO1xuICAgIGltZ1tzdGVwXS5jbGFzc0xpc3QuYWRkKCdhY3RpdmUnKTtcblxufVxuXG5mdW5jdGlvbiBwcmV2aW91c1NsaWRlKCl7XG4gICAgc3RlcCAtLTtcbiAgICBpZihzdGVwIDwgMCl7XG4gICAgICAgIHN0ZXAgPSBuYnJfaW1nIC0gMTsgXG4gICAgfVxuICAgIHJlbW92ZUFjdGl2ZUltZygpO1xuICAgIGltZ1tzdGVwXS5jbGFzc0xpc3QuYWRkKCdhY3RpdmUnKTtcbiAgICAvLyBjb25zb2xlLmxvZyhuYnJfaW1nKTtcblxufVxuXG5zZXRJbnRlcnZhbCgoKSA9PiB7XG4gICAgc3RlcCsrO1xuICAgIGlmKHN0ZXAgPj0gbmJyX2ltZyl7XG4gICAgICAgIHN0ZXAgPSAwO1xuICAgIH1cbiAgICByZW1vdmVBY3RpdmVJbWcoKTtcbiAgICBpbWdbc3RlcF0uY2xhc3NMaXN0LmFkZCgnYWN0aXZlJyk7XG5cbn0sIDMwMDApIiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luXG5leHBvcnQge307Il0sIm5hbWVzIjpbImJ1cmdlciIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvciIsIm5hdmlnYXRpb24iLCJoZWFkZXIiLCJhZGRFdmVudExpc3RlbmVyIiwiY2xhc3NMaXN0IiwidG9nZ2xlIiwiYXJyb3ciLCJ3aW5kb3ciLCJvbnNjcm9sbCIsInNjcm9sbCIsInRvcCIsImJvZHkiLCJzY3JvbGxUb3AiLCJkb2N1bWVudEVsZW1lbnQiLCJzdHlsZSIsInZpc2liaWxpdHkiLCJjb25zb2xlIiwibG9nIiwiaW1nIiwiZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSIsInN0ZXAiLCJuYnJfaW1nIiwibGVuZ3RoIiwibmV4dCIsImJhY2siLCJzbGlkZXIiLCJuZXh0U2xpZGUiLCJwcmV2aW91c1NsaWRlIiwicmVtb3ZlQWN0aXZlSW1nIiwiaSIsInJlbW92ZSIsImFkZCIsInNldEludGVydmFsIl0sInNvdXJjZVJvb3QiOiIifQ==