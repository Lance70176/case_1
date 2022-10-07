<?php
/**
 * Created by PhpStorm.
 * User: wali9
 * Date: 2022/5/23
 * Time: 19:03
 */

function mcurlGame($url)
{
    $allheader = [
        "user-agent: Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1",
        "content-type: application/x-www-form-urlencoded",
        "origin: http://www.0430.com",
        "referer: http://www.0430.com/",
        "accept-language: zh-CN,zh-TW;q=0.9,zh;q=0.8,en;q=0.7",
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);          //单位 秒，也可以使用
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $allheader);

    $response = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    curl_close($ch);

    $return = [
        'code' => $code,
        'html' => $response,
        'err' => $err,
    ];

    return $return;
}


/**curl下载文件
 * url 地址
 * savePath 保存目录
 * filename 文件名
 */
function downFile($url, $savePath = './', $filename = '')
{
    //$url = 'http://www.baidu.com/img/bdlogo.png';
    /*
    HTTP/1.1 200 OK
    Connection: close
    Content-Type: image/jpeg
    Content-disposition: attachment; filename="cK4q4fLsp7YOlaqxluDOafB.jpg"
    Date: Sun, 18 Jan 2015 16:56:32 GMT
    Cache-Control: no-cache, must-revalidate
    Content-Length: 963704
    */

    $allheader = [
        "Accept: image/avif,image/webp,image/apng,image/svg+xml,image/*,*/*;q=0.8",
        "Accept-Encoding: gzip, deflate",
        "Accept-Language: zh-CN,zh-TW;q=0.9,zh;q=0.8,en;q=0.7",
        "Connection: keep-alive",
        "Cookie: t=ad9844b810161088adb53951261892b5; r=6655; pinshan_article_up_time_692521=2022-06-16; Hm_lvt_91ffd741a8b422d5ff00f64f715b2623=1654236276; security_session_verify=b04a105c12008680586ea2e62f64f41f; Hm_lvt_4fa5a176251876b26c1a304102b02081=1654168312,1654230130,1654315733,1655547048; Hm_lpvt_4fa5a176251876b26c1a304102b02081=1655547048; Hm_lvt_7b2dbd90bf9a08dea30ff78bbcaaa67b=1654168312,1654230130,1654315733,1655547048; Hm_lpvt_7b2dbd90bf9a08dea30ff78bbcaaa67b=1655547048",
        "Host: m.pinshan.com",
        "Referer: https://m.pinshan.com/pssoft/692521.html",
        "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1",
    ];

    $ch = curl_init();
    if (stripos($url, "https://") !== FALSE) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    }

    curl_setopt($ch, CURLOPT_HTTPHEADER, $allheader);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);  //需要response header
    curl_setopt($ch, CURLOPT_NOBODY, FALSE);  //需要response body
    $response = curl_exec($ch);
    //分离header与body
    $header = '';
    $body = '';
    if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == '200') {
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE); //头信息size
        $header = substr($response, 0, $headerSize);
        $body = substr($response, $headerSize);
    }
    curl_close($ch);
    // print_r($header);die;
    //文件名
    $arr = array();
    if (!$filename) {
        preg_match('#filename="(.*?)"#', $header, $arr);
        $filename = $arr[1];
    }
    $fullName = rtrim($savePath, '/') . '/' . $filename;

    //判断目录是否存在|创建目录
    $basePath = dirname($fullName);
    if (!file_exists($basePath)) {
        mkdir($basePath, 0777, true);
    }

    if (file_put_contents($fullName, $body)) {
        return $fullName;
    }

    return false;
}


function PathCreate($path, $model = '0777')
{
    if (is_dir($path)) {
        return true;
    }
    return mkdir($path, 0777, true);
}

//是否数字字符
function isNumber($char)
{
    $tmpMa = ord($char);
    if ($tmpMa >= 48 && $tmpMa <= 57) {
        return 1;
    } else {
        return 0;
    }
}

//是否字母字符
function isChar($char)
{
    $tmpMa = ord($char);
    if (($tmpMa >= 65 && $tmpMa <= 90) || ($tmpMa >= 97 && $tmpMa <= 122)) {
        return 1;
    } else {
        return 0;
    }

}

function geturlNum($string)
{
    $retstring = '';
    $len = strlen($string);
    for ($i = 0; $i < $len; $i++) {
        if (isNumber($string[$i])) {
            $retstring .= $string[$i];
        }
    }
    return $retstring;
}

//cli 模式下输出调试文字
function cmd_msg($msg, $time = 1)
{
    $str = ($time == 1) ? date("Y-m-d H:i:s") . " " . $msg : $msg;
    $str = $str . "\r\n";
    echo $str;
}

//解析图像地址 文件名
function paraImgPath($url)
{
    $url2 = ltrim($url, '/');
    $arr = explode("/", $url2);
    if ($arr) {
        $filename = array_pop($arr);
    } else {
        return [];
    }

    return [
        'md5' => md5(strtolower($url)),
        'url' => $url,
        'path' => implode("\\", $arr),
        'pathurl' => '/' . implode("/", $arr),
        'name' => $filename,
    ];
}

//简单输入过滤处理 $Arr可以数组，也可以是单一字符串
function MyinputFilter($Arr)
{
    if (is_array($Arr)) {
        $ret = [];
        foreach ($Arr as $key => $item) {
            $tmp = strip_tags(trim($item));
            $ret[$key] = $tmp;
        }
        return $ret;
    }

    return strip_tags(trim($Arr));

}

function fun404()
{
    header("HTTP/1.1 404 Not Found");
    header("Status: 404 Not Found");
    exit();
}

