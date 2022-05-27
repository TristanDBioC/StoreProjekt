/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./public/src/product.js":
/*!*******************************!*\
  !*** ./public/src/product.js ***!
  \*******************************/
/***/ (() => {

eval("//QUANTITY\r\n\r\nfunction wcqib_refresh_quantity_increments() {\r\n    jQuery(\"div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)\").each(function(a, b) {\r\n        var c = jQuery(b);\r\n        c.addClass(\"buttons_added\"), c.children().first().before('<input type=\"button\" value=\"-\" class=\"minus\" />'), c.children().last().after('<input type=\"button\" value=\"+\" class=\"plus\" />')\r\n    })\r\n}\r\nString.prototype.getDecimals || (String.prototype.getDecimals = function() {\r\n    var a = this,\r\n        b = (\"\" + a).match(/(?:\\.(\\d+))?(?:[eE]([+-]?\\d+))?$/);\r\n    return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0\r\n}), jQuery(document).ready(function() {\r\n    wcqib_refresh_quantity_increments()\r\n}), jQuery(document).on(\"updated_wc_div\", function() {\r\n    wcqib_refresh_quantity_increments()\r\n}), jQuery(document).on(\"click\", \".plus, .minus\", function() {\r\n    var a = jQuery(this).closest(\".quantity\").find(\".qty\"),\r\n        b = parseFloat(a.val()),\r\n        c = parseFloat(a.attr(\"max\")),\r\n        d = parseFloat(a.attr(\"min\")),\r\n        e = a.attr(\"step\");\r\n    b && \"\" !== b && \"NaN\" !== b || (b = 0), \"\" !== c && \"NaN\" !== c || (c = \"\"), \"\" !== d && \"NaN\" !== d || (d = 0), \"any\" !== e && \"\" !== e && void 0 !== e && \"NaN\" !== parseFloat(e) || (e = 1), jQuery(this).is(\".plus\") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger(\"change\")\r\n});\r\n\r\n//GALLERY\r\n\n\n//# sourceURL=webpack://storeprojekt/./public/src/product.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./public/src/product.js"]();
/******/ 	
/******/ })()
;