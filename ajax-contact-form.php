<?php

/**
 * Plugin Name:       Contact Form
 * Plugin URI:        https://github.com/AbhijitSarker
 * Description:       Contact form featuring ajax.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Abhijit Sarker
 * Author URI:        https://github.com/AbhijitSarker
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       cf
 * Domain Path:       /languages
 */


if (!defined('ABSPATH')) {
    die;
}


function ajax_contact_form()
{
    //create string variable to hold the conent
    $content = '';

    // $content .= '<form method="POST" action=""></form>';

    $content .= '<style>.ajax_form lable {display:block; padding:8px 0px 4px 0px; } .ajax_form input[type=text],input[type=email] {width:400px; padding: 8px; } .ajax_form textaarea {width:400px; hight:200px; paadding:8px;}</style>';

    $content .= '<div class="ajax_form">';

    $content .= '<label for="your_name">Your Name</label>';
    $content .= '<input type="text" name="your_name" id="your_name" placeholder="Your Full Name" >';

    $content .= '<label for="your_email">Your Email</label>';
    $content .= '<input type="email" name="your_email" id="your_email" placeholder="Your Email" >';

    $content .= '<label for="your_phone">Your Phone</label>';
    $content .= '<input type="text" name="your_phone" id="your_phone" placeholder="Your Phone">';

    $content .= '<label for="your_comments">Comments or Quenstions</label>';
    $content .= '<textarea name="your_comments" name="your_comments" placeholder="Say Something Nice">';


    $content .= '<input type="submit" name="ajax_contact_submit" id="ajax_contact_submit">';

    $content .= '</div>';




    return $content;
}

add_shortcode('contact_form', 'ajax_contact_form');


add_action('wp_footer', 'ajax_contact_form_js');

function ajax_contact_form_js()
{
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="http://localhost:10003/wp-content/plugins/ajax-contact-form/js/ajax-form.js"> </script>
<?php
}
