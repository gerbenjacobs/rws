<?php

require_once __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload

$rws = new rws\rws;

echo '<pre>';
print_r($rws->getData()[0]);
