<?php

/**
 * Created by PhpStorm.
 * User: wali9
 * Date: 2022/5/23
 * Time: 18:57
 */
class DB
{
    protected $_host;
    protected $_port;
    protected $_username;
    protected $_passwd;
    protected $_db;

    protected $_connected = false;
    protected $_connectTime = 0;
    protected $_mysqli = null;

    public function __construct($cfg)
    {
        $this->_host = $cfg['host'];
        $this->_port = $cfg['port'];
        $this->_username = $cfg['user'];
        $this->_passwd = $cfg['password'];
        $this->_db = $cfg['database'];
    }

    public function connect()
    {
        if ($this->_connected) {
            return true;
        }

        $this->_connected = true;
        $this->_connectTime = time();
        for ($try = 1; $try <= 2; $try++) {
            $this->_mysqli = @mysqli_connect($this->_host, $this->_username, $this->_passwd, $this->_db, $this->_port);
            if ($this->_mysqli && $this->_mysqli->connect_errno == 0) {
                $this->_mysqli->query("set names utf8;");
                $connected = true;
                break;
            } else {
                $connected = false;
                $errinfo = $this->_mysqli ? $this->_mysqli->connect_error : '连接失败!';
                $this->_logError("connect({$try}):" . $errinfo);
            }
        }
        return ($this->_connected = $connected);
    }

    public function query($query)
    {
        try {
            $result = false;
            if ($this->connect()) {
                if (!$result = $this->_mysqli->query($query)) {
                    return $this->_logError('query error', $query);
                }
            }
            return $result;
        } catch (Exception $e) {
            return $this->_logError('query error:' . $e->getCode() . ',' . $e->getMessage(), $query);
        }
    }

    public function getOne($query, $type = MYSQLI_ASSOC)
    {
        $result = $this->query($query);
        return $this->fetchArray($result, $type);
    }

    public function getRow($query, $type = MYSQLI_ASSOC)
    {
        $result = $this->query($query);
        return $this->fetchArray($result, $type);
    }

    public function getAll($query, $type = MYSQLI_ASSOC)
    {
        $result = $this->query($query);
        $rows = [];
        while ($row = $this->fetchArray($result, $type)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function fetchArray($result, $type = MYSQLI_ASSOC)
    {
        return $this->_connected && $result && ($row = $result->fetch_array($type)) ? $row : [];
    }

    public function insertId()
    {
        return $this->_connected ? $this->_mysqli->insert_id : false;
    }

    public function affectedRows()
    {
        return $this->_connected ? $this->_mysqli->affected_rows : false;
    }

    public function simple_row($table, $whereString = "", $fields = "*", $debug = 0)
    {
        $whereString = trim($whereString);
        $sql = "select {$fields}  from  {$table}  ";
        if ($whereString != "") {
            $sql .= " where {$whereString} ";
        }
        if ($debug) {
            cmd_msg($sql);
        }
        return $this->getOne($sql);
    }

    public function simple_rows($table, $whereString = "", $fields = "*")
    {
        $whereString = trim($whereString);
        $sql = "select {$fields}  from  {$table}  ";
        if ($whereString != "") {
            $sql .= " where {$whereString} ";
        }
        return $this->getAll($sql);
    }

    //通用插入单条记录
    public function InsertArray($arr, $table, $debug = 0)
    {
        $sql = "insert into `{$table}` ";
        foreach ($arr as $key => $val) {
            $karr[] = "`{$key}`";
            if (is_string($val)) {
                $varr[] = "\"{$val}\"";
            } else {
                $varr[] = "{$val}";
            }
        }
        $kstring = implode(",", $karr);
        $vstring = implode(",", $varr);
        $sql .= "({$kstring}) values($vstring) ";

        if ($debug == 1) {
            cmd_msg($sql);
        }

        $ret = $this->query($sql);
        if ($ret) {
            $id = $this->insertId();
            return $id;
        }
        return false;
    }

    //更新记录  key val模式
    public function UpdateArr($dataArr, $whereString, $table)
    {
        $arrD = [];
        foreach ($dataArr as $key => $val) {
            if (is_numeric($val) || is_float($val)) {
                $arrD[] = " `{$key}`={$val} ";
            } else {
                $arrD[] = " `{$key}`= \"{$val}\" ";
            }
        }
        $upString = implode(",", $arrD);
        $table = "`{$table}`";

        if (empty($whereString)) {
            $sql = 'update ' . $table . ' set ' . $upString;
        } else {
            $sql = 'update ' . $table . ' set ' . $upString . ' where ' . $whereString;
        }
        $ret = $this->query($sql);
        if ($ret) {
            $rows = $this->affectedRows();
            return $rows;
        }
        return false;
    }

    public function getMultiResult($query)
    {
        $this->connect();
        if (!$this->_connected) return false;
        $ret = [];
        if ($this->_mysqli->real_query($query)) {
            do {
                if ($result = $this->_mysqli->store_result()) {
                    while ($row = $result->fetch_assoc()) {
                        array_push($ret, $row);
                    }
                }
            } while ($this->_mysqli->more_results() && $this->_mysqli->next_result());
        }
        return $ret;
    }

    public function ping()
    {
        return $this->_connected && $this->_mysqli->ping();
    }

    public function errno()
    {
        return $this->_connected ? $this->_mysqli->errno : 0;
    }

    public function error()
    {
        return $this->_connected ? $this->_mysqli->error : '';
    }

    public function close()
    {
        return $this->_connected && (($this->_connected = false) || $this->_mysqli->close());
    }

    public function escape($str)
    {
        return $str && $this->connect() ? $this->_mysqli->real_escape_string($str) : '';
    }

    protected function _logError($data, $query = null)
    {

        if ($query && ($this->errno() == 2006) && ($this->_connectTime < time() - 30)) { //重试
            $this->close();
            $this->_connected = false;

            $data = date("Y-m-d H:i:s") . " DB Reconnect: " . $data . ' -- ' . $query . " \r\n";
            // (new Logs(20, "bak"))->error($data, 'dberror.txt');

            return $this->query($query);
        }

        $data = [$data, $this->_host, $this->_port, $query, $this->error(), $_SERVER['PHP_SELF']];
        //(new Logs(20, "bak"))->error($data, 'dberror.txt');
        //die('MySQLi Error');
    }

    public function __destruct()
    {
        if ($this->_connected && $this->_mysqli) {
            mysqli_close($this->_mysqli);
        }
    }
}
