import jQuery from 'jquery';
window.$ = jQuery;

$(document).ready(function() {
    hamburger();
    header();
    accordions();
    ratingStars();
    displayRatingStars();
    dropdown();
    dashboardNavigation();
    profileShowRatingStars();
});

function header() {
    let header = $('header');
    let hamburgerNav = $('.hamburger-nav');

    // Set hamburger nav offset for height of header
    hamburgerNav.css({
        'top': header.height(),
        'height': "calc(100vh - " + header.height() + "px)"
    });
}

function hamburger() {
    let icon = $(".hamburger-icon");
    let icon1 = $(".hamburger-icon1");
    let icon2 = $(".hamburger-icon2");
    let icon3 = $(".hamburger-icon3");
    let nav = $('.hamburger-nav');

    icon.on('click', function() {
        icon1.toggleClass('active');
        icon2.toggleClass('active');
        icon3.toggleClass('active');
        nav.toggleClass('active');
    });
}

function accordions() {
    let accordion = $('.accordion');
    let accordionTitle = accordion.children().first();
    let accordionArrow = accordionTitle.children().last();
    let accordionContent = accordion.children().last();

    accordionTitle.on('click', function() {
        accordionContent.toggleClass('active');
        accordionTitle.toggleClass('active');
        accordionArrow.toggleClass('active');
    });
}

function ratingStars() {
    let stars = $(".drink__rater__form__body input");

    // Go through each star and if it's clicked or hovered over, add the active class to that and each prevous star
    stars.each(function() {
        $(this).on('click', function() {
            // Remove active class from all stars
            stars.removeClass('active');

            $(this).addClass('active');
            $(this).prevAll().addClass('active');
        });

        $(this).on('mouseover', function() {
            // If any star is checked, don't add active class
            if ( !stars.is(':checked') ) {
                $(this).addClass('active');
                $(this).prevAll().addClass('active');   
            }
        });

        $(this).on('mouseout', function() {
            // If any star is checked, don't remove active class
            if ( !stars.is(':checked') ) {
                $(this).removeClass('active');
                $(this).prevAll().removeClass('active');
            }
        });
    });
}

function displayRatingStars() {
    let cocktailRatings = $(".cocktail__rating");

    cocktailRatings.each(function() {

        let ratingAvg = parseFloat($(this).children().first().text());
        let stars = $(this).children().not(':first');

        let intPart = Math.floor(ratingAvg);
        let decimalPart = ratingAvg - intPart;
        let roundedDecimalPart = Math.round((decimalPart + Number.EPSILON) * 100) / 100;
        
        // Go through each star and if it's less than the average rating, add the active class to that and each prevous star
        stars.each(function() {
            if ( $(this).data('rating') <= ratingAvg ) {
                $(this).addClass('active');
            }

            if ( $(this).data('rating') > ratingAvg && $(this).data('rating') < ratingAvg + 1 ) {
                $(this).append('<div class="cocktail__rating__fill"></div>');
                let fill = $(this).children().first();
                fill.css('width', roundedDecimalPart * 100 + '%');
            }
        });

    });
}

function dropdown() {
    let dropdown = $('.dropdown-click');
    let dropdownTitle = dropdown.children().first();
    let dropdownContent = dropdown.children().last();

    dropdown.on('click', function() {
        dropdownContent.toggleClass('active');
        dropdownTitle.toggleClass('active');
    });

    // Close dropdown if clicked outside of it
    $(document).on('click', function(event) {
        if ( !$(event.target).closest(dropdown).length ) {
            dropdownContent.removeClass('active');
            dropdownTitle.removeClass('active');
        }
    });
}

function dashboardNavigation() {
    let navLinks = $('.dashboard__nav__link');
    let navItems = $('.dashboard__nav__item');
    let contentItems = $('.dashboard__content__item');

    navLinks.each(function() {
        $(this).on('click', function() {
            navItems.removeClass('active');
            $(this).parent().addClass('active');

            // Change accordion title to the clicked link
            $(".accordion").children().first().children().first().text($(this).text());

            let contentData = $(this).data('content');
            let contentItem = $('#' + contentData);

            contentItems.removeClass('active');
            contentItem.addClass('active');
        });
    });
}

function profileShowRatingStars() {
    let ratingWrapper = $(".rating__item__left__rating");

    ratingWrapper.each(function() {
        let ratingNumber = $(this).children().first().text();
        let ratingStars = $(this).children().not(':first');
        
        ratingStars.each(function() {
            if ( $(this).data('rating') <= ratingNumber ) {
                $(this).addClass('active');
            }
        });
    });
}