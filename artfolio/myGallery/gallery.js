/* JavaScript Document */

jQuery(document).ready(function () {
//    alert('script is working');

    jQuery('.gallery a').each(function () {
        
        var captionText = jQuery(this).parent().find('span').html();
        jQuery(this).attr({'data-lightbox':'slideshow','title':captionText});
    });
});
