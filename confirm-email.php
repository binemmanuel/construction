<?php
require 'lib/config.php';
require 'lib/classes/User.php';
require 'lib/classes/Token.php';

/**
 * Process data
 */
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !EMPTY($_GET['action'])) {
    "action=subscribe
    id=72
    token=6e8feafa3cb7e62655";

    // Store requied data
    $action = (string) (!empty($_GET['action'])) ? clean_data($_GET['action']) : '';
    $user_id = (int) (!empty($_GET['id'])) ? clean_data($_GET['id']) : 0;
    $token = (string) (!empty($_GET['token'])) ? clean_data($_GET['token']) : '';

    // Instantiate a Token Object
    $token_obj = new Token;

    switch ($action) {
        case 'subscribe':
            // Set required data
            $token_obj->set_user_id($user_id);
            $token_obj->set_token($token);

            // Confirm the email
            if ($token_obj->verify()) {
                // Activate the user account
                $token_obj->change_status(1, $user_id);

                // Delete the token
                $token_obj->del();

                // Store a mesage
                $_SESSION['res'] = 'Thank you for subscribing to my newsletter.';

                // Take the user to the landing page
                header('Location: index');
                exit;
            } else {
                // Store a mesage
                $_SESSION['res_err'] = 'Invalid token.';

                // Take the user to the landing page
                header('Location: index');
                exit;
            }

            break;
        
        case 'unsubscribe':
            // Set required data
            $token_obj->set_user_id($user_id);
            $token_obj->set_token($token);

            // Deactivate the user account
            $token_obj->change_status(0, $user_id);

            // Store a mesage
            $_SESSION['res_err'] = 'You just unsubscribed from my newsletter.';

            // Take the user to the landing page
            header('Location: index');
            exit;
            break;
            
    }
}