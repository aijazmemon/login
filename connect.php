<?php

class connection
{
    public $localhost;
    public $username;
    public $password;
    public $database;
    public $conn;
    public $data;

    public function __construct()
    {
        $this->localhost = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "loginpage";
        $this->tableName = "adminlogin";
        $this->mysqlConnect = mysqli_connect($this->localhost, $this->username, $this->password, $this->database);
    }

    public function connect()
    {
        $conn = $this->mysqlConnect;
        if ($conn)
        {
            $result = "Connected";
        }
        else
        {
            $result = "Failed to connect";
        }

        return $result;
    }

    public function insert($table_name, $data)
    {
        if (!empty($data))
        {
            $string = "INSERT INTO " . $table_name . " (";
            $string .= implode(",", array_keys($data)) . ') VALUES (';
            $string .= "'" . implode("','", array_values($data)) . "')";
            if (mysqli_query($this->mysqlConnect, $string))
            {
                return true;
            }
            else
            {
                echo mysqli_error($this->mysqlConnect);
            }
        }
    }
}

?>