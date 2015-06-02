<?php

require_once __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload

$RwsApi = new rws\RwsApi;

$RwsApi->update();

$measurepoint = $RwsApi->getMeasurePointByLocation("A122");

var_dump($measurepoint);
