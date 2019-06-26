<?php


class DBPDO
{
    protected static $_instance = null;
    protected $dbName = '';
    protected $dsn;
    protected $dbh;

    /**
     * 构造
     * 
     * @return DBPDO
     */
    private function __construct($config)
    {
        try {
            $this->dsn = "mysql:host=" . $config['dbhost'] . ";dbname=" . $config['dbname'] . ";port=" . $config['dbport'] . ";charset=" . $config['charset'];
            // $this->dsn = 'mysql:host=127.0.0.1;dbname=dbname;port=3306';
            $this->dbh = new PDO($this->dsn, $config['dbuser'], $config['dbpass']);
            $this->dbh->exec('SET character_set_connection=' . $config['charset'] . ', character_set_results=' . $config['charset'] . ', character_set_client=binary');
        } catch (PDOException $e) {
            $this->outputError($e->getMessage());
        }
    }

    /**
     * 防止克隆
     * 
     */
    private function __clone()
    { }

    /**
     * Singleton instance
     * 
     * @return Object
     */
    public static function getInstance($dbConf)
    {
        if (self::$_instance === null) {
            self::$_instance = new self($dbConf);
        }
        return self::$_instance;
    }

    /**
     * Query
     *
     * @param String $strSql SQL语句
     * @param String $queryMode 查询方式(All or Row)
     * @param Boolean $debug
     * @return Array
     */
    public function query($strSql, $queryMode = 'All', $debug = false)
    {
        if ($debug === true) $this->debug($strSql);
        $recordset = $this->dbh->query($strSql);
        $this->getPDOError();
        if ($recordset) {
            $recordset->setFetchMode(PDO::FETCH_ASSOC);
            if ($queryMode == 'All') {
                $result = $recordset->fetchAll();
            } elseif ($queryMode == 'Row') {
                $result = $recordset->fetch();
            }
        } else {
            $result = null;
        }
        return $result;
    }

