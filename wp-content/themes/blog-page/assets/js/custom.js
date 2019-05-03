jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/
    var loader = $('#loader');
    var loader_container = $('#preloader');
    var scroll = $(window).scrollTop();  
    var scrollup = $('.backtotop');
    var menu_toggle = $('.menu-toggle');
    var primary_menu_toggle = $('.primary-menu-toggle');
    var dropdown_toggle = $('button.dropdown-toggle');
    var nav_primary_menu = $('#primary-menu');
    var nav_secondary_menu = $('#secondary-menu');
    var masonry_gallery = $('.grid');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");

/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });


    menu_toggle.click(function(){
        nav_secondary_menu.slideToggle();
       $('.site-header').toggleClass('menu-open');
       $('.menu-overlay').toggleClass('active');
    });

    primary_menu_toggle.click(function(){
        nav_primary_menu.slideToggle();
       $('#navigation-menu').toggleClass('menu-open');
       $('.menu-overlay').toggleClass('active');
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

    $('.main-navigation ul li.search-menu a').click(function(event) {
        event.preventDefault();
        $(this).toggleClass('search-active');
        $('.main-navigation #search').fadeToggle();
        $('.main-navigation .search-field').focus();
    });

     $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.main-navigation #search').fadeOut();
        }

    });
      $(document).click(function (e) {
        var container = $("#navigation-menu");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.main-navigation #search').fadeOut();

        }
    });



/*------------------------------------------------
            MASONRY GALLERY
------------------------------------------------*/

masonry_gallery.imagesLoaded( function() {
    masonry_gallery.packery({
        itemSelector: '.grid-item'
    });
});

var $container = $('.grid');
                
$('#filter-posts ul li a').on('click', function(event) {
    event.preventDefault();

    var selector = $(this).attr('data-filter');
    $container.isotope({ filter: selector });
    $('#filter-posts ul li').removeClass('active');
    $(this).parent().addClass('active');
    return false;
});

packery = function () {
    $container.isotope({
        resizable: true,
        itemSelector: '.grid-item',
        layoutMode : 'packery',
        gutter: 0
    });
};
packery();

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});