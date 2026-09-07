<?php

echo '<pre>';

var_dump([
    'SESSION_DRIVER_getenv' => getenv('SESSION_DRIVER'),
    'SESSION_DRIVER_SERVER' => $_SERVER['SESSION_DRIVER'] ?? null,
    'SESSION_DRIVER_ENV' => $_ENV['SESSION_DRIVER'] ?? null,

    'APP_ENV_getenv' => getenv('APP_ENV'),
    'APP_ENV_SERVER' => $_SERVER['APP_ENV'] ?? null,
    'APP_ENV_ENV' => $_ENV['APP_ENV'] ?? null,

    'APP_URL_getenv' => getenv('APP_URL'),
]);

echo '</pre>';

exit;
