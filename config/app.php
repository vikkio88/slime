<?php

return [
    'boot' => [
        'settings' => [
            'displayErrorDetails' => true,
        ]
    ],
    'authHeader' => 'X-AUTH-TOKEN',
    'key' => 'some_random_key',
    'tokenLife' => 6 // Token Life in hours
];
