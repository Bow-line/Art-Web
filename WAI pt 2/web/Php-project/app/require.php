<?php
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';

require_once 'config/config.php';

foreach (scandir(APPROOT.'/helpers') as $filename) {
    $path = APPROOT . '/helpers/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}
$init = new Core();
