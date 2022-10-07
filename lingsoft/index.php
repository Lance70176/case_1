<?php
/**
 * Created by PhpStorm.
 * User: wali9
 * Date: 2022/5/27
 * Time: 15:16
 */

define("DS", DIRECTORY_SEPARATOR);
$config = require("config.php");
$configWEB = require("config_web.php");
require "./tools/DB.php";
require "./tools/Cache.php";
require "./tools/funs.php";
require "./tools/safe.php";

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '1';
$id = intval(decodeURL($id, $configWEB));
$foreceKey = isset($_REQUEST['kw']) && !empty($_REQUEST['kw']) ? $_REQUEST['kw'] : '';

$md5 = md5($id);
$cachePath = DS . 'cache' . DS . substr($md5, 0, 2) . DS . substr($md5, 2, 2) . DS;
$file_path_name_full = ($foreceKey == '') ? ($config['path_base'] . $cachePath . $id . '.html') : ($config['path_base'] . $cachePath . $id . "_" . md5($foreceKey) . '.html');
$file_path_name_some = $cachePath . $id . '.html';

$cacheOBJ = new Cache($configWEB['CacheTime'], $file_path_name_full);
$cacheOBJ->cacheCheck();

$db = new DB($config['db']);

$keyword = $db->simple_row('game_keyword', "gid={$id}");
if (empty($keyword)) {
    fun404();
}

$detail = $db->simple_row('game_details', "gid={$id}");
if (empty($detail)) {
    $rand_details = getRandDataTable($db, 'game_details', 12);
    $rrand = mt_rand(0, count($rand_details) - 1);
    $detail = $rand_details[$rrand];
}
$detail['details'] = str_replace("/lingsoft", "./", $detail['details']);

$rand_Good = getRandDataTable($db, 'game_good', 12);
$rand_Good_url = getRandDataTable($db, 'game_keyword', 12);
$rand_Good_page2 = getRandDataTable($db, 'game_good', 12);
$rand_Good_page2_url = getRandDataTable($db, 'game_keyword', 12);

$rand_imgs = getRandDataTable($db, 'game_imgs', mt_rand(2, 5));

$rand_kwcontent_arr_size = 3;
$rand_kwcontent_arr = getRandDataTable($db, 'game_content', $rand_kwcontent_arr_size, " and kword_flag=1 and type_id={$keyword['type_id']} ");
if (empty($rand_kwcontent_arr) || count($rand_kwcontent_arr) < $rand_kwcontent_arr_size) {
    $rand_kwcontent_arr = getRandDataTable($db, 'game_content', $rand_kwcontent_arr_size, " and kword_flag=1 ");
}

$rand_randkw_content1_arr_size = 20;
$rand_randkw_content1_arr = getRandDataTable($db, 'game_content', $rand_randkw_content1_arr_size, " and kword_flag=0  and type_id={$keyword['type_id']} ");
if (empty($rand_randkw_content1_arr) || count($rand_randkw_content1_arr) < $rand_randkw_content1_arr_size) {
    $rand_randkw_content1_arr = getRandDataTable($db, 'game_content', $rand_randkw_content1_arr_size, " and kword_flag=0 ");
}
$rand_rand_keyword = getRandDataTable($db, 'game_keyword', 100);

foreach ($rand_kwcontent_arr as &$item) {
    $item['content'] = str_replace("{tag:keyword}", $keyword['kword'], $item['content']);
    $rand_tmp = mt_rand(0, 99);
    $item['content'] = str_replace("{tag:rand_keyword}", $rand_rand_keyword[$rand_tmp]['kword'], $item['content']);
}
foreach ($rand_randkw_content1_arr as &$item) {
    $item['content'] = str_replace("{tag:keyword}", $keyword['kword'], $item['content']);
    $rand_tmp = mt_rand(0, 99);
    $item['content'] = str_replace("{tag:rand_keyword}", $rand_rand_keyword[$rand_tmp]['kword'], $item['content']);
}

$msgNum = mt_rand(3, 8);
$rand_headimg = getRandDataTable($db, 'game_headimg', $msgNum);
$rand_msg = getRandDataTable($db, 'game_msg', $msgNum);
$rand_nickname = getRandDataTable($db, 'game_nickname', $msgNum);
$msg_datas = [];
$time = time();

for ($i = 0; $i < $msgNum; $i++) {
    $rand_tmp = mt_rand(0, 99);
    $msg_datas[$i] = [
        'headimg' => $rand_headimg[$i]['img'],
        'msg' => str_replace("{tag:rand_keyword}", $rand_rand_keyword[$rand_tmp]['kword'], $rand_msg[$i]['msg']),
        'nickname' => $rand_nickname[$i]['nickname'],
        'time' => date("Y-m-d H:i:s", $time),
    ];
    $time -= (mt_rand(1, 10) * 86400 - mt_rand(100, 80300));
}

$rtime = time() - rand(1, 90) * 86400;
$pacInfo = [
    'size' => mt_rand(100, 1000) / 10,
    'downcount' => mt_rand(100, 90000),
    'time' => date("Y-m-d", $rtime),
    'version' => mt_rand(1, 8) . "." . mt_rand(0, 10) . "." . mt_rand(0, 20),
];

if (!empty($foreceKey)) {
    //强制传了kw时，用这个关键字替换
    $keyword['kword'] = $foreceKey;
}

include "./temples/{$configWEB['TempleName']}";

$cacheOBJ->caching($file_path_name_full);


















