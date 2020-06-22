<?php

return [
    'admin/update/([0-9]+)' => 'admin/update/$1',
    'user/logout' => 'user/logout',
    'user/login' => 'user/login',
    'user/task' => 'user/task',
    'admin/page-([0-9]+)' => 'admin/index/$1',
    'admin' => 'admin/index',
    'page-([0-9]+)' => 'site/index/$1',
    '' => 'site/index',
];
