define([
  'ScrollMagic',
  'iscroll',
  'ScrollMagic.gsap',
  // 'ScrollMagic.debug',
  'GSAP/plugins/ScrollToPlugin',
  // 'soundmanager2',
  'vidbg',
  'angular-ui-router'
],
function(ScrollMagic, IScroll) {

  var $win = $(window), $body = $('body');

  // container: '#scroll-magic-body'
  var controller = new ScrollMagic.Controller({});

  var tl3 = new TimelineMax();
  tl3
    .add(TweenMax.to('.welcome-choreographer', .8, {'bottom': '40%'}))
    .add(TweenMax.to('.welcome-choreographer', .2, {'opacity': '0'}));

  new ScrollMagic.Scene({triggerElement: '#welcome-body', triggerHook: 'onLeave', duration: '100%'})
    .setTween([
      TweenMax.to('.welcome-logo', 1, {'top': '0', 'transform': 'translateY(0%)'}),
      TweenMax.to('.welcome-logo img', 1, {'width': '154px'}),
      TweenMax.to('.bg-welcome-pupil', 1, {'background-size': 'auto 120%'}),
      TweenMax.to('.bg-welcome-pupil', .2, {'opacity': '1'}),
      tl3
    ])
    .on('end', function(event) {
      if (event.scrollDirection == 'FORWARD') {
        $('.welcome-logo').removeClass(' events-none');
      } else {
        $('.welcome-logo').addClass(' events-none');
      }
    })
    .addTo(controller);

  new ScrollMagic.Scene({triggerElement: '#welcome-body', duration: '100%'})
    .on('end', function(event) {
      $('.bg-welcome-video').css('opacity', Number(event.scrollDirection != 'FORWARD'));
      $('.bg-about-me').css('opacity', Number(event.scrollDirection == 'FORWARD'));
    })
    //.addIndicators()
    .addTo(controller);

  new ScrollMagic.Scene({triggerElement: '#about-me-body', triggerHook: 'onEnter', duration: '50%'})
    .setTween([
      TweenMax.to('.bg-welcome-pupil', 1, {'background-size': 'auto 20%', 'opacity': '0'})
    ])
    .addTo(controller);

  new ScrollMagic.Scene({triggerElement: '#about-me-body', triggerHook: 'onLeave', duration: '100%'})
    .setTween([
      TweenMax.to('.bg-about-me', 2, {'background-position-y': '-540px'})
    ])
    .addTo(controller);

  new ScrollMagic.Scene({triggerElement: '#trailer-body', duration: '10%'})
    .setTween([
      TweenMax.to('.bg-team-video', 1, {'opacity': '.7'})
    ])
    .addTo(controller);

  new ScrollMagic.Scene({triggerElement: '#trailer-body', triggerHook: 'onLeave', duration: '20%'})
    .setTween([
      TweenMax.to('.bg-team-video', 1, {'top': '0%', 'opacity': '1'})
    ])
    .on('end', function(event) {
      $('.bg-about-me').css('opacity', Number(event.scrollDirection != 'FORWARD'));
    })
    .addTo(controller);

  new ScrollMagic.Scene({triggerElement: '#teams-body', triggerHook: 'onLeave'})
    .on('start', function(event) {
      $('.bg-journal-video').css('opacity', Number(event.scrollDirection == 'FORWARD'));
    })
    .addTo(controller);

  new ScrollMagic.Scene({triggerElement: '#journal-body', triggerHook: 'onEnter', duration: '50%'})
    .setTween([
      TweenMax.to('.bg-team-video', 1, {'opacity': '0'})
    ])
    .addTo(controller);

  new ScrollMagic.Scene({triggerElement: '#journal-body', triggerHook: 'onLeave'})
    .on('start', function(event) {
      $('.bg-ticket-video').css('opacity', Number(event.scrollDirection == 'FORWARD'));
    })
    .addTo(controller);

  new ScrollMagic.Scene({triggerElement: '#tickets-body', triggerHook: 'onEnter', duration: '20%'})
    .setTween([
      TweenMax.to('.bg-journal-video', 1, {'opacity': '0'}
     )])
    .addTo(controller);

  controller.scrollTo(function(newScrollPos, callback) {
    $('html, body').animate({'scrollTop': newScrollPos}, 1000, 'easeInOutExpo', callback);
  });

  $('.back-to-top').on('click', function(e) {
    e.preventDefault();
    controller.scrollTo(0);
  });

  $('#page-navbar-wrapper .nav-frame a').on('mouseenter mouseleave', function(e) {
    TweenMax.to(this, .2, {scrollTo: e.type == 'mouseleave' ? 0 : 50});
  });

  $('#page-navbar-button button').on('click', function(e) {
    e.preventDefault();
    $body.toggleClass('navbar-open');
    var $bgVideo = $('#page-navbar-wrapper .bg-video');
    if ($body.hasClass('navbar-open')) {
      $bgVideo.vidbg({
        'mp4': 'assets/videos/bg-menu.mp4'
      }, {
        muted: true,
        loop: true
      });
    } else {
      $bgVideo.empty();
    }
  });


  $('.about-me-frame .right-frame .read-more').on('click', function(e) {
    e.preventDefault();
    var $mEle = $(this);
    $('.about-me-frame .english .d-none')
      .removeClass('d-none')
      .css({'opacity': '0'})
      .animate({'opacity': '1'}, 1000, 'easeInOutExpo', function() {
        $mEle.remove();
      });
  });
  $('#bulletin-body .more').on('click', function(e) {
    e.preventDefault();
    var $mEle = $(this);
    $('.bulletin-list-frame .item-frame.d-none:lt(3)')
      .removeClass('d-none')
      .css({'opacity': '0'})
      .animate({'opacity': '1'}, 1000, 'easeInOutExpo', function() {
        if ($('.bulletin-list-frame .item-frame.d-none').length == 0) {
          $mEle.remove();
        }
      });
  });

  $('#journal-body .more').on('click', function(e) {
    e.preventDefault();
    var $mEle = $(this);
    $('.list-outer-fluid .list-inner-fluid.d-none:lt(1)')
      .removeClass('d-none')
      .css({'opacity': '0'})
      .animate({'opacity': '1'}, 1000, 'easeInOutExpo', function() {
        if ($('.list-outer-fluid .list-inner-fluid.d-none').length == 0) {
          $mEle.remove();
        }
      });
  });

  $('#teams-body .item-frame').on('click', function(e) {
    e.preventDefault();
    var $aEle = $(this).find('.avatar').slideDown();
    $('#teams-body .item-frame .avatar').not($aEle).slideUp();
  });

  $('#popup-bulletin-wrapper .button-close').on('click', function(e) {
    e.preventDefault();
    $('#popup-bulletin-wrapper').fadeOut('fast', function() {
     $(this).remove();
    });
  });

  setTimeout(function() {
    $('#popup-bulletin-wrapper').addClass('animate-show');
  }, 2000);

  angular

    .module('cloudgate', ['ui.router'])

    .config(function($urlRouterProvider, $locationProvider, $qProvider) {

      $locationProvider.hashPrefix('!'); // 設置前綴，這樣路由分割符為#!,即 Google 的 hashbang

      $qProvider.errorOnUnhandledRejections(false);

    })

    .config(function($stateProvider) {

      $stateProvider
        .state('close', {
          url: '/close'
        })
        .state('welcome', {
          url: '/welcome'
        })
        .state('about-me', {
          url: '/about-me'
        })
        .state('trailer', {
          url: '/trailer'
        })
        .state('teams', {
          url: '/teams'
        })
        .state('bulletin', {
          url: '/bulletin'
        })
        .state('journal', {
          url: '/journal'
        })
        .state('view', {
          url: '/view/:href',
          controller: 'ViewCtrl',
          templateUrl: function(stateParams) {
            return 'templates/' + stateParams.href + '.php';
          }
        })
        .state('tickets', {
          url: '/tickets'
        })
        .state('team', {
          url: '/team/:href',
          controller: 'TeamCtrl',
          templateUrl: function(stateParams) {
            return 'templates/' + stateParams.href + '.php';
          }
        });
    })

    .controller('TeamCtrl', function($state) {

      $('.page-back, .button-close').on('click', function(e) {
        e.preventDefault();
        TweenMax.to('#page-view-wrapper', .5, {'left': '-100%', 'onComplete': function() {
          $state.go('close');
        }});
      });

      new IScroll('.page-scroll', {
          probeType: 3,
          mouseWheel: true,
          scrollX: false,
          scrollY: true,
          scrollbars: true,
          useTransform: false,
          useTransition: false,
          click: true
        }
      );
    })

    .controller('ViewCtrl', function($state) {

      require(['mCustomScrollbar'], function() {
        $('.text-scrollbar').mCustomScrollbar({
          theme: 'dark-2',
          autoExpandScrollbar: true,
          advanced: {autoExpandHorizontalScroll: true}
        });
      });

      $('.button-close').on('click', function(e) {
        e.preventDefault();
        TweenMax.to('#page-view-wrapper', .5, {'bottom': '-100%', 'onComplete': function() {
          $state.go('close');
        }});
      });

    })

    .run(function($rootScope, $state, renderWatcher) {

      $rootScope.$on('$stateChangeStart', function(event, toState, toParams, fromState, fromParams) {
        //console.log(toState.name);
        var $pageEle = $('#page-view-wrapper');
        switch (toState.name) {
          case 'team':
            $pageEle.removeClass().addClass('team-view');
            TweenMax.to($pageEle, 1, {'left': '0'});
            $('.head-logo, .head-caption, .btn-tickets').addClass('open-show');
            break;
          case 'view':
            $pageEle.removeClass().addClass('journal-view');
            TweenMax.to($pageEle, .5, {'bottom': '0'});
            $('.head-logo, .head-caption, .btn-tickets').removeClass('open-show');
            break;
          default:
            controller.scrollTo('#' + toState.name + '-body');
            $('.head-logo, .head-caption, .btn-tickets').removeClass('open-show');
            var cssOptions = {}
            if ($pageEle.hasClass('team-view')) {
              cssOptions = {'left': '-100%'};
            } else {
              cssOptions = {'bottom': '-100%'};
            }
            TweenMax.to($pageEle, 1, {'css': cssOptions, 'onComplete': function() {
              $pageEle.removeAttr('style').removeClass();
            }});
            break;
        }
      });

      renderWatcher.init(function() {

      }, function() {
        $body.removeClass('navbar-open');
        $body.triggerHandler('setup.DU');
      });

      $rootScope.$state = $state;

      $('#scroll-magic-body').removeClass('invisible');

      $('[data-spy="scroll"]').scrollspy('refresh');
    })

    .service('renderWatcher', function($rootScope) {
      var stack = [];
      var enabled = false;
      this.init = function(startCallback, readyCallback) {
        $rootScope.$on('$viewContentLoading', function(event, view) {
          if (enabled) {
            stack.push(event.targetScope.$id);
          }
        });
        $rootScope.$on('$viewContentLoaded', function(event, view) {
          if (enabled) {
            stack.pop(event.targetScope.$id);
            if (!stack.length) {
              if (readyCallback) {
                readyCallback();
              }
            }
          }
        });
        $rootScope.$on('$stateChangeStart', function() {
          enabled = false;
          if (startCallback) {
            startCallback();
          }
        });
        $rootScope.$on('$stateChangeSuccess', function() {
          enabled = true;
        });
      }
    });

  // new IScroll('#page-navbar-wrapper .scroll-frame', {
  //     probeType: 3,
  //     mouseWheel: true,
  //     scrollX: false,
  //     scrollY: true,
  //     scrollbars: false,
  //     useTransform: false,
  //     useTransition: false,
  //     click: true
  //   }
  // );

  require(['lity'], function(lity) {

    var pageSound;
    $(document).on('lity:open', function(event, instance) {
      pageSound = $('.btn-sound').hasClass('play');
      $('.btn-sound').trigger('pause');
    });

    $(document).on('lity:close', function(event, instance) {
      if (pageSound) {
        $('.btn-sound').trigger('play');
      }
    });

  });

  require(['scrollreveal'], function(ScrollReveal) {

    window.sr = ScrollReveal({reset: true});

    sr.reveal('#teams-body .team-list-frame .item-frame', {
      reset: true
    });

    sr.reveal('.location-frame > div', {
      reset: true
    });

    sr.reveal('.fare-list-frame, .exchanges-frame, .explain-frame', {
      reset: true
    });

    sr.reveal('.precautions .item-list > li', {
      reset: true
    });

    sr.reveal('.helper-list > li', {
      reset: true
    });

  });

  require(['createjs'], function() {

    var queue = new createjs.LoadQueue();

    var dFile = [];

    dFile.push({id: 'bg-welcome', src: 'assets/videos/bg-index.mp4', type: createjs.AbstractLoader.BINARY});

    if (!navigator.userAgent.match(/iPhone|iPad|iPod/i)) {

      dFile.push({id: 'bg-team', src: 'assets/videos/bg-team.mp4', type: createjs.AbstractLoader.BINARY});
      dFile.push({id: 'bg-journal', src: 'assets/videos/bg-journal.mp4', type: createjs.AbstractLoader.BINARY});
      dFile.push({id: 'bg-ticket', src: 'assets/videos/bg-ticket.mp4', type: createjs.AbstractLoader.BINARY});
    }

    dFile.push({id: 'bg-menu', src: 'assets/videos/bg-menu.mp4', type: createjs.AbstractLoader.BINARY});
    queue.loadManifest(dFile);

    queue.on('fileload', function(event) {

      switch (event.item.id) {
        case 'bg-welcome':
          $('.' + event.item.id + '-video').vidbg({
            'mp4': event.item.src
          }, {
            muted: true,
            loop: true
          });

          $('.btn-sound')
            .on('click', function(e) {
              e.preventDefault();
              var $video = $($('.bg-welcome-video').data('vidbg').getVideoObject());
              if ($video.prop('muted')) {
                $video.prop('muted', false);
                $('.btn-sound').addClass('play');
              } else {
                $video.prop('muted', true);
                $('.btn-sound').removeClass('play');
              }
            })
            .on('play', function(e) {
              var $video = $($('.bg-welcome-video').data('vidbg').getVideoObject());
              $video.prop('muted', false);
              $('.btn-sound').addClass('play');
            })
            .on('pause', function(e) {
              var $video = $($('.bg-welcome-video').data('vidbg').getVideoObject());
              $video.prop('muted', true);
              $('.btn-sound').removeClass('play');
            });

          $('#scroll-magic-body').on('click', function(e) {
            // e.stopPropagation();
            $('.btn-sound').trigger('play');
            $('#scroll-magic-body').off('click');
          });
          break;

        case 'bg-team':
        case 'bg-journal':
        case 'bg-ticket':
          if (!navigator.userAgent.match(/iPhone|iPad|iPod/i)) {
            $('.' + event.item.id + '-video').vidbg({
              'mp4': event.item.src
            }, {
              muted: true,
              loop: true
            });
          }
          break;
      }
    });
  });

  // 加Google Code
  $body.on('click', '[data-track="gtag"]', function(e) {
    var $cEle = $(this);
    gtag('event', 'click', {
      'event_category': $cEle.data('track-category'),
      'event_label': $cEle.data('track-label')
    });
  });

});