    /** select: Query all records
     *
     * @param string $sql sql语句
     * @param Array $where 查询条件
     * @return $res;
     **/
    public function select($sql, $where = '')
    {
        $stmt = $this->dbh->prepare($sql);
        if ($where) {
            $stmt->execute($where);
        } else {
            $stmt->execute();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** select all records width AND condition
     *
     * @param String $table tableName
     * @param Array $data ["key_a" => "1111", "key_b" => "2222"]
     * @return Array;
     **/
    public function select_and($table, $data = '')
    {
        if ($data) {
            $where_string = [];
            $where_array = [];
            foreach ($data as $key => $value) {
                $where_string[] = "`$key` = ?";
                $where_array[] = $value;
            }
            $where_string = implode(' AND ', $where_string);
            $sql = "SELECT * FROM `$table` WHERE $where_string";
            return $this->select($sql, $where_array);
        } else {
            return $this->select("SELECT * FROM `$table`");
        }
    }

    /** find: Query a single record
     *
     * @param string $sql sql语句
     * @param Array $where 查询条件
     * @return $res;
     **/
    public function find($sql, $where = [])
    {
        $stmt = $this->dbh->prepare($sql);
        if ($where) {
            $stmt->execute($where);
        } else {
            $stmt->execute();
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /** find records width width AND condition
     *
     * @param String $table tableName
     * @param Array $data ["key_a" => "1111", "key_b" => "2222"]
     * @return Array;
     **/
    public function find_and($table, $data = [])
    {
        if ($data) {
            $where_string = [];
            $where_array = [];
            foreach ($data as $key => $value) {
                $where_string[] = "`$key` = ?";
                $where_array[] = $value;
            }
            $where_string = implode(' AND ', $where_string);
            $sql = "SELECT * FROM `$table` WHERE $where_string";
            return $this->find($sql, $where_array);
        } else {
            return $this->find("SELECT * FROM `$table`");
        }
    }

    /**
     * del 执行删除操作
     * @param string $sql sql语句
     * @param Array $where 查询条件
     * @return $res;
     **/
    public function del($sql, $where = '')
    {
        $stmt = $this->dbh->prepare($sql);
        if ($where) {
            $stmt->execute($where);
            $res = $stmt->rowCount();
        } else {
            $res = false;
        }
        return $res;
    }

    /**
     * add 新增记录
     * @param String $table 表名
     * @param String $sql sql语句
     * @param Array $data 新增内容
     * @return $res;
     **/
    public function add($table, $data = '')
    {

        $this->checkFields($table, $data);
        $sql = "INSERT INTO `$table` (" . implode(',', array_keys($data)) . ") VALUES (:" . implode(',:', array_keys($data)) . ")";
        $stmt = $this->dbh->prepare($sql); // 预处理语句
        $ret = $stmt->execute($data); // 新增的数据
        $id = $this->dbh->lastInsertId(); // 新增的id
        if ($ret) {
            $res = $id;
        } else {
            $res = false;
        }
        return $res;
    }

    /**
     * save 修改记录
     * @param string $sql sql语句
     * @param Array $data 
     * @return $res;
     **/
    public function save($table, $data = '', $where = '')
    {

        $this->checkFields($table, $data);
        if ($where) {
            $strSql = '';
            foreach ($data as $key => $value) {
                $strSql .= ",$key=:$key";
            }
            $strSql = substr($strSql, 1);
            $strSql = "UPDATE `$table` SET $strSql WHERE $where";
        } else {
            $strSql = '';
            foreach ($data as $key => $value) {
                $strSql .= ",$key=:$key";
            }
            $strSql = substr($strSql, 1);
            $strSql = "UPDATE `$table` SET $strSql ";
        }
        // if ($debug === true) $this->debug($strSql);

        $stmt = $this->dbh->prepare($strSql); //预处理语句
        $stmt->execute($data); //修改的数据
        $ret = $stmt->rowCount(); //获取影响行数
        if ($ret > 0) {
            $res = true;
        } else {
            $res = false;
        }
        return $res;
    }

    /**
     * Update 更新
     *
     * @param String $table 表名
     * @param Array $arrayDataValue 字段与值
     * @param String $where 条件
     * @param Boolean $debug
     * @return Int
     */
    public function update($table, $arrayDataValue, $where = '', $debug = false)
    {
        $this->checkFields($table, $arrayDataValue);
        if ($where) {
            $strSql = '';
            foreach ($arrayDataValue as $key => $value) {
                $strSql .= ", `$key`='$value'";
            }
            $strSql = substr($strSql, 1);
            $strSql = "UPDATE `$table` SET $strSql WHERE $where";
        } else {
            $strSql = "REPLACE INTO `$table` (`" . implode('`,`', array_keys($arrayDataValue)) . "`) VALUES ('" . implode("','", $arrayDataValue) . "')";
        }
        if ($debug === true) $this->debug($strSql);
        $result = $this->dbh->exec($strSql);
        $this->getPDOError();
        return $result;
    }

    /**
     * Insert 插入
     *
     * @param String $table 表名
     * @param Array $arrayDataValue 字段与值
     * @param Boolean $debug
     * @return Int
     */
    public function insert($table, $arrayDataValue, $debug = false)
    {
        $this->checkFields($table, $arrayDataValue);
        $strSql = "INSERT INTO `$table` (`" . implode('`,`', array_keys($arrayDataValue)) . "`) VALUES ('" . implode("','", $arrayDataValue) . "')";
        if ($debug === true) $this->debug($strSql);
        $result = $this->dbh->exec($strSql);
        $this->getPDOError();
        return $result;
    }

    /**
     * Replace 覆盖方式插入
     *
     * @param String $table 表名
     * @param Array $arrayDataValue 字段与值
     * @param Boolean $debug
     * @return Int
     */
    public function replace($table, $arrayDataValue, $debug = false)
    {
        $this->checkFields($table, $arrayDataValue);
        $strSql = "REPLACE INTO `$table`(`" . implode('`,`', array_keys($arrayDataValue)) . "`) VALUES ('" . implode("','", $arrayDataValue) . "')";
        if ($debug === true) $this->debug($strSql);
        $result = $this->dbh->exec($strSql);
        $this->getPDOError();
        return $result;
    }

    /**
     * Delete 删除
     *
     * @param String $table 表名
     * @param String $where 条件
     * @param Boolean $debug
     * @return Int
     */
    public function delete($table, $where = '', $debug = false)
    {
        if ($where == '') {
            $this->outputError("'WHERE' is Null");
        } else {
            $strSql = "DELETE FROM `$table` WHERE $where";
            if ($debug === true) $this->debug($strSql);
            $result = $this->dbh->exec($strSql);
            $this->getPDOError();
            return $result;
        }
    }

    /**
     * execSql 执行SQL语句
     *
     * @param String $strSql
     * @param Boolean $debug
     * @return Int
     */
    public function execSql($strSql, $debug = false)
    {
        if ($debug === true) $this->debug($strSql);
        $result = $this->dbh->exec($strSql);
        $this->getPDOError();
        return $result;
    }

    /**
     * 获取字段最大值
     * 
     * @param string $table 表名
     * @param string $field_name 字段名
     * @param string $where 条件
     */
    public function getMaxValue($table, $field_name, $where = '', $debug = false)
    {
        $strSql = "SELECT MAX(" . $field_name . ") AS MAX_VALUE FROM $table";
        if ($where != '') $strSql .= " WHERE $where";
        if ($debug === true) $this->debug($strSql);
        $arrTemp = $this->query($strSql, 'Row');
        $maxValue = $arrTemp["MAX_VALUE"];
        if ($maxValue == "" || $maxValue == null) {
            $maxValue = 0;
        }
        return $maxValue;
    }

    /**
     * 获取指定列的数量
     * 
     * @param string $table
     * @param string $field_name
     * @param string $where
     * @param bool $debug
     * @return int
     */
    public function getCount($table, $field_name, $where = '', $debug = false)
    {
        $strSql = "SELECT COUNT($field_name) AS NUM FROM $table";
        if ($where != '') $strSql .= " WHERE $where";
        if ($debug === true) $this->debug($strSql);
        $arrTemp = $this->query($strSql, 'Row');
        return $arrTemp['NUM'];
    }

    /**
     * 获取表引擎
     * 
     * @param String $dbName 库名
     * @param String $tableName 表名
     * @param Boolean $debug
     * @return String
     */
    public function getTableEngine($dbName, $tableName)
    {
        $strSql = "SHOW TABLE STATUS FROM $dbName WHERE Name='" . $tableName . "'";
        $arrayTableInfo = $this->query($strSql);
        $this->getPDOError();
        return $arrayTableInfo[0]['Engine'];
    }
    /**
     * beginTransaction 事务开始
     */
    public function beginTransaction()
    {
        $this->dbh->beginTransaction();
    }

    /**
     * commit 事务提交
     */
    public function commit()
    {
        $this->dbh->commit();
    }

    /**
     * rollback 事务回滚
     */
    public function rollback()
    {
        $this->dbh->rollback();
    }

    /**
     * transaction 通过事务处理多条SQL语句
     * 调用前需通过getTableEngine判断表引擎是否支持事务
     *
     * @param array $arraySql
     * @return Boolean
     */
    public function execTransaction($arraySql)
    {
        $retval = 1;
        $this->beginTransaction();
        foreach ($arraySql as $strSql) {
            if ($this->execSql($strSql) == 0) $retval = 0;
        }
        if ($retval == 0) {
            $this->rollback();
            return false;
        } else {
            $this->commit();
            return true;
        }
    }

    /**
     * checkFields 检查指定字段是否在指定数据表中存在
     *
     * @param String $table
     * @param array $arrayField
     */
    private function checkFields($table, $arrayFields)
    {
        $fields = $this->getFields($table);
        foreach ($arrayFields as $key => $value) {
            if (!in_array($key, $fields)) {
                $this->outputError("Unknown column `$key` in field list.");
            }
        }
    }

    /**
     * getFields 获取指定数据表中的全部字段名
     *
     * @param String $table 表名
     * @return array
     */
    private function getFields($table)
    {
        $fields = array();
        $recordset = $this->dbh->query("SHOW COLUMNS FROM $table");
        $this->getPDOError();
        $recordset->setFetchMode(PDO::FETCH_ASSOC);
        $result = $recordset->fetchAll();
        foreach ($result as $rows) {
            $fields[] = $rows['Field'];
        }
        return $fields;
    }

    /**
     * getPDOError 捕获PDO错误信息
     */
    private function getPDOError()
    {
        if ($this->dbh->errorCode() != '00000') {
            $arrayError = $this->dbh->errorInfo();
            $this->outputError($arrayError[2]);
        }
    }

    /**
     * debug
     * 
     * @param mixed $debuginfo
     */
    private function debug($debuginfo)
    {
        var_dump($debuginfo);
        exit();
    }

    /**
     * 输出错误信息
     * 
     * @param String $strErrMsg
     */
    private function outputError($strErrMsg)
    {
        throw new Exception('MySQL Error: ' . $strErrMsg);
    }

    /**
     * destruct 关闭数据库连接
     */
    public function destruct()
    {
        $this->dbh = null;
    }
}
