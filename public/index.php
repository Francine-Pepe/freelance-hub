<?php

echo '<pre>';
var_dump([
    'SESSION_DRIVER' => getenv('SESSION_DRIVER'),
    'APP_ENV' => getenv('APP_ENV'),
    'APP_KEY_EXISTS' => !empty(getenv('APP_KEY')),
]);
echo '</pre>';

exit;
