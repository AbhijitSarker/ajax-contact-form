<?php

$path = preg_replace('/wp-content.*$/', '', __DIR__);

require_once($path . "wp-load.php");

if (isset($_POST['ajaxContactSubmit']) && $_POST['ajaxContactSubmit'] == "1") {

    //get the information from the post submit
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $comments = sanitize_textarea_field($_POST['comments']);

    //write the email info for the sending to admin
    $to = 'abhijit.pranta@gmail.com';
    $subject = 'ajax contact form submitted';
    $message = '';

    $message .= 'Name:' . $name . '<br/>';
    $message .= 'Email:' . $email . '<br/>';
    $message .= 'Phone:' . $phone . '<br/>';

    $comments = wpautop($comments);
    $comments = str_replace("<p>", "", $comments);
    $comments = str_replace("</p>", "<br><br>", $comments);

    $message .= 'Comments:<br>' . $comments . '<br><br>';

    $message .= 'Thank you.';

    wp_mail($to, $subject, $message);

    //return somethig for the user
    $return = [];
    $return['success'] = 1;
    $return['message'] = 'your information has been saved';

    echo json_encode($return);
}
