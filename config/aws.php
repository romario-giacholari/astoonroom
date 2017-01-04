<?php

use Aws\Laravel\AwsServiceProvider;


return [
    'credentials' => [
        
        'key'    => 'AWS_KEY',
        'secret' => 'AWS_SECRET',
        'region' => 'eu-west-2',
        'bucket' => 'aston-room',
        'version' => 'latest',
    ],

    'http' => [

    	'verify' => public_path('cert-WHHFSCVB6SMXPOJLDFK26TPOTNWSZAU3.pem')

    	],

];

 	