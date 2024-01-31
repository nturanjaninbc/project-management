<?php

use Framework\App;

require_once dirname(__DIR__).'/vendor/autoload.php';

try {
    echo App::createApp()
        ->process()
        ->getContent();
} catch (Exception $exception) {
    var_dump($exception);
}
