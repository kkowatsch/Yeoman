(function ($) {
    /* Initialize jQuery Colorbox*/
    var cbSettings = {
        rel: 'cboxElement',
        transition: "elastic",
        speed: 300,
        fixed: true,
        width: false,
        initialWidth: "600",
        innerWidth: false,
        maxWidth: "100%",
        height: false,
        initialHeight: "450",
        innerHeight: false,
        maxHeight: "100%",
        opacity: .95,
        title: function () {
            return $(this).find('img').attr('alt');
        },
        current: artfolio_script_vars.current,
        previous: artfolio_script_vars.previous,
        next: artfolio_script_vars.next,
        close: artfolio_script_vars.close,
        xhrError: artfolio_script_vars.xhrError,
        imgError: artfolio_script_vars.imgError
    }
    $('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').colorbox(cbSettings);

//Make ColorBox responsive

    jQuery.colorbox.settings.maxWidth = '95%';
    jQuery.colorbox.settings.maxHeight = '95%';

/**
     * Auto Re-Size function
     */
    function resizeColorBox()
    {
        if (jQuery('#cboxOverlay').is(':visible')) {
            jQuery.colorbox.resize({width:'100%', height:'100%'});
        }
    }

    // Resize Colorbox when resizing window or changing mobile device orientation
    jQuery(window).resize(resizeColorBox);
    window.addEventListener("orientationchange", resizeColorBox, false);

})(jQuery);
