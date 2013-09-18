<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use GerbenJacobs\RWS;

$rws = new RWS;

echo '<pre>';
print_r($rws->getData());
