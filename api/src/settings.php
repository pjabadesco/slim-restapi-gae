<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'PoweredBy' => 'Neuralink',        

        // api rate limiter settings
        'api_rate_limiter' => [
            'requests' => '200',
            'inmins' => '60',
        ],

    ],
];
