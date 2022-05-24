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

/***/ "./public/src/addproduct.js":
/*!**********************************!*\
  !*** ./public/src/addproduct.js ***!
  \**********************************/
/***/ (() => {

eval("var x, i, j, l, ll, selElmnt, a, b, c;\r\n/* Look for any elements with the class \"custom-select\": */\r\nx = document.getElementsByClassName(\"custom-select\");\r\nl = x.length;\r\nfor (i = 0; i < l; i++) {\r\n  selElmnt = x[i].getElementsByTagName(\"select\")[0];\r\n  ll = selElmnt.length;\r\n  /* For each element, create a new DIV that will act as the selected item: */\r\n  a = document.createElement(\"DIV\");\r\n  a.setAttribute(\"class\", \"select-selected\");\r\n  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;\r\n  x[i].appendChild(a);\r\n  /* For each element, create a new DIV that will contain the option list: */\r\n  b = document.createElement(\"DIV\");\r\n  b.setAttribute(\"class\", \"select-items select-hide\");\r\n  for (j = 1; j < ll; j++) {\r\n    /* For each option in the original select element,\r\n    create a new DIV that will act as an option item: */\r\n    c = document.createElement(\"DIV\");\r\n    c.innerHTML = selElmnt.options[j].innerHTML;\r\n    c.addEventListener(\"click\", function(e) {\r\n        /* When an item is clicked, update the original select box,\r\n        and the selected item: */\r\n        var y, i, k, s, h, sl, yl;\r\n        s = this.parentNode.parentNode.getElementsByTagName(\"select\")[0];\r\n        sl = s.length;\r\n        h = this.parentNode.previousSibling;\r\n        for (i = 0; i < sl; i++) {\r\n          if (s.options[i].innerHTML == this.innerHTML) {\r\n            s.selectedIndex = i;\r\n            h.innerHTML = this.innerHTML;\r\n            y = this.parentNode.getElementsByClassName(\"same-as-selected\");\r\n            yl = y.length;\r\n            for (k = 0; k < yl; k++) {\r\n              y[k].removeAttribute(\"class\");\r\n            }\r\n            this.setAttribute(\"class\", \"same-as-selected\");\r\n            break;\r\n          }\r\n        }\r\n        h.click();\r\n    });\r\n    b.appendChild(c);\r\n  }\r\n  x[i].appendChild(b);\r\n  a.addEventListener(\"click\", function(e) {\r\n    /* When the select box is clicked, close any other select boxes,\r\n    and open/close the current select box: */\r\n    e.stopPropagation();\r\n    closeAllSelect(this);\r\n    this.nextSibling.classList.toggle(\"select-hide\");\r\n    this.classList.toggle(\"select-arrow-active\");\r\n  });\r\n}\r\n\r\nfunction closeAllSelect(elmnt) {\r\n  /* A function that will close all select boxes in the document,\r\n  except the current select box: */\r\n  var x, y, i, xl, yl, arrNo = [];\r\n  x = document.getElementsByClassName(\"select-items\");\r\n  y = document.getElementsByClassName(\"select-selected\");\r\n  xl = x.length;\r\n  yl = y.length;\r\n  for (i = 0; i < yl; i++) {\r\n    if (elmnt == y[i]) {\r\n      arrNo.push(i)\r\n    } else {\r\n      y[i].classList.remove(\"select-arrow-active\");\r\n    }\r\n  }\r\n  for (i = 0; i < xl; i++) {\r\n    if (arrNo.indexOf(i)) {\r\n      x[i].classList.add(\"select-hide\");\r\n    }\r\n  }\r\n}\r\n\r\n/* If the user clicks anywhere outside the select box,\r\nthen close all select boxes: */\r\ndocument.addEventListener(\"click\", closeAllSelect);\r\n\r\nvar currencyInput = document.querySelector('input[type=\"currency\"]')\r\nvar currency = 'PHP' // https://www.currency-iso.org/dam/downloads/lists/list_one.xml\r\n\r\n// format inital value\r\nonBlur({target:currencyInput})\r\n\r\n// bind event listeners\r\ncurrencyInput.addEventListener('focus', onFocus)\r\ncurrencyInput.addEventListener('blur', onBlur)\r\n\r\n\r\nfunction localStringToNumber( s ){\r\n    return Number(String(s).replace(/[^0-9.-]+/g,\"\"))\r\n}\r\n\r\nfunction onFocus(e){\r\n    var value = e.target.value;\r\n    e.target.value = value ? localStringToNumber(value) : ''\r\n}\r\n\r\nfunction onBlur(e){\r\n    var value = e.target.value\r\n\r\n    var options = {\r\n        maximumFractionDigits : 2,\r\n        currency              : currency,\r\n        style                 : \"currency\",\r\n        currencyDisplay       : \"symbol\"\r\n    }\r\n            \r\n    e.target.value = (value || value === 0) \r\n    ? localStringToNumber(value).toLocaleString(undefined, options)\r\n    : ''\r\n}\n\n//# sourceURL=webpack://storeprojekt/./public/src/addproduct.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./public/src/addproduct.js"]();
/******/ 	
/******/ })()
;