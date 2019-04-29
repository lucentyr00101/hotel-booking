/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/payments/create.js":
/*!*****************************************!*\
  !*** ./resources/js/payments/create.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/** Mask Functions */
$(function () {
  $('#amount_paid').mask('Z##,###,###,###,###.00', {
    reverse: true,
    translation: {
      'Z': {
        pattern: /[1-9]/
      },
      'Y': {
        pattern: /[0-9]/
      }
    }
  });
  $('input[name="discount"').mask('###');
});
/** Mask Functions */

/** Auto set value functions */

$(function () {
  $('#subtotal').parent().find('label').addClass('active');
  $('#subtotal').val(computeSubTotal().toLocaleString());
  $('#total').val(computeTotal(computeSubTotal()).toLocaleString());
});
/** Auto set value functions */

/** Onkeypress functions */

$(function () {
  $('#amount_paid').on('keyup', function () {
    var total = parseFloat(removeCommas($('#total').val()));
    var val = parseFloat(removeCommas($(this).val()));

    if (val >= total) {
      $('#change').val(computeChange(total, val));
    } else {
      $('#change').val('');
    }
  }); //autocompute total amount

  $('input[name="discount"]').on('keyup', function () {
    var val = parseInt($(this).val());

    if (isNaN(val)) {
      val = 0;
    }

    var discountedTotal = computeTotal(computeSubTotal(), val);
    $('#total').val(discountedTotal.toLocaleString());
  }); //auto set to 0 if value is null

  $('input[name="discount"]').on('blur', function () {
    var val = parseInt($(this).val());

    if (isNaN(val)) {
      $(this).val(0);
    }
  });
});
/** Onkeypress functions */

/** Standard Functions */

var computeSubTotal = function computeSubTotal() {
  var days = parseInt($('#number_of_days').val());
  var rate = parseFloat(removeCommas($('#room_rate').val()));
  var subTotal = days * rate;
  return subTotal;
};

var computeTotal = function computeTotal(subTotal) {
  var discount = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
  var deposit = parseFloat(removeCommas($('#deposit').val()));
  var total = subTotal * .12 + subTotal - deposit;
  total = total - total * (discount / 100);
  return total;
};

var removeCommas = function removeCommas(number) {
  return number.replace(/\,/g, '');
};

var computeChange = function computeChange(total, paid) {
  return (paid - total).toLocaleString();
};

/***/ }),

/***/ 4:
/*!***********************************************!*\
  !*** multi ./resources/js/payments/create.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/hotel-booking/resources/js/payments/create.js */"./resources/js/payments/create.js");


/***/ })

/******/ });