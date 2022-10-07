<?php
/**
 * Created by PhpStorm.
 * User: wali9
 * Date: 2022/5/27
 * Time: 18:07
 */

set_time_limit(600);

define("DS", DIRECTORY_SEPARATOR);
$config = require("config.php");
require "./tools/DB.php";
require "./tools/Cache.php";
require "./tools/funs.php";

//$spass = 'Ymdp4as@s8736lkj';
$key = isset($_REQUEST['key']) ? $_REQUEST['key'] : '';
if (empty($key) || md5(md5($key)) !== 'a5f6855648a5226f1af768cb98b30d63') {
    fun404();
}
$db = new DB($config['db']);

$allcount = getAllcountByCache($db, 0);

echo "缓存生成完成！";
