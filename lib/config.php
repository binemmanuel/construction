<?php
/**
 * System configurations.
 * 
 * @package Bin Emmanuel
 * @author  Bin Emmanuel https://github.com/binemmanuel
 * @license GNU GENERAL PUBLIC LICENSE https://www.gnu.org/licenses/
 * @link    https://github.com/
 *
 * @version	1.0
 */
session_name("id");
// Initialize session.
session_start();

// Include our functions.
require 'functions.php';

/**
 * Class Directory.
 */
define('LIB_DIR', 'lib'. DIRECTORY_SEPARATOR);

/**
 * Classes file path.
 */
define('CLASS_DIR', LIB_DIR .'classes'. DIRECTORY_SEPARATOR);

/**
 * Upload Directory.
 */
define('UPLOAD_DIR', 'bt-contents'. DIRECTORY_SEPARATOR);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database */
define('DB_NAME', 'construction');

/** MySQL database username */
define('DB_USER', 'binemmanuel');

/** MySQL database password */
define('DB_PASSWORD', 'SMARTlogin89');

/** MySQL hostname */
define('DB_SERVER', 'localhost');

/** Set character set */
define('CHARSET', 'utf8mb4');

/** Mail configurations */
define('SMTP_HOST', 'mail.binemmanuel.com');
define('SMTP_DEBUG', false);
define('SMTP_PORT', 26);
define('REPLY_TO', 'me@binemmanuel.com');
define('MAIL_USER', 'me@binemmanuel.com');
define('MAIL_USERS_NAME', 'Bin Emmanuel');
define('MAIL_PASSWORD', 'SMARTESTlogin89');

/**
 * For developers: Dragon Programming Forum debugging mode.
 *
 * Configure error reporting options
 * Change this to false to enable the display of notices during development.
 */
define('IS_ENV_PRODUCTION', false);

// Turn on error reporting
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', !IS_ENV_PRODUCTION);

// ** Set time zone to use date/time functions without warnings ** //
date_default_timezone_set('Africa/Lagos'); //http://www.php.net/manual/en/timezones.php

// Check if "log" folder exists.
if (!file_exists('../log')) {
    // Create the "log" folder.
    mkdir('../log');
} else {
    // Set error log.
    ini_set('error_log', 'log/php-error.txt');
}
