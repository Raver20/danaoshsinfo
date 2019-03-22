//===================
//  DOCUMENT READY JS
//===================
jQuery(document).ready(function() {
  /* RESPONSIVE VIDEOS */
  jQuery(".frame-wrapper").fitVids();

  /* LIGHTBOX */
  jQuery('.image-gallery').magnificPopup({
    delegate: '.item a',
    type: 'image'
  });

  /* PRELOADER */
  Pace.on("done", function() {
    new WOW().init();
    $(window).trigger('resize');
  });

  /* NAVIGATION EFFECTS */
  $(function() {
    var headerNav = $(".nav-wrapper");
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();
      if (scroll >= 360) {
        headerNav.removeClass('clearHeader').addClass("scrolled fadeInDown");
      } else {
        headerNav.removeClass("scrolled fadeInDown").addClass('clearHeader');
      }
    });
  });

  $('#testimonial-carousel').carousel({
    pause: true,
    interval: 10000
  });

  $('#music-carousel').carousel({
    interval: 10000
  })

  $("#mapwrapper").gMap({
      controls: false,
      scrollwheel: false,
      markers: [{
        latitude: 40.7566,
        longitude: -73.9863,
        icon: {
          image: "assets/images/marker.png",
          iconsize: [44, 44],
          iconanchor: [12, 46],
          infowindowanchor: [12, 0]
        }
      }],
      icon: {
        image: "assets/images/marker.png",
        iconsize: [26, 46],
        iconanchor: [12, 46],
        infowindowanchor: [12, 0]
      },
      latitude: 40.7566,
      longitude: -73.9863,
      zoom: 14,
      styles: [{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}]
    });

  //CONTACT FORM
  $('#contactform').submit(function() {
    var action = $(this).attr('action');
    $("#message").slideUp(750, function() {
      $('#message').hide();
      $('#submit').attr('disabled', 'disabled');
      $.post(action, {
        name: $('#name').val(),
        email: $('#email').val(),
        website: $('#website').val(),
        comments: $('#comments').val()
      }, function(data) {
        document.getElementById('message').innerHTML = data;
        $('#message').slideDown('slow');
        $('#submit').removeAttr('disabled');
        if (data.match('success') != null) $('#contactform').slideUp('slow');
        $(window).trigger('resize');
      });
    });
    return false;
  });

  // INQUIRY FORM
  $('#inquireform').submit(function() {
    var action = $(this).attr('action');
    $("#message").slideUp(750, function() {
      $('#message').hide();
      $('#submit').attr('disabled', 'disabled');
      $.post(action, {
        sendname: $('#sendname').val(),
        sendemail: $('#sendemail').val(),
        schoolemail: $('#schoolemail').val(),
        comments: $('#comments').val()
      }, function(data) {
        document.getElementById('message').innerHTML = data;
        $('#message').slideDown('slow');
        $('#submit').removeAttr('disabled');
        if (data.match('success') != null) $('#contactform').slideUp('slow');
        $(window).trigger('resize');
      });
    });
    return false;
  });
  $('a.page-scroll').on('click', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: $($anchor.attr('href')).offset().top
    }, 1500, 'easeInOutExpo');
    event.preventDefault();
  });

  $("#home.backstretched").backstretch(["assets/images/hero-bg.jpg", "assets/images/gallery-6.jpg", "assets/images/section-bg-2.jpg", ], {
    duration: 4000,
    fade: 800
  });

  $('.dropdown').on('show.bs.dropdown', function(e) {
    var $dropdown = $(this).find('.dropdown-menu');
    var orig_margin_top = parseInt($dropdown.css('margin-top'));
    $dropdown.css({
      'margin-top': (orig_margin_top + 10) + 'px',
      opacity: 0
    }).animate({
      'margin-top': orig_margin_top + 'px',
      opacity: 1
    }, 300, function() {
      $(this).css({
        'margin-top': ''
      });
    });
  });

  // Add slidedown & fadeout animation to dropdown
  $('.dropdown').on('hide.bs.dropdown', function(e) {
    var $dropdown = $(this).find('.dropdown-menu');
    var orig_margin_top = parseInt($dropdown.css('margin-top'));
    $dropdown.css({
      'margin-top': orig_margin_top + 'px',
      opacity: 1,
      display: 'block'
    }).animate({
      'margin-top': (orig_margin_top + 10) + 'px',
      opacity: 0
    }, 300, function() {
      $(this).css({
        'margin-top': '',
        display: ''
      });
    });
  });

  if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
  }

      var masonry_portfolio_selectors = $('.masonry-portfolio-filter li a');
    var masonry_container = $('.masonry-portfolio');

    if(masonry_portfolio_selectors!='undefined'){
        var masonry_portfolio = $('.masonry-portfolio-items');
        masonry_portfolio.imagesLoaded( function(){
             masonry_portfolio.isotope({
                itemSelector: '.masonry-portfolio-item',
                masonry: {
                  columnWidth: masonry_container.width() / 2
                }
            });
        });

        masonry_portfolio_selectors.on('click', function(e){
            e.preventDefault();
            masonry_portfolio_selectors.removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            masonry_portfolio.isotope({ filter: selector });
            return false;
        });
    }
});
//===================
//  WINDOW LOADED JS
//===================
$(window).load(function() {
  $('.match-height').matchHeight();
  $('.vertical-center-js').flexVerticalCenter({
    cssAttribute: 'padding-top'
  });
  $('#music-carousel').bind('slide.bs.carousel', function(e) {
    $(window).trigger('resize');
  });

  function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .toggleClass('panel-open');
  }
  $('.styled-accordion').on('hidden.bs.collapse', toggleIcon);
  $('.styled-accordion').on('shown.bs.collapse', toggleIcon);
  
});

