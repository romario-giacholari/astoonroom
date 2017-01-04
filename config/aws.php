<?php

use Aws\Laravel\AwsServiceProvider;


return [
    'credentials' => [
        
        'key'    => getenv('S3_KEY'),
        'secret' => getenv('S3_SECRET'),
        'region' => 'eu-west-2',
        'bucket' => 'aston-room',
        'version' => 'latest',
    ],

    'http' => [

    	'verify' => public_path('cert-WHHFSCVB6SMXPOJLDFK26TPOTNWSZAU3.pem')

    	],

];

 	