function getCountAll($db)
{
    $sql = <<<SQL
select * from  (
select 'collect' as title, count(id)  as ccount ,min(id) as minid,max(id) as maxid from   collect UNION  
select 'game_details' as title, count(id)  as ccount ,min(id) as minid,max(id) as maxid from  game_details UNION  
select 'game_good' as title, count(id)  as ccount,min(id) as minid,max(id) as maxid  from  game_good UNION  
select 'game_headimg' as title, count(id)  as ccount ,min(id) as minid,max(id) as maxid from  game_headimg UNION  
select 'game_imgs' as title, count(id)  as ccount ,min(id) as minid,max(id) as maxid from  game_imgs UNION  
select 'game_keyword' as title, count(id) as ccount ,min(id) as minid,max(id) as maxid  from  game_keyword UNION  
select 'game_msg' as title, count(id)  as ccount ,min(id) as minid,max(id) as maxid from  game_msg UNION  
select 'game_content' as title, count(id)  as ccount ,min(id) as minid,max(id) as maxid from  game_content UNION  
select 'game_nickname' as title, count(id)  as ccount ,min(id) as minid,max(id) as maxid  from game_nickname) as tmp ;
SQL;

    $ret = $db->getAll($sql);
    $kret = [];

    foreach ($ret as $item) {
        $key = $item['title'];
        $kret[$key] = [
            'count' => $item['ccount'],
            'pages' => ceil($item['ccount'] / 5000),
            'min' => $item['minid'],
            'max' => $item['maxid'],
        ];
    }
    return $kret;

}

function getCount($db, $table)
{
    $sql = "select count(id)  as ccount from   {$table} ";
    $ret = $db->getone($sql);
    if ($ret) {
        return intval($ret['ccount']);
    }
    return 0;
}

function getAllcountByCache($db, $cacheTime = 86400)
{
    $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'cache' . DS;
    $fileName = $path . 'allcount.php';
    $fexist = file_exists($fileName);
    if ($fexist && (time() - filemtime($fileName) <= $cacheTime)) {
        $content = file_get_contents($fileName);
        $ret = json_decode($content, true);
        if ($ret) {
            return $ret;
        }
    }

    $ret = getCountAll($db);
    file_put_contents($fileName, json_encode($ret));
    return $ret;
}

//取得某个表的随机数据
function getRandDataTable($db, $table, $size, $where = '')
{
    $row = getRandDataTableV2($db, $table, 2000, $where);
    $ccount = count($row);
    if (empty($row)) {
        return [];
    }
    if (count($row) < $size) {
        $size = $ccount;
    }
    $rk = array_rand($row, intval($size));
    $ret = [];
    foreach ($rk as $key) {
        $ret[] = $row[$key];
    }
    return $ret;
}

function makeRandID($beginID, $endID, $total = 1000)
{
    $ret = [];
    $i = 0;
    if ($endID - $beginID <= $total) {
        $total = $endID - $beginID;
    }
    while (true) {
        $rand = mt_rand($beginID, $endID);
        if (in_array($rand, $ret)) {
            continue;
        } else {
            $i++;
            $ret[] = $rand;
        }
        if ($i >= $total) {
            break;
        }
    }
    return $ret;
}

//取得某个表的随机数据
function getRandDataTableV2($db, $table, $size, $where = '')
{
    $allPageInfo = getAllcountByCache($db);
    if (!isset($allPageInfo[$table])) {
        return [];
    }
    $min = $allPageInfo[$table]['min'];
    $max = $allPageInfo[$table]['max'];

    $randArr = makeRandID($min, $max, $size);
    $randArrString = implode(",", $randArr);

    $sql = "select * from {$table} where  id in ($randArrString) {$where} ";
    $ret = $db->getAll($sql);

    return $ret;
}

function array_vale_key($map)
{
    $ret = [];
    foreach ($map as $key => $val) {
        $ret[$val] = $key;
    }
    return $ret;
}

//根据不同模式，生成不同的地址格式，  mode==5 为混合模式
function makeURL($id, $config)
{
    if ($config['url_type'] == 5) {
        $config['url_type'] = mt_rand(1, 4);
    }

    if ($config['url_type'] == 1 || $config['url_type'] == 2) {
        $num = $id + $config['initBeginNum'];
        if ($config['url_type'] == 1) {
            return $num . ".html";
        } else {
            return $num;
        }
    } elseif ($config['url_type'] == 3 || $config['url_type'] == 4) {
        $len = strlen($id);
        $id = strval($id);
        $keys = $config['numCharMap'];
        $num = '';
        for ($i = 0; $i < $len; $i++) {
            $num .= $keys[$id[$i]];
        }
        if ($config['url_type'] == 3) {
            return $num . ".html";
        } else {
            return $num;
        }
    }
    return $id;
}

//根据不同模式，解析地址为数据库记录ＩＤ，
function decodeURL($id, $config = [])
{
    if ($config['url_type'] == 5) {
        $frist = substr(strval($id), 0, 1);
        if (isNumber($frist)) {
            $config['url_type'] = 1;
        } else {
            $config['url_type'] = 3;
        }
    }

    if ($config['url_type'] == 1 || $config['url_type'] == 2) {
        $num = intval($id) - $config['initBeginNum'];
        return intval($num);
    } elseif ($config['url_type'] == 3 || $config['url_type'] == 4) {
        $keys = array_vale_key($config['numCharMap']);
        $len = strlen($id);
        $num = '';
        for ($i = 0; $i < $len; $i++) {
            if (!isset($keys[$id[$i]])) {
                $num .= '0';
            } else {
                $num .= $keys[$id[$i]];
            }
        }
        return intval($num);
    }

    return $id;
}


