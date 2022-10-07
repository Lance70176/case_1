<?php
/**
 * Created by PhpStorm.
 * User: wali9
 * Date: 2022/5/23
 * Time: 18:58
 */

/**
 * 日志类
 * 普通日志
 * oo::logs()->debug(array('afdf', true, false), 'act134');
 *
 * 系统日志
 * oo::logs()->info(array('afdf', true, false), 'sys');
 *
 * 普通日志会生成到data/logs/
 * 系统日志会根据日志级别存放在 data/syslogs/info/
 */

class Logs
{
    const DEBUG = 0;
    const INFO = 1;
    const NOTICE = 2;
    const WARNING = 3;
    const ERROR = 4;

    /**
     * 日志级别映射表
     * @var array
     */
    public static $levels = array(
        self::DEBUG => 'DEBUG',
        self::INFO => 'INFO',
        self::NOTICE => 'NOTICE',
        self::WARNING => 'WARNING',
        self::ERROR => 'ERROR',
    );

    /**
     * 文件大小
     * @var int
     */
    protected $filesize;
    protected $isupdlog;  //自动备份


    public function __construct($fsize = 2, $isudplog = false)
    {
        $this->filesize = $fsize * 1048576; //2M
        $this->isupdlog = $isudplog;
    }

    /**
     * 写一条日志.
     *
     * @param  integer $level 日志级别
     * @param  array $params 消息
     * @param  string $fname 文件名
     * @return Boolean
     */
    protected function write($level, $params, $fname)
    {
        if (!($params = $this->format($level, $params))) {
            return false;
        }
        // $dir = PATH_DAT.(isset(self::$levels[$level]) ? '/syslogs/'.strtolower(self::$levels[$level]).'/' : '/logs/');
        $dir = ROOT . DS . 'logs' . DS;
        clearstatcache();
        $file = $dir . $fname . '.php';
        $dir = dirname($file);
        if (!is_dir($dir)) mkdir($dir, 0775, true);
        $size = file_exists($file) ? @filesize($file) : 0;
        if (!($flag = $size < $this->filesize) && $this->isupdlog === 'bak') {//文件超过大小自动备份
            $bak = $dir . '/bak/';
            if (!is_dir($bak)) mkdir($bak, 0775, true);
            $fname = explode('/', $fname);
            $fname = $fname[count($fname) - 1];
            $bak .= $fname . '-' . date('YmdHis') . '.php';
            copy($file, $bak);
            unlink($file);
        }
        $prefix = $size && $flag ? '' : "<?php (isset(\$_GET['p']) && (md5('&%$#'.\$_GET['p'].'**^')==='8b1b0c76f5190f98b1110e8fc4902bfa')) or die();?>\n"; //有文件内容并且非附加写
        @file_put_contents($file, $prefix . $params, $flag ? FILE_APPEND : null);
    }

    protected function writeBatch($level, $params, $fname)
    {
        if (empty($params)) {
            return false;
        }
        if (!is_array($params)) {
            $params = [$params];
        }

        $dir = ROOT . DS . 'logs' . DS;
        clearstatcache();
        $file = $dir . $fname . '.php';
        $dir = dirname($file);
        if (!is_dir($dir)) mkdir($dir, 0775, true);
        $size = file_exists($file) ? @filesize($file) : 0;
        if (!($flag = $size < $this->filesize) && $this->isupdlog === 'bak') {//文件超过大小自动备份
            $bak = $dir . '/bak/';
            if (!is_dir($bak)) mkdir($bak, 0775, true);
            $fname = explode('/', $fname);
            $fname = $fname[count($fname) - 1];
            $bak .= $fname . '-' . date('YmdHis') . '.php';
            copy($file, $bak);
            unlink($file);
        }

        $prefix = $size && $flag ? '' : "<?php (isset(\$_GET['p']) && (md5('&%$#'.\$_GET['p'].'**^')==='8b1b0c76f5190f98b1110e8fc4902bfa')) or die();?>\n"; //有文件内容并且非附加写

        $strArr = [];
        foreach ($params as $item) {
            $tmpcont = $this->format($level, $item);
            $strArr[] = $tmpcont;
        }
        $str = implode("", $strArr);
        @file_put_contents($file, $prefix . $str, $flag ? FILE_APPEND : null);

    }


    /**
     *
     * @param int $level 日志级别
     * @param mixed $logs 消息
     * @return string
     */
    protected function format($level, $logs)
    {
        $prefix = date('Y-m-d H:i:s') . ' ' . self::$levels[$level] . ' |';
        is_scalar($logs) or ($logs = var_export($logs, true));
        return "{$prefix}{$logs}\r\n";
    }

    /**
     * 写记录
     * @param String /Array $params 要记录的数据
     * @param String $fname 文件名.该记录会保存到 data/logs/ 目录下
     * @return null
     */
    public function debug($params, $fname = 'debug.txt')
    {
        if (is_array($params)) {
            return $this->writeBatch(0, $params, $fname);
        } else {
            return $this->write(0, $params, $fname);
        }

    }

    /**
     * INFO level.
     *
     * @param  string $message 消息
     * @param String $fname 文件名.该记录会保存到 data/syslogs/ 目录下
     * @return Boolean
     */
    public function info($message, $fname = 'log_info')
    {
        if (is_array($message)) {
            return $this->writeBatch(static::INFO, $message, $fname);
        } else {
            return $this->write(static::INFO, $message, $fname);
        }
    }

    /**
     * NOTICE level.
     *
     * @param  string $message 消息
     * @param String $fname 文件名.该记录会保存到 data/syslogs/ 目录下
     * @return Boolean
     */
    public function notice($message, $fname = 'log_info')
    {
        if (is_array($message)) {
            return $this->writeBatch(static::NOTICE, $message, $fname);
        } else {
            return $this->write(static::NOTICE, $message, $fname);
        }

    }

    /**
     * WARNING level.
     *
     * @param  string $message 消息
     * @param String $fname 文件名.该记录会保存到 data/syslogs/ 目录下
     * @return Boolean
     */
    public function warning($message, $fname = 'log_info')
    {
        if (is_array($message)) {
            return $this->writeBatch(static::WARNING, $message, $fname);
        } else {
            return $this->write(static::WARNING, $message, $fname);
        }

    }

    /**
     * ERROR level.
     *
     * @param  string $message 消息
     * @param String $fname 文件名.该记录会保存到 data/syslogs/ 目录下
     * @return Boolean
     */
    public function error($message, $fname = 'log_info')
    {
        if (is_array($message)) {
            return $this->writeBatch(static::ERROR, $message, $fname);
        } else {
            return $this->write(static::ERROR, $message, $fname);
        }
    }

}
