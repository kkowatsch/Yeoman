<?php

function load_my_scripts() {

    // uncomment the line below if your theme does nto have jQuery loaded
    // wp_register_script( 'jquery', get_template_directory_uri() . '/myGallery/jquery-1.8.3.min.js' );

//    wp_register_script('mygallery_lightbox', get_template_directory_uri() . '/myGallery/lightbox/js/lightbox-2.6.min.js', array('jquery'));
    wp_register_script('mygallery_custom', get_template_directory_uri() . '/myGallery/gallery.js', array('jquery'));

//    wp_enqueue_script('mygallery_lightbox');
    wp_enqueue_script('mygallery_custom');
}

add_action('wp_enqueue_scripts', 'load_my_scripts');

//deactivate WordPress function
remove_shortcode('gallery', 'gallery_shortcode');

//activate our custom code function (below)
add_shortcode('gallery', 'mygallery_shortcode');

//gallery shortcode  >>  copied and modified from wp-includes/media.php
function mygallery_shortcode($attr) {
    $post = get_post();

    static $instance = 0;
    $instance++;

    if (!empty($attr['ids'])) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if (empty($attr['orderby']))
            $attr['orderby'] = 'post__in';
        $attr['include'] = $attr['ids'];
    }

    // Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);
    if ($output != '')
        return $output;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post ? $post->ID : 0,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => '',
        'link' => ''
                    ), $attr, 'gallery'));

    $id = intval($id);
    if ('RAND' == $order)
        $orderby = 'none';

    if (!empty($include)) {
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif (!empty($exclude)) {
        $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    } else {
        $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    }

    if (empty($attachments))
        return '';

    if (is_feed()) {
        $output = "\n";
        foreach ($attachments as $att_id => $attachment)
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $valid_tags = wp_kses_allowed_html('post');

    if (apply_filters('use_default_gallery_style', true))
        $size_class = sanitize_html_class($size);
    $gallery_div = "<div id='gallery-{$instance}' class='gallery galleryid-{$id} '>";

    $output = apply_filters('gallery_style', '' . "\n\t\t" . $gallery_div);

    foreach ($attachments as $id => $attachment) {

        if (!empty($link) && 'file' === $link)
            $image_output = wp_get_attachment_link($id, $size, false, false);
        elseif (!empty($link) && 'none' === $link)
            $image_output = wp_get_attachment_image($id, $size, false);
        else
            $image_output = wp_get_attachment_link($id, $size, true, false);

        $output .= '<div class="myGalleryItem">' . $image_output . '<span>' . wptexturize($attachment->post_excerpt) . '</span></div>';
    }

    return $output;
}
?>