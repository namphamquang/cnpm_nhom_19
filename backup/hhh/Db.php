<?php
class Db
{
   
    protected static $connection;
    
    protected $table;
   
    protected $error = null;
   
    protected $errorText = null;
    
    protected $statement = null;
   
    private $result = null;
    
    private $where = [];
    
    private $select = [];
    
    private $order = [];
    
    private $offset = null;
    
    private $limit = null;
    
    private $group = [];

    
    public function __construct($connection = null)
    {
        $this->error = null;
        $this->statement = null;
        if (null != $connection) {
            $this->setConnection($connection);
        } else if (!isset ($this::$connection)){
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
            $this::$connection = new \PDO($dsn, DB_USER, DB_PASS);
            $this::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
    }

    
    public function setConnection($connection)
    {
        $this::$connection = $connection;
        return $this;
    }

    
    public function getConnection()
    {
        return $this::$connection;
    }

    
    public function table($tableName)
    {
        $this->table = $tableName;
        return $this;
    }

    
    public function insert($data = [])
    {
        $sql = 'INSERT INTO __table__(__fields__) VALUES (__values__)';
        $sql = str_replace('__table__', $this->table, $sql);

        $fields = array_keys($data);
        $sql = str_replace('__fields__', implode(", ", $fields), $sql);

        $values = [];
        foreach ($data as $key => $item) {
            array_push($values, ":" . $key);
        }
        $sql = str_replace('__values__', implode(", ", $values), $sql);
        $this->statement = $this::$connection->prepare($sql);
        foreach ($data as $key => $item) {
            $this->statement->bindValue(":" . $key, $item);
        }
        return $this->getResult();
    }

    
    public function update($data = [])
    {
        $sql = 'UPDATE __table__ SET __set__ __where__';
        $sql = str_replace('__table__', $this->table, $sql);

        $set = [];
        foreach ($data as $key => $item) {
            array_push($set, $key . "=" . ":set_" . $key);
        }
        $setStr = implode(", ", $set);
        $sql = str_replace('__set__', $setStr, $sql);

        $sql = str_replace('__where__', $this->getWhereString(), $sql);

        $this->statement = $this::$connection->prepare($sql);
        foreach ($data as $key => $item) {
            $this->statement->bindValue(":set_" . $key, $item);
        }
        $this->bindWhereStatement();
        return $this->getResult();
    }

    
    public function delete()
    {
        $sql = 'DELETE FROM __table__ __where__';
        $sql = str_replace("__table__", $this->table, $sql);
        $sql = str_replace("__where__", $this->getWhereString(), $sql);
        $this->statement = $this::$connection->prepare($sql);

        $this->bindWhereStatement();

        return $this->getResult();
    }

    
    public function select($select = '')
    {
        array_push($this->select, $select);
        return $this;
    }

    
    public function result()
    {
        $data = $this->statement->fetchAll(\PDO::FETCH_ASSOC);
        if (empty($data)) {
            return false;
        }
        return $data;
    }

    
    public function get()
    {
        $sql = 'SELECT __select__ FROM __table__ __where__ __group__ __order__ __limit__ __offset__';
        $sql = str_replace("__table__", $this->table, $sql);
        $sql = str_replace("__select__", $this->getSelectString(), $sql);
        $sql = str_replace("__where__", $this->getWhereString(), $sql);
        $sql = str_replace("__group__", $this->getGroupString(), $sql);
        $sql = str_replace("__order__", $this->getOrderString(), $sql);
        $sql = str_replace("__limit__", $this->getLimitString(), $sql);
        $sql = str_replace("__offset__", $this->getOffsetString(), $sql);
        $this->statement = $this::$connection->prepare($sql);
        $this->bindWhereStatement();
        $this->getResult();

        return $this;
    }

    
    public function where()
    {
        $input = func_get_args();
        if (1 == count($input)) {
            if (is_array($input[0])) {
                foreach ($input[0] as $key => $value) {
                    $this->addWhere($key, $value);
                }
            }
        } else {
            if (!isset($input[2])) {
                $input[2] = '=';
            }
            $this->addWhere($input[0], $input[1], $input[2]);
        }
        return $this;
    }

    
    public function order($order = [])
    {
        foreach ($order as $key => $item) {
            $this->order[$key] = strtoupper($item);
        }
        return $this;
    }

    
    public function limit($limit = 1)
    {
        $this->limit = preg_replace('/[^0-9]/i', '', $limit);
        if ('' === trim($this->limit)) {
            $this->limit = 1;
        }
        return $this;
    }

   
    public function offset($offset = 0)
    {
        $this->offset = preg_replace('/[^0-9]/i', '', $offset);
        if ('' === trim($this->offset)) {
            $this->offset = 0;
        }
        return $this;
    }

   
    public function group($group)
    {
        array_push($this->group, $group);
        return $this;
    }

    
    public function execSql($sql)
    {
        $this->error = null;
        $this->statement = null;
        try {
            $this->statement = $this::$connection->prepare($sql);
            $result = $this->statement->execute();
        } catch (Exception $ex) {
            $result = $ex->getCode();
            $this->error = $ex->getCode();
        }
        return $result;
    }

    
    public function reset()
    {
        $this->error = null;
        $this->errorText = null;
        $this->statement = null;
        $this->result = null;
        $this->where = [];
        $this->select = [];
        $this->order = [];
        $this->offset = null;
        $this->limit = null;
        $this->group = [];
        return $this;
    }
    public function getError(){
        return $this->error;
    }
    public function getErrorText(){
        return $this->errorText;
    }

    private function addWhere($field, $value, $comparation = '=')
    {
        array_push($this->where, [
            'field' => $field,
            'value' => $value,
            'comparation' => $comparation
        ]);
    }

    private function getResult()
    {
        try {
            $this->result = $this->statement->execute();
        } catch (Exception $ex) {
            $this->result = false;
            $this->error = $ex->getCode();
            $this->errorText = $ex->getMessage();
        }
        return $this->result;
    }

    private function getWhereString()
    {
        if (empty($this->where)) {
            return "";
        } else {
            $where = [];
            foreach ($this->where as $key => $item) {
                array_push($where, $item['field'] ." ". $item['comparation'] ." ". ":where_" . $key . "_" . $item['field']);
            }
            $whereStr = "WHERE " . implode(" AND ", $where);
            return $whereStr;
        }
    }

    private function getLimitString()
    {
        if (!isset($this->limit)) {
            return "";
        } else {
            return "LIMIT " . $this->limit;
        }
    }

    private function getOffsetString()
    {
        if (!isset($this->offset)) {
            return "";
        } else {
            return "OFFSET " . $this->offset;
        }
    }

    private function getOrderString()
    {
        if (empty($this->order)) {
            return '';
        } else {
            $orderAr = [];
            foreach ($this->order as $key => $value) {
                array_push($orderAr, $key . " " . $value);
            }
            return $order = "ORDER BY " . implode(", ", $orderAr);
        }
    }

    private function getGroupString()
    {
        if (empty($this->group)) {
            return '';
        } else {
            return $order = "GROUP BY " . implode(", ", $this->group);
        }
    }

    private function getSelectString()
    {
        if (empty($this->select)) {
            return "*";
        }
        return implode(", ", $this->select);
    }

    private function bindWhereStatement()
    {
        if (!empty($this->where)) {
            foreach ($this->where as $key => $item) {
                $this->statement->bindValue(":where_" . $key . "_" . $item['field'], $item['value']);
            }
        }
    }

}