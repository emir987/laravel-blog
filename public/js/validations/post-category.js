/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/validations/post-category.js":
/*!***************************************************!*\
  !*** ./resources/js/validations/post-category.js ***!
  \***************************************************/
/***/ (() => {

eval("var categoryForm = document.getElementsByClassName('category-form')[0];\nvar categoryNameElement = document.getElementsByName('name')[0];\nvar categoryDescriptionElement = document.getElementsByName('description')[0];\nvar errorMessageName = document.getElementsByClassName('error-message-name')[0];\nvar categoryRegex = /^[A-Za-z0-9 -!$%^&*()_+|~=`{}\\[\\]:\";'<>?,.\\/]+$/; // let categoryRegex = /^[\\w\\W ]+$/; // za sve karaktere \n// live change with error border for title\n\ncategoryNameElement.addEventListener('focusout', function (event) {\n  if (categoryRegex.test(categoryNameElement.value)) {\n    categoryNameElement.classList.remove('error-border');\n    errorMessageName.style.display = 'none';\n  } else {\n    categoryNameElement.classList.add('error-border');\n    errorMessageName.style.display = 'block';\n  }\n}); // when we click the save button\n\ncategoryForm.addEventListener('submit', function (event) {\n  var isValid = true;\n\n  if (!categoryRegex.test(categoryNameElement.value)) {\n    categoryNameElement.classList.add('error-border');\n    errorMessageName.style.display = 'block';\n    isValid = false;\n  } else {\n    categoryNameElement.classList.remove('error-border');\n    errorMessageName.style.display = 'none';\n  } // Check if isValid = false\n\n\n  if (!isValid) {\n    event.preventDefault();\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvdmFsaWRhdGlvbnMvcG9zdC1jYXRlZ29yeS5qcz82YjY1Il0sIm5hbWVzIjpbImNhdGVnb3J5Rm9ybSIsImRvY3VtZW50IiwiZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSIsImNhdGVnb3J5TmFtZUVsZW1lbnQiLCJnZXRFbGVtZW50c0J5TmFtZSIsImNhdGVnb3J5RGVzY3JpcHRpb25FbGVtZW50IiwiZXJyb3JNZXNzYWdlTmFtZSIsImNhdGVnb3J5UmVnZXgiLCJhZGRFdmVudExpc3RlbmVyIiwiZXZlbnQiLCJ0ZXN0IiwidmFsdWUiLCJjbGFzc0xpc3QiLCJyZW1vdmUiLCJzdHlsZSIsImRpc3BsYXkiLCJhZGQiLCJpc1ZhbGlkIiwicHJldmVudERlZmF1bHQiXSwibWFwcGluZ3MiOiJBQUFBLElBQUlBLFlBQVksR0FBR0MsUUFBUSxDQUFDQyxzQkFBVCxDQUFnQyxlQUFoQyxFQUFpRCxDQUFqRCxDQUFuQjtBQUVBLElBQUlDLG1CQUFtQixHQUFHRixRQUFRLENBQUNHLGlCQUFULENBQTJCLE1BQTNCLEVBQW1DLENBQW5DLENBQTFCO0FBQ0EsSUFBSUMsMEJBQTBCLEdBQUdKLFFBQVEsQ0FBQ0csaUJBQVQsQ0FBMkIsYUFBM0IsRUFBMEMsQ0FBMUMsQ0FBakM7QUFFQSxJQUFJRSxnQkFBZ0IsR0FBR0wsUUFBUSxDQUFDQyxzQkFBVCxDQUFnQyxvQkFBaEMsRUFBc0QsQ0FBdEQsQ0FBdkI7QUFFQSxJQUFJSyxhQUFhLEdBQUcsaURBQXBCLEMsQ0FDQTtBQUVBOztBQUNBSixtQkFBbUIsQ0FBQ0ssZ0JBQXBCLENBQXFDLFVBQXJDLEVBQWlELFVBQVNDLEtBQVQsRUFBZ0I7QUFDN0QsTUFBSUYsYUFBYSxDQUFDRyxJQUFkLENBQW1CUCxtQkFBbUIsQ0FBQ1EsS0FBdkMsQ0FBSixFQUFtRDtBQUMvQ1IsSUFBQUEsbUJBQW1CLENBQUNTLFNBQXBCLENBQThCQyxNQUE5QixDQUFxQyxjQUFyQztBQUNBUCxJQUFBQSxnQkFBZ0IsQ0FBQ1EsS0FBakIsQ0FBdUJDLE9BQXZCLEdBQStCLE1BQS9CO0FBQ0gsR0FIRCxNQUdPO0FBQ0haLElBQUFBLG1CQUFtQixDQUFDUyxTQUFwQixDQUE4QkksR0FBOUIsQ0FBa0MsY0FBbEM7QUFDQVYsSUFBQUEsZ0JBQWdCLENBQUNRLEtBQWpCLENBQXVCQyxPQUF2QixHQUErQixPQUEvQjtBQUNIO0FBQ0osQ0FSRCxFLENBVUE7O0FBQ0FmLFlBQVksQ0FBQ1EsZ0JBQWIsQ0FBOEIsUUFBOUIsRUFBd0MsVUFBU0MsS0FBVCxFQUFlO0FBRW5ELE1BQUlRLE9BQU8sR0FBRyxJQUFkOztBQUVBLE1BQUksQ0FBQ1YsYUFBYSxDQUFDRyxJQUFkLENBQW1CUCxtQkFBbUIsQ0FBQ1EsS0FBdkMsQ0FBTCxFQUFvRDtBQUNoRFIsSUFBQUEsbUJBQW1CLENBQUNTLFNBQXBCLENBQThCSSxHQUE5QixDQUFrQyxjQUFsQztBQUNBVixJQUFBQSxnQkFBZ0IsQ0FBQ1EsS0FBakIsQ0FBdUJDLE9BQXZCLEdBQStCLE9BQS9CO0FBQ0FFLElBQUFBLE9BQU8sR0FBRyxLQUFWO0FBQ0gsR0FKRCxNQUlPO0FBQ0hkLElBQUFBLG1CQUFtQixDQUFDUyxTQUFwQixDQUE4QkMsTUFBOUIsQ0FBcUMsY0FBckM7QUFDQVAsSUFBQUEsZ0JBQWdCLENBQUNRLEtBQWpCLENBQXVCQyxPQUF2QixHQUErQixNQUEvQjtBQUNILEdBWGtELENBYW5EOzs7QUFDQSxNQUFJLENBQUNFLE9BQUwsRUFBYztBQUNWUixJQUFBQSxLQUFLLENBQUNTLGNBQU47QUFDSDtBQUVKLENBbEJEIiwic291cmNlc0NvbnRlbnQiOlsibGV0IGNhdGVnb3J5Rm9ybSA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ2NhdGVnb3J5LWZvcm0nKVswXTtcblxubGV0IGNhdGVnb3J5TmFtZUVsZW1lbnQgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5TmFtZSgnbmFtZScpWzBdO1xubGV0IGNhdGVnb3J5RGVzY3JpcHRpb25FbGVtZW50ID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeU5hbWUoJ2Rlc2NyaXB0aW9uJylbMF07XG5cbmxldCBlcnJvck1lc3NhZ2VOYW1lID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgnZXJyb3ItbWVzc2FnZS1uYW1lJylbMF07XG5cbmxldCBjYXRlZ29yeVJlZ2V4ID0gL15bQS1aYS16MC05IC0hJCVeJiooKV8rfH49YHt9XFxbXFxdOlwiOyc8Pj8sLlxcL10rJC87XG4vLyBsZXQgY2F0ZWdvcnlSZWdleCA9IC9eW1xcd1xcVyBdKyQvOyAvLyB6YSBzdmUga2FyYWt0ZXJlIFxuXG4vLyBsaXZlIGNoYW5nZSB3aXRoIGVycm9yIGJvcmRlciBmb3IgdGl0bGVcbmNhdGVnb3J5TmFtZUVsZW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignZm9jdXNvdXQnLCBmdW5jdGlvbihldmVudCkge1xuICAgIGlmIChjYXRlZ29yeVJlZ2V4LnRlc3QoY2F0ZWdvcnlOYW1lRWxlbWVudC52YWx1ZSkpIHtcbiAgICAgICAgY2F0ZWdvcnlOYW1lRWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKCdlcnJvci1ib3JkZXInKTtcbiAgICAgICAgZXJyb3JNZXNzYWdlTmFtZS5zdHlsZS5kaXNwbGF5PSdub25lJztcbiAgICB9IGVsc2Uge1xuICAgICAgICBjYXRlZ29yeU5hbWVFbGVtZW50LmNsYXNzTGlzdC5hZGQoJ2Vycm9yLWJvcmRlcicpO1xuICAgICAgICBlcnJvck1lc3NhZ2VOYW1lLnN0eWxlLmRpc3BsYXk9J2Jsb2NrJztcbiAgICB9XG59KTtcblxuLy8gd2hlbiB3ZSBjbGljayB0aGUgc2F2ZSBidXR0b25cbmNhdGVnb3J5Rm9ybS5hZGRFdmVudExpc3RlbmVyKCdzdWJtaXQnLCBmdW5jdGlvbihldmVudCl7XG5cbiAgICBsZXQgaXNWYWxpZCA9IHRydWU7XG5cbiAgICBpZiAoIWNhdGVnb3J5UmVnZXgudGVzdChjYXRlZ29yeU5hbWVFbGVtZW50LnZhbHVlKSkge1xuICAgICAgICBjYXRlZ29yeU5hbWVFbGVtZW50LmNsYXNzTGlzdC5hZGQoJ2Vycm9yLWJvcmRlcicpO1xuICAgICAgICBlcnJvck1lc3NhZ2VOYW1lLnN0eWxlLmRpc3BsYXk9J2Jsb2NrJztcbiAgICAgICAgaXNWYWxpZCA9IGZhbHNlO1xuICAgIH0gZWxzZSB7XG4gICAgICAgIGNhdGVnb3J5TmFtZUVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZSgnZXJyb3ItYm9yZGVyJyk7XG4gICAgICAgIGVycm9yTWVzc2FnZU5hbWUuc3R5bGUuZGlzcGxheT0nbm9uZSc7XG4gICAgfVxuXG4gICAgLy8gQ2hlY2sgaWYgaXNWYWxpZCA9IGZhbHNlXG4gICAgaWYgKCFpc1ZhbGlkKSB7XG4gICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG4gICAgfVxuXG59KTtcblxuIl0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy92YWxpZGF0aW9ucy9wb3N0LWNhdGVnb3J5LmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/validations/post-category.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/validations/post-category.js"]();
/******/ 	
/******/ })()
;