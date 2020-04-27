<?php
require 'lib/config.php';
require 'lib/classes/User.php';
require 'lib/classes/Token.php';

$token = new Token(
    null,
    2,
    generate_token(),
    '2020-04-26 16:56:12'
);

?>

<pre>
    <?= print_r($token) ?>
</pre>