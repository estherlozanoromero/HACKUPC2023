<?php
require "vendor/autoload.php";
use vendor\minishlink\WebPush\VAPID;
print_r(VAPID::createVapidKeys());
