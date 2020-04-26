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
