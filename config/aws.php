<?php

use Aws\Laravel\AwsServiceProvider;


return [
    'credentials' => [
        'key'    => env('S3_KEY'),
        'secret' => env('S3_SECRET'),
        'region' => env('S3_REGION'),
        'bucket' => env('S3_BUCKET'),
        'http' => ['verify' => false],
    ],
    'region' => env('S3_REGION'),
    'version' => 'latest',

];

 	