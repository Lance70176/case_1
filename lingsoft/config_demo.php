<?php
/**
 * Created by PhpStorm.
 * User: wali9
 * Date: 2022/5/23
 * Time: 19:07
 */

return [
    'db' => [
        'host' => '127.0.0.1',
        'port' => '53306',
        'user' => 'root',
        'password' => 'root',
        'database' => 'gamecollect',
    ],
    'path_base' => dirname(__FILE__),
    'path_tablecache' => dirname(__FILE__) . DS . "tablecache",
    'tables' => ['game_details', 'game_good', 'game_headimg', 'game_keyword', 'game_msg', 'game_nickname', 'collect'],
];