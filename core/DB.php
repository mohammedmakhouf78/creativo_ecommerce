<?php

namespace app\core;

class DB
{
    public $conn;
    public $table;
    public $sql;
    public $query;
    public function __construct()
    {
        $this->conn = mysqli_connect('localhost', 'root', '', 'creativo_ecommerce');
    }

    public function select($columns)
    {
        $this->sql = "SELECT $columns FROM {$this->table}";
        return $this;
    }

    public function getAll()
    {

        $this->query();
        while ($row = mysqli_fetch_assoc($this->query)) {
            $data[] = $row;
        }
        return isset($data) ? $data : [];
        // return $data;
    }

    public function where($column, $con, $val)
    {
        $this->sql .= " where $column $con '$val'";
        return $this;
    }

    public function selectAll()
    {
        return $this->select("*")->getAll();
    }

    public function andWhere($column, $compair, $value)
    {
        $this->sql .= " AND  `$column` $compair '$value'";
        return $this;
    }

    public function orWhere($column, $compair, $value)
    {
        $this->sql .= " OR  `$column` $compair '$value'";
        return $this;
    }

    public function join($tablename, $first, $second)
    {
        $this->sql .=  " INNER JOIN $tablename ON $first = $second";
        return $this;
    }

    public function getRow()
    {
        $this->query();
        $row = mysqli_fetch_assoc($this->query);
        return $row;
    }

    public function insert($data)
    {

        $row = $this->preparData($data);
        $this->sql = "INSERT INTO `{$this->table}` SET $row";
        return $this;
    }

    public function update($data)
    {

        $row = $this->preparData($data);
        $this->sql = "UPDATE `{$this->table}` SET $row";
        return $this;
    }

    public function delete()
    {
        $this->sql = "DELETE FROM `{$this->table}` ";
        return $this;
    }

    public function excute()
    {
        $this->query();
        if (mysqli_affected_rows($this->conn) > 0) {
            return true;
        } else {
            return $this->showError();
        }
    }

    public function preparData($data)
    {
        $row = "";
        foreach ($data as $key => $value) {
            $row .= " `$key` = " . ((gettype($value) == 'string') ? "'$value'" : "$value") . ",";
        }
        $row = rtrim($row, ",");
        return  $row;
    }


    public function query()
    {
        $this->query =  mysqli_query($this->conn, $this->sql);
    }

    public function showError()
    {
        $errors = mysqli_error_list($this->conn);
        foreach ($errors as $error) {
            echo "<h2 style='color:red'>Error</h2> : " . $error['error'] . "<br> <h3 style='color:red'>Error Code : </h3>" . $error['errno'];
        }
    }

    public function __destruct()
    {
        mysqli_close($this->conn);
    }
}
