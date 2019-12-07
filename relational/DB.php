<?php


class DB {
    private static $_instance = null;
    private $_pdo, $_query, $_results, $_error = false, $_count = 0, $_last_insert_id = null;
    
    private function __construct()
    {
        try {
            $this->_pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER_NAME, DB_PASSWORD);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function query($sql, $params = [])
    {
        $this->_error = false;
        if ($this->_query = $this->_pdo->prepare($sql)) {
            
            $this->_bindParams($params);
            
            $this->_executeQuery();
        }
        return $this;
    }

    public function find($table, $params = [])
    {
        if ($this->_read($table, $params)) {
            return $this->results();
        }
        return false;
    }

    public function findFirst($table, $params = [])
    {
        if ($this->_read($table, $params)) {
            return $this->first();
        }
        return false;
    }

    public function insert($table, $fields = [])
    {
        $field_string = '';
        $value_string = '';
        $values = [];

        foreach ($fields as $field => $value) {
            $field_string .= '`' . $field . '`,';
            $value_string .= '?,';
            $values[] = $value;
        }

        $field_string = rtrim($field_string, ',');
        $value_string = rtrim($value_string, ',');
        $sql = "INSERT INTO {$table} ({$field_string}) VALUES ({$value_string})";
        
        if (!$this->query($sql, $values)->error()) {
            return true;
        }
        return false;
    }

    public function update($table, $id, $fields = [])
    {
        $field_string = '';
        $values = [];

        foreach ($fields as $field => $value) {
            $field_string .= ' ' . $field . '= ?,';
            $values[] = $value;
        }

        $field_string = trim($field_string);
        $field_string = rtrim($field_string, ',');

        $sql = "UPDATE {$table} SET {$field_string} WHERE id = {$id}";

        if (!$this->query($sql, $values)->error()) {
            return true;
        }
        return false;

    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM {$table} WHERE id  = {$id}";
        if (!$this->query($sql)->error()) {
            return true;
        }
        return false;
    }

    public function results()
    {
        return $this->_results;
    }

    public function first()
    {
        return (!empty($this->_results)) ? $this->_results[0] : null;
    }

    public function count()
    {
        return $this->_count;
    }

    public function getLastID($table)
    {
        return $this->query("SELECT id FROM {$table} ORDER BY id DESC LIMIT 1")->results();
    }

    public function lastID()
    {
        return $this->_last_insert_id;
    }

    public function getColumns($table)
    {
        return $this->query("SHOW COLUMNS FROM {$table}")->results();
    }

    public function error()
    {
        return $this->_error;
    }

    protected function _bindParams($params)
    {
        $x = 1;
        if (count($params)) {
            foreach ($params as $param) {
                $this->_query->bindValue($x, $param);
                $x++;
            }
        }
    }

    protected function _executeQuery()
    {
        if ($this->_query->execute()) {
            $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();
            $this->_last_insert_id = $this->_pdo->lastInsertId();
        } else {
            $this->_error = true;
        }
    }

    protected function _read($table, $params = [])
    {
        $bind = [];
        $order = '';
        $limit = '';
        
        // condition
        $condition_string = $this->_condition($params);
        // bind
        if (array_key_exists('bind', $params)) {
            $bind = $params['bind'];
        }
        // order
        if (array_key_exists('order', $params)) {
            $order = ' ORDER BY ' . $params['order'];
        }
        // limit
        if (array_key_exists('limit', $params)) {
            $limit = ' LIMIT ' . $params['limit'];
        }

        $sql = "SELECT * FROM {$table}{$condition_string}{$order}{$limit}";

        if ($this->query($sql, $bind)) {
            if (!count($this->_results)) {
                return false;
            }
            return true;
        }
    }
    
    protected function _condition($params)
    {
        $condition_string = '';
        if (isset($params['conditions'])) {
            if (is_array($params['conditions'])) {
                foreach ($params['conditions'] as $condition) {
                    $condition_string .= ' ' . $condition . ' AND';
                }
                $condition_string = trim($condition_string);
                $condition_string = rtrim($condition_string, ' AND');
            } else {
                $condition_string = $params['conditions'];
            }

            if ($condition_string != '') {
                $condition_string = ' WHERE ' . $condition_string;
            }
        }
        return $condition_string;
    }
}
