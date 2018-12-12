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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 54);
/******/ })
/************************************************************************/
/******/ ({

/***/ 54:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(55);


/***/ }),

/***/ 55:
/***/ (function(module, exports) {

eval("/**\n * Created by edwin on 11/7/15.\n */\n\n$(document).ready(function () {\n\n    $('#selectAllBoxes').click(function (event) {\n\n        if (this.checked) {\n\n            $('.checkBoxes').each(function () {\n\n                this.checked = true;\n            });\n        } else {\n\n            $('.checkBoxes').each(function () {\n\n                this.checked = false;\n            });\n        }\n    });\n\n    /**************** User Profile **********************/\n\n    var panels = $('.user-infos');\n    var panelsButton = $('.dropdown-user');\n    panels.hide();\n\n    //Click dropdown\n    panelsButton.click(function () {\n        //get data-for attribute\n        var dataFor = $(this).attr('data-for');\n        var idFor = $(dataFor);\n\n        //current button\n        var currentButton = $(this);\n        idFor.slideToggle(400, function () {\n            //Completed slidetoggle\n            if (idFor.is(':visible')) {\n                currentButton.html('<i class=\"glyphicon glyphicon-chevron-up text-muted\"></i>');\n            } else {\n                currentButton.html('<i class=\"glyphicon glyphicon-chevron-down text-muted\"></i>');\n            }\n        });\n    });\n\n    $('[data-toggle=\"tooltip\"]').tooltip();\n\n    //$('button').click(function(e) {\n    //    e.preventDefault();\n    //    alert(\"This is a demo.\\n :-)\");\n    //});\n\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbGlicy9zY3JpcHRzLmpzPzBlZjgiXSwibmFtZXMiOlsiJCIsImRvY3VtZW50IiwicmVhZHkiLCJjbGljayIsImV2ZW50IiwiY2hlY2tlZCIsImVhY2giLCJwYW5lbHMiLCJwYW5lbHNCdXR0b24iLCJoaWRlIiwiZGF0YUZvciIsImF0dHIiLCJpZEZvciIsImN1cnJlbnRCdXR0b24iLCJzbGlkZVRvZ2dsZSIsImlzIiwiaHRtbCIsInRvb2x0aXAiXSwibWFwcGluZ3MiOiJBQUFBOzs7O0FBSUFBLEVBQUVDLFFBQUYsRUFBWUMsS0FBWixDQUFrQixZQUFVOztBQUV4QkYsTUFBRSxpQkFBRixFQUFxQkcsS0FBckIsQ0FBMkIsVUFBU0MsS0FBVCxFQUFlOztBQUV0QyxZQUFHLEtBQUtDLE9BQVIsRUFBaUI7O0FBRWJMLGNBQUUsYUFBRixFQUFpQk0sSUFBakIsQ0FBc0IsWUFBVTs7QUFFNUIscUJBQUtELE9BQUwsR0FBZSxJQUFmO0FBRUgsYUFKRDtBQU1ILFNBUkQsTUFRTzs7QUFHSEwsY0FBRSxhQUFGLEVBQWlCTSxJQUFqQixDQUFzQixZQUFVOztBQUU1QixxQkFBS0QsT0FBTCxHQUFlLEtBQWY7QUFFSCxhQUpEO0FBT0g7QUFFSixLQXRCRDs7QUE0QkE7O0FBSUEsUUFBSUUsU0FBU1AsRUFBRSxhQUFGLENBQWI7QUFDQSxRQUFJUSxlQUFlUixFQUFFLGdCQUFGLENBQW5CO0FBQ0FPLFdBQU9FLElBQVA7O0FBRUE7QUFDQUQsaUJBQWFMLEtBQWIsQ0FBbUIsWUFBVztBQUMxQjtBQUNBLFlBQUlPLFVBQVVWLEVBQUUsSUFBRixFQUFRVyxJQUFSLENBQWEsVUFBYixDQUFkO0FBQ0EsWUFBSUMsUUFBUVosRUFBRVUsT0FBRixDQUFaOztBQUVBO0FBQ0EsWUFBSUcsZ0JBQWdCYixFQUFFLElBQUYsQ0FBcEI7QUFDQVksY0FBTUUsV0FBTixDQUFrQixHQUFsQixFQUF1QixZQUFXO0FBQzlCO0FBQ0EsZ0JBQUdGLE1BQU1HLEVBQU4sQ0FBUyxVQUFULENBQUgsRUFDQTtBQUNJRiw4QkFBY0csSUFBZCxDQUFtQiwyREFBbkI7QUFDSCxhQUhELE1BS0E7QUFDSUgsOEJBQWNHLElBQWQsQ0FBbUIsNkRBQW5CO0FBQ0g7QUFDSixTQVZEO0FBV0gsS0FsQkQ7O0FBcUJBaEIsTUFBRSx5QkFBRixFQUE2QmlCLE9BQTdCOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQU9ILENBeEVEIiwiZmlsZSI6IjU1LmpzIiwic291cmNlc0NvbnRlbnQiOlsiLyoqXG4gKiBDcmVhdGVkIGJ5IGVkd2luIG9uIDExLzcvMTUuXG4gKi9cblxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKXtcblxuICAgICQoJyNzZWxlY3RBbGxCb3hlcycpLmNsaWNrKGZ1bmN0aW9uKGV2ZW50KXtcblxuICAgICAgICBpZih0aGlzLmNoZWNrZWQpIHtcblxuICAgICAgICAgICAgJCgnLmNoZWNrQm94ZXMnKS5lYWNoKGZ1bmN0aW9uKCl7XG5cbiAgICAgICAgICAgICAgICB0aGlzLmNoZWNrZWQgPSB0cnVlO1xuXG4gICAgICAgICAgICB9KTtcblxuICAgICAgICB9IGVsc2Uge1xuXG5cbiAgICAgICAgICAgICQoJy5jaGVja0JveGVzJykuZWFjaChmdW5jdGlvbigpe1xuXG4gICAgICAgICAgICAgICAgdGhpcy5jaGVja2VkID0gZmFsc2U7XG5cbiAgICAgICAgICAgIH0pO1xuXG5cbiAgICAgICAgfVxuXG4gICAgfSk7XG5cblxuXG5cblxuICAgIC8qKioqKioqKioqKioqKioqIFVzZXIgUHJvZmlsZSAqKioqKioqKioqKioqKioqKioqKioqL1xuXG5cblxuICAgIHZhciBwYW5lbHMgPSAkKCcudXNlci1pbmZvcycpO1xuICAgIHZhciBwYW5lbHNCdXR0b24gPSAkKCcuZHJvcGRvd24tdXNlcicpO1xuICAgIHBhbmVscy5oaWRlKCk7XG5cbiAgICAvL0NsaWNrIGRyb3Bkb3duXG4gICAgcGFuZWxzQnV0dG9uLmNsaWNrKGZ1bmN0aW9uKCkge1xuICAgICAgICAvL2dldCBkYXRhLWZvciBhdHRyaWJ1dGVcbiAgICAgICAgdmFyIGRhdGFGb3IgPSAkKHRoaXMpLmF0dHIoJ2RhdGEtZm9yJyk7XG4gICAgICAgIHZhciBpZEZvciA9ICQoZGF0YUZvcik7XG5cbiAgICAgICAgLy9jdXJyZW50IGJ1dHRvblxuICAgICAgICB2YXIgY3VycmVudEJ1dHRvbiA9ICQodGhpcyk7XG4gICAgICAgIGlkRm9yLnNsaWRlVG9nZ2xlKDQwMCwgZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAvL0NvbXBsZXRlZCBzbGlkZXRvZ2dsZVxuICAgICAgICAgICAgaWYoaWRGb3IuaXMoJzp2aXNpYmxlJykpXG4gICAgICAgICAgICB7XG4gICAgICAgICAgICAgICAgY3VycmVudEJ1dHRvbi5odG1sKCc8aSBjbGFzcz1cImdseXBoaWNvbiBnbHlwaGljb24tY2hldnJvbi11cCB0ZXh0LW11dGVkXCI+PC9pPicpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgZWxzZVxuICAgICAgICAgICAge1xuICAgICAgICAgICAgICAgIGN1cnJlbnRCdXR0b24uaHRtbCgnPGkgY2xhc3M9XCJnbHlwaGljb24gZ2x5cGhpY29uLWNoZXZyb24tZG93biB0ZXh0LW11dGVkXCI+PC9pPicpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KVxuICAgIH0pO1xuXG5cbiAgICAkKCdbZGF0YS10b2dnbGU9XCJ0b29sdGlwXCJdJykudG9vbHRpcCgpO1xuXG4gICAgLy8kKCdidXR0b24nKS5jbGljayhmdW5jdGlvbihlKSB7XG4gICAgLy8gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIC8vICAgIGFsZXJ0KFwiVGhpcyBpcyBhIGRlbW8uXFxuIDotKVwiKTtcbiAgICAvL30pO1xuXG5cblxuXG5cblxufSk7XG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIC4vcmVzb3VyY2VzL2pzL2xpYnMvc2NyaXB0cy5qcyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///55\n");

/***/ })

/******/ });