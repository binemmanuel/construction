<?php
/**
 * Our functions.php file contains all functions.
 * 
 * @package Bin Emmanuel
 * @author  Bin Emmanuel https://github.com/binemmanuel
 * @license GNU GENERAL PUBLIC LICENSE https://www.gnu.org/licenses/
 * @link    https://github.com/
 *
 * @version	1.0
 */

/**
 * Sanitize data.
 * 
 * @param anything
 * @return string A clean data.
 */
function clean_data($data): string
{
    return $data = htmlspecialchars(stripslashes(trim($data)));
}

/**
 * Remove file extention.
 * 
 * @param string The file path.
 * @return string The new file path
 */
function rm_ext(string $file_path): string
{
    $file_path = explode('.', $file_path);
    $file_path = $file_path[0];
    
    return $file_path;
}

/**
 * Generate token.
 * 
 * @return string A token.
 */
function generate_token(): string
{
    $token = uniqid(rand(10000, 99999));

    $arr = [];

    for ($i = 0; $i < strlen($token); $i++) { 
        $arr[] = $token[$i];
    }
    
    shuffle($arr);

    $token = implode('', $arr);

    return $token;
}
