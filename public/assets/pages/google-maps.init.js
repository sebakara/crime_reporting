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
/******/ 	return __webpack_require__(__webpack_require__.s = 50);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/google-maps.init.js":
/*!************************************************!*\
  !*** ./resources/js/pages/google-maps.init.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
Template Name: Ubold - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 3.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Google maps init js
*/
!function ($) {
  "use strict";

  var GoogleMap = function GoogleMap() {}; //creates basic map


  GoogleMap.prototype.createBasic = function ($container) {
    return new GMaps({
      div: $container,
      lat: -12.043333,
      lng: -77.028333
    });
  }, //creates map with markers
  GoogleMap.prototype.createMarkers = function ($container) {
    var map = new GMaps({
      div: $container,
      lat: -12.043333,
      lng: -77.028333
    }); //sample markers, but you can pass actual marker data as function parameter

    map.addMarker({
      lat: -12.043333,
      lng: -77.03,
      title: 'Lima',
      details: {
        database_id: 42,
        author: 'HPNeo'
      },
      click: function click(e) {
        if (console.log) console.log(e);
        alert('You clicked in this marker');
      }
    });
    map.addMarker({
      lat: -12.042,
      lng: -77.028333,
      title: 'Marker with InfoWindow',
      infoWindow: {
        content: '<p>HTML Content</p>'
      }
    });
    return map;
  }, //creates map with polygone
  GoogleMap.prototype.createWithPolygon = function ($container, $path) {
    var map = new GMaps({
      div: $container,
      lat: -12.043333,
      lng: -77.028333
    });
    var polygon = map.drawPolygon({
      paths: $path,
      strokeColor: '#BBD8E9',
      strokeOpacity: 1,
      strokeWeight: 3,
      fillColor: '#BBD8E9',
      fillOpacity: 0.6
    });
    return map;
  }, //creates map with overlay
  GoogleMap.prototype.createWithOverlay = function ($container) {
    var map = new GMaps({
      div: $container,
      lat: -12.043333,
      lng: -77.028333
    });
    map.drawOverlay({
      lat: map.getCenter().lat(),
      lng: map.getCenter().lng(),
      content: '<div class="gmaps-overlay">Our Office!<div class="gmaps-overlay_arrow above"></div></div>',
      verticalAlign: 'top',
      horizontalAlign: 'center'
    });
    return map;
  }, //creates map with street view
  GoogleMap.prototype.createWithStreetview = function ($container, $lat, $lng) {
    return GMaps.createPanorama({
      el: $container,
      lat: $lat,
      lng: $lng
    });
  }, //Routes
  GoogleMap.prototype.createWithRoutes = function ($container, $lat, $lng) {
    var map = new GMaps({
      div: $container,
      lat: $lat,
      lng: $lng
    });
    $('#start_travel').click(function (e) {
      e.preventDefault();
      map.travelRoute({
        origin: [-12.044012922866312, -77.02470665341184],
        destination: [-12.090814532191756, -77.02271108990476],
        travelMode: 'driving',
        step: function step(e) {
          $('#instructions').append('<li>' + e.instructions + '</li>');
          $('#instructions li:eq(' + e.step_number + ')').delay(450 * e.step_number).fadeIn(200, function () {
            map.setCenter(e.end_location.lat(), e.end_location.lng());
            map.drawPolyline({
              path: e.path,
              strokeColor: '#131540',
              strokeOpacity: 0.6,
              strokeWeight: 6
            });
          });
        }
      });
    });
    return map;
  }, //Type
  GoogleMap.prototype.createMapByType = function ($container, $lat, $lng) {
    var map = new GMaps({
      div: $container,
      lat: $lat,
      lng: $lng,
      mapTypeControlOptions: {
        mapTypeIds: ["hybrid", "roadmap", "satellite", "terrain", "osm", "cloudmade"]
      }
    });
    map.addMapType("osm", {
      getTileUrl: function getTileUrl(coord, zoom) {
        return "http://tile.openstreetmap.org/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
      },
      tileSize: new google.maps.Size(256, 256),
      name: "OpenStreetMap",
      maxZoom: 18
    });
    map.addMapType("cloudmade", {
      getTileUrl: function getTileUrl(coord, zoom) {
        return "http://b.tile.cloudmade.com/8ee2a50541944fb9bcedded5165f09d9/1/256/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
      },
      tileSize: new google.maps.Size(256, 256),
      name: "CloudMade",
      maxZoom: 18
    });
    map.setMapTypeId("osm");
    return map;
  }, GoogleMap.prototype.createWithMenu = function ($container, $lat, $lng) {
    var map = new GMaps({
      div: $container,
      lat: $lat,
      lng: $lng
    });
    map.setContextMenu({
      control: 'map',
      options: [{
        title: 'Add marker',
        name: 'add_marker',
        action: function action(e) {
          this.addMarker({
            lat: e.latLng.lat(),
            lng: e.latLng.lng(),
            title: 'New marker'
          });
          this.hideContextMenu();
        }
      }, {
        title: 'Center here',
        name: 'center_here',
        action: function action(e) {
          this.setCenter(e.latLng.lat(), e.latLng.lng());
        }
      }]
    });
  }, //Type
  GoogleMap.prototype.createMapByType = function ($container, $lat, $lng) {
    var map = new GMaps({
      div: $container,
      lat: $lat,
      lng: $lng,
      mapTypeControlOptions: {
        mapTypeIds: ["hybrid", "roadmap", "satellite", "terrain", "osm", "cloudmade"]
      }
    });
    map.addMapType("osm", {
      getTileUrl: function getTileUrl(coord, zoom) {
        return "http://tile.openstreetmap.org/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
      },
      tileSize: new google.maps.Size(256, 256),
      name: "OpenStreetMap",
      maxZoom: 18
    });
    map.addMapType("cloudmade", {
      getTileUrl: function getTileUrl(coord, zoom) {
        return "http://b.tile.cloudmade.com/8ee2a50541944fb9bcedded5165f09d9/1/256/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
      },
      tileSize: new google.maps.Size(256, 256),
      name: "CloudMade",
      maxZoom: 18
    });
    map.setMapTypeId("osm");
    return map;
  }, //creates map with style
  GoogleMap.prototype.createWithStyle = function ($container, styleJson) {
    var map = new GMaps({
      div: $container,
      lat: -12.043333,
      lng: -77.028333,
      styles: styleJson
    });
  }, //init
  GoogleMap.prototype.init = function () {
    var $this = this;
    $(document).ready(function () {
      //creating basic map
      $this.createBasic('#gmaps-basic'), //with sample markers
      $this.createMarkers('#gmaps-markers'); //polygon

      var path = [[-12.040397656836609, -77.03373871559225], [-12.040248585302038, -77.03993927003302], [-12.050047116528843, -77.02448169303511], [-12.044804866577001, -77.02154422636042]];
      $this.createWithPolygon('#gmaps-polygons', path); //overlay

      $this.createWithOverlay('#gmaps-overlay'); //street view

      $this.createWithStreetview('#panorama', 42.3455, -71.0983); //routes

      $this.createWithRoutes('#gmaps-route', -12.043333, -77.028333); //types

      $this.createMapByType('#gmaps-types', -12.043333, -77.028333); //statu

      $this.createWithMenu('#gmaps-menu', -12.043333, -77.028333); // style - ultra light

      $this.createWithStyle("#ultra-light", [{
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [{
          "color": "#e9e9e9"
        }, {
          "lightness": 17
        }]
      }, {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [{
          "color": "#f5f5f5"
        }, {
          "lightness": 20
        }]
      }, {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 17
        }]
      }, {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 29
        }, {
          "weight": 0.2
        }]
      }, {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 18
        }]
      }, {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 16
        }]
      }, {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [{
          "color": "#f5f5f5"
        }, {
          "lightness": 21
        }]
      }, {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [{
          "color": "#dedede"
        }, {
          "lightness": 21
        }]
      }, {
        "elementType": "labels.text.stroke",
        "stylers": [{
          "visibility": "on"
        }, {
          "color": "#ffffff"
        }, {
          "lightness": 16
        }]
      }, {
        "elementType": "labels.text.fill",
        "stylers": [{
          "saturation": 36
        }, {
          "color": "#333333"
        }, {
          "lightness": 40
        }]
      }, {
        "elementType": "labels.icon",
        "stylers": [{
          "visibility": "off"
        }]
      }, {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [{
          "color": "#f2f2f2"
        }, {
          "lightness": 19
        }]
      }, {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#fefefe"
        }, {
          "lightness": 20
        }]
      }, {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [{
          "color": "#fefefe"
        }, {
          "lightness": 17
        }, {
          "weight": 1.2
        }]
      }]);
    });
    $this.createWithStyle("#dark", [{
      "featureType": "all",
      "elementType": "labels",
      "stylers": [{
        "visibility": "on"
      }]
    }, {
      "featureType": "all",
      "elementType": "labels.text.fill",
      "stylers": [{
        "saturation": 36
      }, {
        "color": "#000000"
      }, {
        "lightness": 40
      }]
    }, {
      "featureType": "all",
      "elementType": "labels.text.stroke",
      "stylers": [{
        "visibility": "on"
      }, {
        "color": "#000000"
      }, {
        "lightness": 16
      }]
    }, {
      "featureType": "all",
      "elementType": "labels.icon",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "featureType": "administrative",
      "elementType": "geometry.fill",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 20
      }]
    }, {
      "featureType": "administrative",
      "elementType": "geometry.stroke",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 17
      }, {
        "weight": 1.2
      }]
    }, {
      "featureType": "administrative.country",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#e5c163"
      }]
    }, {
      "featureType": "administrative.locality",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#c4c4c4"
      }]
    }, {
      "featureType": "administrative.neighborhood",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#e5c163"
      }]
    }, {
      "featureType": "landscape",
      "elementType": "geometry",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 20
      }]
    }, {
      "featureType": "poi",
      "elementType": "geometry",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 21
      }, {
        "visibility": "on"
      }]
    }, {
      "featureType": "poi.business",
      "elementType": "geometry",
      "stylers": [{
        "visibility": "on"
      }]
    }, {
      "featureType": "road.highway",
      "elementType": "geometry.fill",
      "stylers": [{
        "color": "#e5c163"
      }, {
        "lightness": "0"
      }]
    }, {
      "featureType": "road.highway",
      "elementType": "geometry.stroke",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "featureType": "road.highway",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#ffffff"
      }]
    }, {
      "featureType": "road.highway",
      "elementType": "labels.text.stroke",
      "stylers": [{
        "color": "#e5c163"
      }]
    }, {
      "featureType": "road.arterial",
      "elementType": "geometry",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 18
      }]
    }, {
      "featureType": "road.arterial",
      "elementType": "geometry.fill",
      "stylers": [{
        "color": "#575757"
      }]
    }, {
      "featureType": "road.arterial",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#ffffff"
      }]
    }, {
      "featureType": "road.arterial",
      "elementType": "labels.text.stroke",
      "stylers": [{
        "color": "#2c2c2c"
      }]
    }, {
      "featureType": "road.local",
      "elementType": "geometry",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 16
      }]
    }, {
      "featureType": "road.local",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#999999"
      }]
    }, {
      "featureType": "transit",
      "elementType": "geometry",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 19
      }]
    }, {
      "featureType": "water",
      "elementType": "geometry",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 17
      }]
    }]);
  }, //init
  $.GoogleMap = new GoogleMap(), $.GoogleMap.Constructor = GoogleMap;
}(window.jQuery), //initializing 
function ($) {
  "use strict";

  $.GoogleMap.init();
}(window.jQuery);

/***/ }),

/***/ 50:
/*!******************************************************!*\
  !*** multi ./resources/js/pages/google-maps.init.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/prince/projects/sprms/resources/js/pages/google-maps.init.js */"./resources/js/pages/google-maps.init.js");


/***/ })

/******/ });