//===================
//  OHTER JS
//===================
$(function() {
  $('nav.pushy a[href*=#]').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var $target = $(this.hash);
      $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
      if ($target.length) {
        var targetOffset = $target.offset().top - 0;
        $('html,body').animate({
          scrollTop: targetOffset
        }, 800);
        return false;
      }
    }
  });
});
(function($) {
  'use strict';
  jQuery(window).load(function() {
    jQuery('.masonry').masonry({
      columnWidth: '.grid-sizer',
      gutter: '.gutter-sizer',
      itemSelector: '.item'
    });
  });
}(jQuery));

$(document).ready(function () {
  var itemsMainDiv = ('.MultiCarousel');
  var itemsDiv = ('.MultiCarousel-inner');
  var itemWidth = "";

  $('.leftLst, .rightLst').click(function () {
      var condition = $(this).hasClass("leftLst");
      if (condition)
          click(0, this);
      else
          click(1, this)
  });

  ResCarouselSize();




  $(window).resize(function () {
      ResCarouselSize();
  });

  //this function define the size of the items
  function ResCarouselSize() {
      var incno = 0;
      var dataItems = ("data-items");
      var itemClass = ('.item');
      var id = 0;
      var btnParentSb = '';
      var itemsSplit = '';
      var sampwidth = $(itemsMainDiv).width();
      var bodyWidth = $('body').width();
      $(itemsDiv).each(function () {
          id = id + 1;
          var itemNumbers = $(this).find(itemClass).length;
          btnParentSb = $(this).parent().attr(dataItems);
          itemsSplit = btnParentSb.split(',');
          $(this).parent().attr("id", "MultiCarousel" + id);


          if (bodyWidth >= 1200) {
              incno = itemsSplit[3];
              itemWidth = sampwidth / incno;
          }
          else if (bodyWidth >= 992) {
              incno = itemsSplit[2];
              itemWidth = sampwidth / incno;
          }
          else if (bodyWidth >= 768) {
              incno = itemsSplit[1];
              itemWidth = sampwidth / incno;
          }
          else {
              incno = itemsSplit[0];
              itemWidth = sampwidth / incno;
          }
          $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
          $(this).find(itemClass).each(function () {
              $(this).outerWidth(itemWidth);
          });

          $(".leftLst").addClass("over");
          $(".rightLst").removeClass("over");

      });
  }


  //this function used to move the items
  function ResCarousel(e, el, s) {
      var leftBtn = ('.leftLst');
      var rightBtn = ('.rightLst');
      var translateXval = '';
      var divStyle = $(el + ' ' + itemsDiv).css('transform');
      var values = divStyle.match(/-?[\d\.]+/g);
      var xds = Math.abs(values[4]);
      if (e == 0) {
          translateXval = parseInt(xds) - parseInt(itemWidth * s);
          $(el + ' ' + rightBtn).removeClass("over");

          if (translateXval <= itemWidth / 2) {
              translateXval = 0;
              $(el + ' ' + leftBtn).addClass("over");
          }
      }
      else if (e == 1) {
          var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
          translateXval = parseInt(xds) + parseInt(itemWidth * s);
          $(el + ' ' + leftBtn).removeClass("over");

          if (translateXval >= itemsCondition - itemWidth / 2) {
              translateXval = itemsCondition;
              $(el + ' ' + rightBtn).addClass("over");
          }
      }
      $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
  }

  //It is used to get some elements from btn
  function click(ell, ee) {
      var Parent = "#" + $(ee).parent().attr("id");
      var slide = $(Parent).attr("data-slide");
      ResCarousel(ell, Parent, slide);
  }

});