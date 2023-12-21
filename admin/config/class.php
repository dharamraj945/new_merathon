<?php


class Db_functions
{

    /// connection with database  start
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "grt_cms";

    protected $conn = "";
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db_name);
        if ($this->conn) {
            // echo "connection Success";
        } else {
            echo "fail";
        }
    }


    /// connection with database end 


    // Sql Query Resolver Start 
    function exe_query($sql_qry)
    {

        $qry = $this->conn->query($sql_qry);
        return $qry;
    }

    // Sql Query Resolver End 

    // Data Fetch Fnction Start

    function data_fetch($qry)
    {

        $qry_exe = $this->exe_query($qry);

        if (mysqli_num_rows($qry_exe) > 0) {




            while ($data = mysqli_fetch_assoc($qry_exe)) {

                $array[] = $data;
            }
        } else {
            $array = 0;
        }
        return $array;
    }
    // Data Fetch Fnction end 


    // Data Store Into Db Function Start
    function data_insert($qry)
    {
        $qry = "$qry";
        $response = $this->exe_query($qry);
        return $response;
    }

    // Data Store Into Db Function Start

    // Data update into Db function 
    function data_update($query)
    {
        $sql = "$query";
        $result = $this->exe_query($sql);
        return $result;
    }

    // Data update into Db function 


    function RemoveSpecialChar($str)
    {

        // Using str_replace() function 
        // to replace the word 
        $res = str_replace(array(
            '\'', '"',
            ',', ';', '<', '>', ' ', '_'
        ), '-', $str);

        // Returning the result 
        return strtolower($res);
    }

    function LastId()
    {
        return $this->conn->insert_id;
    }


    function checkForUrlHandler($qry)
    {

        $result = $this->exe_query($qry);
        $result_rows = mysqli_num_rows($result);
        if ($result_rows > 0) {
            return mysqli_num_rows($result);
        } else {
            return 0;
        }
    }


    function data_delete($qry)
    {

        $result = $this->exe_query($qry);
        if ($result == 1) {
            return 1;
        } else {
            return 0;
        }
    }
}
