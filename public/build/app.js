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
var etape = 0;
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
  etape++;

  if (etape >= nbr_img) {
    etape = 0;
  }

  removeActiveImg();
  img[etape].classList.add('active');
}

function previousSlide() {
  etape--;

  if (etape < 0) {
    etape = nbr_img - 1;
  }

  removeActiveImg();
  img[etape].classList.add('active'); // console.log(nbr_img);
}

setInterval(function () {
  etape++;

  if (etape >= nbr_img) {
    etape = 0;
  }

  removeActiveImg();
  img[etape].classList.add('active');
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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U0osYUFBVCxHQUF3QjtFQUNwQlAsS0FBSzs7RUFDTCxJQUFHQSxLQUFLLEdBQUcsQ0FBWCxFQUFhO0lBQ1RBLEtBQUssR0FBR0MsT0FBTyxHQUFHLENBQWxCO0VBQ0g7O0VBQ0RPLGVBQWU7RUFDZlYsR0FBRyxDQUFDRSxLQUFELENBQUgsQ0FBV2hCLFNBQVgsQ0FBcUIyQixHQUFyQixDQUF5QixRQUF6QixFQU5vQixDQU9wQjtBQUVIOztBQUVEQyxXQUFXLENBQUMsWUFBTTtFQUNkWixLQUFLOztFQUNMLElBQUdBLEtBQUssSUFBSUMsT0FBWixFQUFvQjtJQUNoQkQsS0FBSyxHQUFHLENBQVI7RUFDSDs7RUFDRFEsZUFBZTtFQUNmVixHQUFHLENBQUNFLEtBQUQsQ0FBSCxDQUFXaEIsU0FBWCxDQUFxQjJCLEdBQXJCLENBQXlCLFFBQXpCO0FBRUgsQ0FSVSxFQVFSLElBUlEsQ0FBWDs7Ozs7Ozs7Ozs7O0FDdENBIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2FwcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvaGVhZGVyLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9zY3JvbGwtdG9wLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9zbGlkZXIuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL3N0eWxlcy9hcHAuc2NzcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvKlxuICogV2VsY29tZSB0byB5b3VyIGFwcCdzIG1haW4gSmF2YVNjcmlwdCBmaWxlIVxuICpcbiAqIFdlIHJlY29tbWVuZCBpbmNsdWRpbmcgdGhlIGJ1aWx0IHZlcnNpb24gb2YgdGhpcyBKYXZhU2NyaXB0IGZpbGVcbiAqIChhbmQgaXRzIENTUyBmaWxlKSBpbiB5b3VyIGJhc2UgbGF5b3V0IChiYXNlLmh0bWwudHdpZykuXG4gKi9cblxuLy8gYW55IENTUyB5b3UgaW1wb3J0IHdpbGwgb3V0cHV0IGludG8gYSBzaW5nbGUgY3NzIGZpbGUgKGFwcC5jc3MgaW4gdGhpcyBjYXNlKVxuaW1wb3J0ICcuL3N0eWxlcy9hcHAuc2Nzcyc7XG5cbmltcG9ydCAnLi9qcy9oZWFkZXInO1xuaW1wb3J0ICcuL2pzL3NsaWRlcic7XG5pbXBvcnQgJy4vanMvc2Nyb2xsLXRvcCc7XG5cbiIsImNvbnN0IGJ1cmdlciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5oYW1idXJnZXInKTtcclxuY29uc3QgbmF2aWdhdGlvbiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5uYXZpZ2F0aW9uJyk7XHJcbmNvbnN0IGhlYWRlciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJ2hlYWRlcicpO1xyXG4vLyBjb25zdCBsaW5rID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnbGknKTtcclxuXHJcbmJ1cmdlci5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsICgpPT57XHJcbiAgICBuYXZpZ2F0aW9uLmNsYXNzTGlzdC50b2dnbGUoJ21lbnUtaGFtYnVyZ2VyJyk7IFxyXG4gICAgaGVhZGVyLmNsYXNzTGlzdC50b2dnbGUoJ2hlaWdodCcpO1xyXG4gICAgLy8gbGluay5jbGFzc0xpc3QudG9nZ2xlKCdjb2xvcicpO1xyXG59KVxyXG5cclxuXHJcblxyXG4iLCJcblxuY29uc3QgYXJyb3cgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcudG9wLWFycm93Jyk7XG5cbi8vIExhIHByb3ByacOpdMOpIG9uc2Nyb2xsIHJlbnZvaWUgbGUgZ2VzdGlvbm5haXJlIGQnw6l2w6huZW1lbnRzIHBvdXIgbCdvYmpldCB3aW5kb3dcblxud2luZG93Lm9uc2Nyb2xsID0gZnVuY3Rpb24oKSB7c2Nyb2xsKCl9O1xuXG5hcnJvdy5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIHRvcCgpKTtcblxuZnVuY3Rpb24gc2Nyb2xsKCl7XG4gICAgaWYoZG9jdW1lbnQuYm9keS5zY3JvbGxUb3AgPiAyMCB8fCBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuc2Nyb2xsVG9wID4gMjApe1xuICAgICAgICBhcnJvdy5zdHlsZS52aXNpYmlsaXR5ID0gXCJ2aXNpYmxlXCI7XG4gICAgfSBlbHNlIHtcbiAgICAgICAgYXJyb3cuc3R5bGUudmlzaWJpbGl0eSA9XCJoaWRkZW5cIjtcbiAgICB9XG59XG5cbmZ1bmN0aW9uIHRvcCgpe1xuICAgIGNvbnNvbGUubG9nKCdXaGVyZSB1IGF0IGFnYWluIGZvbyA/JylcbiAgICBkb2N1bWVudC5ib2R5LnNjcm9sbFRvcCA9IDA7XG4gICAgZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LnNjcm9sbFRvcCA9IDA7XG59IiwibGV0IGltZyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ2ltZy1zbGlkZXInKTtcbmxldCBldGFwZSA9IDA7XG5sZXQgbmJyX2ltZyA9IGltZy5sZW5ndGg7XG5sZXQgbmV4dCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5uZXh0Jyk7XG5sZXQgYmFjayA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5iYWNrJyk7XG5jb25zdCBzbGlkZXIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuc2xpZGVyJyk7XG5cbm5leHQuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBuZXh0U2xpZGUpO1xuYmFjay5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIHByZXZpb3VzU2xpZGUpO1xuXG5cbmZ1bmN0aW9uIHJlbW92ZUFjdGl2ZUltZygpeyAgIFxuICAgIGZvcihsZXQgaSA9IDA7IGkgPCBuYnJfaW1nOyBpKyspe1xuICAgICAgICBpbWdbaV0uY2xhc3NMaXN0LnJlbW92ZSgnYWN0aXZlJyk7XG4gICAgfVxufVxuXG5mdW5jdGlvbiBuZXh0U2xpZGUoKXtcbiAgICBldGFwZSsrO1xuICAgIGlmKGV0YXBlID49IG5icl9pbWcpe1xuICAgICAgICBldGFwZSA9IDA7XG4gICAgfVxuICAgIHJlbW92ZUFjdGl2ZUltZygpO1xuICAgIGltZ1tldGFwZV0uY2xhc3NMaXN0LmFkZCgnYWN0aXZlJyk7XG5cbn1cblxuZnVuY3Rpb24gcHJldmlvdXNTbGlkZSgpe1xuICAgIGV0YXBlIC0tO1xuICAgIGlmKGV0YXBlIDwgMCl7XG4gICAgICAgIGV0YXBlID0gbmJyX2ltZyAtIDE7XG4gICAgfVxuICAgIHJlbW92ZUFjdGl2ZUltZygpO1xuICAgIGltZ1tldGFwZV0uY2xhc3NMaXN0LmFkZCgnYWN0aXZlJyk7XG4gICAgLy8gY29uc29sZS5sb2cobmJyX2ltZyk7XG5cbn1cblxuc2V0SW50ZXJ2YWwoKCkgPT4ge1xuICAgIGV0YXBlKys7XG4gICAgaWYoZXRhcGUgPj0gbmJyX2ltZyl7XG4gICAgICAgIGV0YXBlID0gMDtcbiAgICB9XG4gICAgcmVtb3ZlQWN0aXZlSW1nKCk7XG4gICAgaW1nW2V0YXBlXS5jbGFzc0xpc3QuYWRkKCdhY3RpdmUnKTtcblxufSwgMzAwMCkiLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwibmFtZXMiOlsiYnVyZ2VyIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwibmF2aWdhdGlvbiIsImhlYWRlciIsImFkZEV2ZW50TGlzdGVuZXIiLCJjbGFzc0xpc3QiLCJ0b2dnbGUiLCJhcnJvdyIsIndpbmRvdyIsIm9uc2Nyb2xsIiwic2Nyb2xsIiwidG9wIiwiYm9keSIsInNjcm9sbFRvcCIsImRvY3VtZW50RWxlbWVudCIsInN0eWxlIiwidmlzaWJpbGl0eSIsImNvbnNvbGUiLCJsb2ciLCJpbWciLCJnZXRFbGVtZW50c0J5Q2xhc3NOYW1lIiwiZXRhcGUiLCJuYnJfaW1nIiwibGVuZ3RoIiwibmV4dCIsImJhY2siLCJzbGlkZXIiLCJuZXh0U2xpZGUiLCJwcmV2aW91c1NsaWRlIiwicmVtb3ZlQWN0aXZlSW1nIiwiaSIsInJlbW92ZSIsImFkZCIsInNldEludGVydmFsIl0sInNvdXJjZVJvb3QiOiIifQ==