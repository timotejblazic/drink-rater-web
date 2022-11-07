$(document).ready(function() {
    hamburger();
    header();
    accordions();
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