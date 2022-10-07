<?php
/**
 * Created by PhpStorm.
 * User: wali9
 * Date: 2022/5/23
 * Time: 19:07
 */

/*
 *URL模式 #   {@num}.html,  /{@num},    {@zimu}.html, /{@zimu} 。
 *              1           2           3               4
 * */

return [
    'url_type' => 4,
    'initBeginNum' => 8000000,
    'numCharMap' => [
        '0' => 'A',
        '1' => 'B',
        '2' => 'C',
        '3' => 'D',
        '4' => 'E',
        '5' => 'F',
        '6' => 'G',
        '7' => 'H',
        '8' => 'I',
        '9' => 'J',
    ],
    'TempleName' => 'temple.html',
    'CacheTime' => 86400,
];