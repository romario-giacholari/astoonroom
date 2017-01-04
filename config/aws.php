<?php

use Aws\Laravel\AwsServiceProvider;


return [
    'credentials' => [
        
        'key'    => getenv('S3_KEY'),
        'secret' => getenv('S3_SECRET'),
        'region' => getenv('S3_REGION'),
        'bucket' => getenv('S3_BUCKET'),
        'version' => 'latest',
    ],

    'http' => [

    	'verify' => public_path('cert-WHHFSCVB6SMXPOJLDFK26TPOTNWSZAU3.pem')

    	],

];

 	