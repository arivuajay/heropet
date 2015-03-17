<?php

return array(
    'gii' => 'gii',
    'gii/<controller:\w+>' => 'gii/<controller>',
    'gii/<controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',
    '<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    'login'=>'/admin/users/login',
    'page/<name>-<id:\d+>.html'=>'cms/node/page', // clean URLs for pages
);
