<?php

require_once "/var/www/html/src/Service/UsersService.php";

return new Service\TweetsService(
    require "/var/www/html/config/db-connection.php"
);
