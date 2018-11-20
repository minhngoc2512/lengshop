<?php

class Model
{
    private $host = 'localhost';
    private $port = 3306;
    private $database = 'project_1';
    private $user = 'root';
    private $password = '';
    private $conn = null;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        $this->conn->query('set names utf8');
    }

    protected function GetRecord($table, $option = array())
    {
        $select = isset($option['select']) ? $option['select'] : ' * ';
        $where = isset($option['where']) ? ' WHERE ' . $option['where'] : '';
        $order_by = isset($option['order_by']) ? ' ORDER BY' . $option['order_by'] : '';
        $limit = isset($option['limit']) ? ' LIMIT ' . $option['limit'] : '';
        $like = isset($option['like']) ? "LIKE '%" . $option['like'] . "%'" : '';
        $sql = "SELECT $select FROM $table $where $like $order_by $limit ";
      //  echo $sql;
        $value = $this->conn->query($sql);
        $data = array();
        while ($row = $value->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    private function check($table, $value)
    {
        $sql = "SELECT * FROM $table where username='$value'";

        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return false;
        } else {
            return true;
        }

    }

    protected function CheckLogin($data = array())
    {
        $name = $data['name'];
        $pass = md5($data['pass']);
        $sql = "SELECT * FROM user WHERE username='$name' AND password='$pass'";
        $value = $this->conn->query($sql);
        if ($value->num_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

    protected function AddData($table, $value = array())
    {
        $name = $value['name'];
        $data = '';
        if ($this->check($table, $name)) {
            foreach ($value as $result) {
                $data .= ",'$result'";
            }
            $sql = "INSERT INTO $table VALUES (null $data)";

            $this->conn->query($sql);

            return true;
        } else {
            return false;
        }

    }


}