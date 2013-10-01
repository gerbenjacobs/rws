<?php

require_once __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload

$rws = new RWS\RWS;

echo '<pre>';
print_r($rws->getData());
