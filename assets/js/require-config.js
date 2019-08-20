require.config({
  // 避免緩存
  // 'urlArgs': 'bust=' + (new Date()).getTime(),
  'baseUrl': 'assets/js/vendors',
  // 路徑或別名
  'paths': {

    'jquery': 'jquery.min',
    'bootstrap': 'bootstrap.bundle.min',
    'angular': 'angular.min',

    'angular-bootstrap': '../angular-bootstrap',
    'angular-config': '../angular-config',

    'angular-ui-router': 'AngularJS/angular-ui-router.min',

    'common': '../common',

    'TweenLite': 'GSAP/TweenLite.min',
    'TweenMax': 'GSAP/TweenMax.min',
    'TimelineLite': 'GSAP/TimelineLite.min',
    'TimelineMax': 'GSAP/TimelineMax.min',

    'iscroll': 'iscroll-probe',
    'soundmanager2': 'soundmanager2-nodebug.min',
    'skrollr': 'skrollr.min',
    'lity': 'lity.min',
    'createjs': 'preloadjs.min',

    'ScrollMagic': 'ScrollMagic.min',
    'ScrollMagic.debug': 'ScrollMagic/debug.addIndicators.min',
    'ScrollMagic.gsap': 'ScrollMagic/animation.gsap.min',

    'easing': 'jQuery/jquery.easing.min',
    'mousewheel': 'jQuery/jquery.mousewheel.min',

    'vidbg': 'jQuery/jquery.vidbg.revise',
    'mCustomScrollbar': 'jQuery/jquery.mCustomScrollbar.min',

    'async': 'RequireJS/async',
    'font': 'RequireJS/font',
    'goog': 'RequireJS/goog',
    'image': 'RequireJS/image',
    'json': 'RequireJS/json',
    'noext': 'RequireJS/noext',
    'mdown': 'RequireJS/mdown'
  },
  // 初始化模組
  'map' : {
      '*': {
        'domReady': 'RequireJS/domReady',
        'css': 'RequireJS/css.min'
      }
  },
  // 依賴
  'shim' : {

    'angular': {
      'deps': [
        'jquery',
        'bootstrap'
      ],
      'exports': 'angular'
    },
    'angular-ui-router': {
      'deps': [
        'angular'
      ]
    },
    'angular-bootstrap': {
      'deps': [
        'angular'
      ]
    },

    'createjs': {
      'exports': 'createjs'
    },

    'soundmanager2': {
      'exports': 'soundManager'
    },

    'ScrollMagic.debug': {
      'deps': [
        'ScrollMagic',
      ]
    },
    'ScrollMagic.gsap': {
      'deps': [
        'ScrollMagic',
        'TweenMax',
        'TimelineMax'
      ]
    },

    'lity': {
      'deps': [
        'css!../../css/lity.min'
      ]
    },

    'mCustomScrollbar': {
      'deps': [
        'jquery',
        'mousewheel',
        'css!../../css/mCustomScrollbar.min'
      ]
    },

    'jquery': {
      'exports': '$'
    },
    'bootstrap': {
      'deps': [
        'jquery'
      ]
    },
    'easing': {
      'deps': [
        'jquery'
      ]
    },

    'angular-bootstrap': {
      'deps': [
        'jquery',
        'bootstrap',
        'angular',
        'easing'
      ]
    }
  },
  'deps': [
    'angular-bootstrap'
  ]
});
