<?php

/*
* 缓存类 cache
*/

class cache
{
    //缓存目录
    var $cacheRoot = "./cache/";
    //缓存更新时间秒数，0为不缓存
    var $cacheLimitTime = 0;
    //缓存文件名
    var $cacheFileName = "";
    //缓存扩展名
    var $cacheFileExt = "php";


    public function __construct($cacheLimitTime, $fileName = '')
    {
        if (intval($cacheLimitTime))
            $this->cacheLimitTime = $cacheLimitTime;
        if (empty($fileName)) {
            $this->cacheFileName = $this->getCacheFileName();
        } else {
            $this->cacheFileName = $fileName;
        }
        ob_start();
    }

    /*
      * 构造函数
      * int $cacheLimitTime 缓存更新时间
      */
    function cache($cacheLimitTime, $fileName = '')
    {
        if (intval($cacheLimitTime))
            $this->cacheLimitTime = $cacheLimitTime;
        if (empty($fileName)) {
            $this->cacheFileName = $this->getCacheFileName();
        } else {
            $this->cacheFileName = $fileName;
        }
        ob_start();
    }

    /*
      * 检查缓存文件是否在设置更新时间之内
      * 返回：如果在更新时间之内则返回文件内容，反之则返回失败
      */
    function cacheCheck()
    {
        if (file_exists($this->cacheFileName)) {
            $cTime = $this->getFileCreateTime($this->cacheFileName);
            if ($cTime + $this->cacheLimitTime > time()) {
                echo file_get_contents($this->cacheFileName);
                ob_end_flush();
                exit;
            }
        }
        return false;
    }

    /*
      * 缓存文件或者输出静态
      * string $staticFileName 静态文件名（含相对路径）
      */
    function caching($staticFileName = "")
    {
        if ($this->cacheFileName) {
            $cacheContent = ob_get_contents();
            ob_end_flush();
            if ($staticFileName) {
                $this->saveFile($staticFileName, $cacheContent);
            }
            if ($this->cacheLimitTime)
                $this->saveFile($this->cacheFileName, $cacheContent);
        }
    }

    /*
      * 清除缓存文件
      * string $fileName 指定文件名(含函数)或者all（全部）
      * 返回：清除成功返回true，反之返回false
      */
    function clearCache($fileName = "all")
    {
        if ($fileName != "all") {
            $fileName = $this->cacheRoot . strtoupper(md5($fileName)) . "." . $this->cacheFileExt;
            if (file_exists($fileName)) {
                return @unlink($fileName);
            } else return false;
        }
        if (is_dir($this->cacheRoot)) {
            if ($dir = @opendir($this->cacheRoot)) {
                while ($file = @readdir($dir)) {
                    $check = is_dir($file);
                    if (!$check)
                        @unlink($this->cacheRoot . $file);
                }
                @closedir($dir);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /*根据当前动态文件生成缓存文件名*/
    function getCacheFileName()
    {
        return $this->cacheRoot . strtoupper(md5($_SERVER["REQUEST_URI"])) . "." . $this->cacheFileExt;
    }

    /*
      * 缓存文件建立时间
      * string $fileName 缓存文件名（含相对路径）
      * 返回：文件生成时间秒数，文件不存在返回0
      */
    function getFileCreateTime($fileName)
    {
        if (!trim($fileName)) return 0;
        if (file_exists($fileName)) {
            return intval(filemtime($fileName));
        } else return 0;
    }

    function getFile($fileName)
    {
        if (!file_exists($fileName)) {
            return [];
        }
        $cacheTime = $this->getFileCreateTime($fileName);
        if (!$cacheTime) {
            return '';
        }
        if ($cacheTime > $this->cacheLimitTime) {
            return '';
        }

        $html = file_get_contents($fileName);
        return $html;
    }

    /*
      * 保存文件
      * string $fileName 文件名（含相对路径）
      * string $text 文件内容
      * 返回：成功返回ture，失败返回false
      */
    function saveFile($fileName, $text)
    {
        if (!$fileName || !$text) return false;
        if ($this->makeDir(dirname($fileName))) {
            if ($fp = fopen($fileName, "w")) {
                if (@fwrite($fp, $text)) {
                    fclose($fp);
                    return true;
                } else {
                    fclose($fp);
                    return false;
                }
            }
        }
        return false;
    }

    /*
      * 连续建目录
      * string $dir 目录字符串
      * int $mode 权限数字
      * 返回：顺利创建或者全部已建返回true，其它方式返回false
      */
    function makeDir($dir, $mode = "0777")
    {
        if (!$dir) return 0;
        $dir = str_replace("\\", "/", $dir);
        $mdir = "";
        foreach (explode("/", $dir) as $val) {
            $mdir .= $val . "/";
            if ($val == ".." || $val == "." || trim($val) == "") continue;
            if (!file_exists($mdir)) {
                if (!@mkdir($mdir, $mode)) {
                    return false;
                }
            }
        }
        return true;
    }
}

?>