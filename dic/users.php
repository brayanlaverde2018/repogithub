<?php

require_once "/var/www/html/src/Service/UsersService.php";

return new Service\UsersService(
    require "/var/www/html/config/db-connection.php"
);
