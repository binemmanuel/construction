<?php
require 'lib/classes/User.php';
require 'lib/classes/Token.php';

// Instantiate a User Object.
$user = new User;

/**
 * Process for data.
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Store the email address.
    $email = clean_data($_POST['email']);

    if (!empty($_POST['email'])) {
        // Check if the user already subscribed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Store an error message
            $error = 'Invalid email address. Please enter a valid email address.';

        } elseif ($user::user_exist($email)) {
            // Store an error message
            $res = 'You are already a subscriber. Thank you.';
        } else {
            // Set the user's role.
            $user->set_role('subscriber');
        
            // Set the user's email address.
            $user->set_email($email);

            // Subcribe.
            if ($user->subcribe()) {
                $user_id = $user->get_user_id(); // Get the user's ID.
                $generated_token = generate_token(); // Generate a token

                // Instantiate a token Object
                $token = new Token(
                    null,
                    $user_id, // Get the user's ID.
                    $generated_token, // Generate a token
                );

                // Save token.
                $token->save();
                
                /**
                 * Mail email the subscriber.
                 */
                // Subject of the message
                $subject = 'Please confirm your subscription';

                // Store a message.
                $message = '<link rel="stylesheet" href="https://binemmanuel.com/assets/css/style.css">';
                $message .= '<div class="mail-template">';
                $message .= '<h2><strong>Hello,<strong/></h2>';
                $message .= '<p>Please click the button below to confirm that ';
                $message .= $email;
                $message .= ' is the correct email address to recieve my newsletter.</p>';
                $message .= '<br/>';
                // $message .= "<a class='btn' href='https://binemmanuel.com/confirm-email?action=subscribe&id=$user_id&token=$generated_token'>Confirm your email</a>";
                $message .= "<a class='btn' href='localhost/construction/confirm-email?action=subscribe&id=$user_id&token=$generated_token'>Confirm your email</a>";
                $message .= '<br/>';
                $message .= '<br/>';
                $message .= '<hr>';
                // $message .= "<p>If you didn't subscribe, just delete this email <a class='link' href='https://binemmanuel.com/confirm-email?action=unsubscribe&id=$user_id'>here</a>.";
                $message .= "<p>If you didn't subscribe, just delete this email <a class='link' href='localhost/construction/confirm-email?action=unsubscribe&id=$user_id'>here</a>.";
                $message .= ' You are not subscribed until you click the confirmation button above.';
                $message .= '</div>';
                
                // Include mailer
                require 'lib/mail.php';
            }
        }
        
    } else {
        // store an error message
        $error = 'Please enter your email address';
    }
}