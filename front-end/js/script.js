/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

	eval("__webpack_require__(1);\nmodule.exports = __webpack_require__(2);\n\n\n/*****************\n ** WEBPACK FOOTER\n ** multi main\n ** module id = 0\n ** module chunks = 0\n **/\n//# sourceURL=webpack:///multi_main?");

/***/ },
/* 1 */
/***/ function(module, exports) {

	eval("\"use strict\";\n\nfunction _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) arr2[i] = arr[i]; return arr2; } else { return Array.from(arr); } }\n\nvar init = function init() {\n\tinitJSPerfections();\n\tinitTabFunctions();\n};\n\nvar initJSPerfections = function initJSPerfections() {\n\tOnJSHides();\n\tOnJSShows();\n};\n\nvar OnJSHides = function OnJSHides() {\n\t[].concat(_toConsumableArray(document.querySelectorAll('[data-on-js=\"hide\"]'))).forEach(function (item) {\n\t\titem.classList.add('hide');\n\t});\n};\nvar OnJSShows = function OnJSShows() {\n\t[].concat(_toConsumableArray(document.querySelectorAll('[data-on-js=\"show\"]'))).forEach(function (item) {\n\t\titem.classList.remove('hide');\n\t});\n};\nvar initTabFunctions = function initTabFunctions() {\n\tvar tabs = document.querySelectorAll('.tab-navigation .tab-header');\n\tvar forms = document.querySelectorAll('.main-form');\n\n\t[].concat(_toConsumableArray(tabs)).forEach(function (tab, i) {\n\t\ttab.addEventListener('click', function (e) {\n\t\t\ttabClickHandler(e, i, tabs, [].concat(_toConsumableArray(forms)));\n\t\t});\n\t});\n};\nvar tabClickHandler = function tabClickHandler(e, index, tabs, tabItems) {\n\n\t//handle form switch\n\tvar className = tabItems[0].classList[0];\n\tvar previousItem = document.querySelector('.' + className + ':not(.hide)');\n\tif (previousItem) switchTabItems(previousItem, tabItems[index]);\n\n\t//handle active state\n\tclassName = tabs[0].classList[0];\n\tvar previousActive = document.querySelector('.' + className + '.active');\n\tif (previousActive) changeTabActiveState(previousActive, tabs[index]);\n};\nvar changeTabActiveState = function changeTabActiveState(oldObj, newObj) {\n\toldObj.classList.remove('active');\n\tnewObj.classList.add('active');\n};\nvar switchTabItems = function switchTabItems(oldObj, newObj) {\n\toldObj.classList.add('hide');\n\tnewObj.classList.remove('hide');\n};\n\ninit();\n\n/*****************\n ** WEBPACK FOOTER\n ** ./_js/script.js\n ** module id = 1\n ** module chunks = 0\n **/\n//# sourceURL=webpack:///./_js/script.js?");

/***/ },
/* 2 */
/***/ function(module, exports) {

	eval("// removed by extract-text-webpack-plugin\n\n/*****************\n ** WEBPACK FOOTER\n ** ./_scss/style.scss\n ** module id = 2\n ** module chunks = 0\n **/\n//# sourceURL=webpack:///./_scss/style.scss?");

/***/ }
/******/ ]);