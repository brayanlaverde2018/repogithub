<?php

/**
 * Returns the best negotiated format according to RFC 7231.
 */

 require_once "/var/www/html/src/Negotiation/Negotiator.php";

return (new \Negotiation\Negotiator())
    ->getBest($_SERVER["HTTP_ACCEPT"], ['text/html', 'application/json'])
    ->getValue();
