<?php
 
/*
 * Plugin Name: Quform Contact
 * Description: Add a custom contact based in a ACF 
 * Version: 1.0
 */
 
// Paste in your custom code below

//Custom Email Quform
add_action('quform_pre_send_notification_1_1', function (PHPMailer $mailer) {
    
    $postId = isset($_POST['post_id']) ? (int) $_POST['post_id'] : 0;
    $email = get_field($postId, 'contact_email', true);
 
    if (Quform_Validator_Static::isValid('email', $email)) {
        $mailer->clearAddresses();
        $mailer->addAddress($email);
    }
});
