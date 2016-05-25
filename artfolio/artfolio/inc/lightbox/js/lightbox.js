(function ($) {

// Initialize the Lightbox for any links with the 'fancybox' class
    $(".gallery").lightGallery({
        selector: 'a[href$=".jpg"], a[href$=".jpeg"], a[href$=".png"], a[href$=".gif"]',
        mode: 'lg-fade',
        speed: 600,
        mousewheel: true,
        getCaptionFromTitleOrAlt: true,
        caption: true, // Enables image captions. Content is taken from "data-title" attribute.
        captionLink: true, // Makes image caption a link. URL is taken from "data-link" attribute.
        desc: true, // Enables image descriptions. Description is taken from "data-desc" attr.
        download: false,
        swipeThreshold: 50,
        enableDrag: true,
        enableTouch: true,
        zoom: true
    });

})(jQuery);