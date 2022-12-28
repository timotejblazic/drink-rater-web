$(document).ready(function() {
    hamburger();
    header();
    accordions();
    ratingStars();
    displayRatingStars();
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
    let accordionContent = accordion.children().last();

    accordion.on('click', function() {
        accordionContent.toggleClass('active');
        accordionTitle.toggleClass('active');
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
    let ratingAvg = $(".drink__header__rating__number").text();
    let stars = $(".drink__header__rating__star");
    
    // Go through each star and if it's less than the average rating, add the active class to that and each prevous star
    stars.each(function() {
        if ( $(this).data('rating') <= ratingAvg ) {
            $(this).addClass('active');
        }
    });
}