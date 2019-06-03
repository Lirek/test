<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
    
    'allowedOrigins' => ['*'],
    //'allowedMethods' => ['*'], // ex: ['GET', 'POST', 'PUT',  'DELETE']
    'allowedMethods' => ['GET', 'POST', 'PUT'], // ex: ['GET', 'POST', 'PUT',  'DELETE']
    //'allowedHeaders' => ['Content-Type', 'X-Requested-With'],
    'allowedHeaders' => ['Origin','Content-Type', 'Accept', 'Authorization'],
    'supportsCredentials' => true,
    'allowedOriginsPatterns' => [],
    'exposedHeaders' => ['GET', 'POST', 'PUT'],
    'maxAge' => 0,

];
