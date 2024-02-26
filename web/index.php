<?php

require_once "/var/www/html/src/Views/Layout.php";
require_once "/var/www/html/src/Views/Users/Listing.php";


$lastJoinedUsers = (require "/var/www/html/dic/users.php")->getLastJoined();

switch (require "/var/www/html/dic/negotiated_format.php") {
    case "text/html":
        (new Views\Layout(
            "Twitter - Newcomers", new Views\Users\Listing($lastJoinedUsers), true
        ))();
        exit;

    case "application/json":
        header("Content-Type: application/json");
        echo json_encode($lastJoinedUsers);
        exit;
}

http_response_code(406);
