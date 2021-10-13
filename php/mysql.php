<?php
// including the config file
include '../config/dbconfig.php';

// class for connection with mysql database
class Mysql extends Dbconfig {
    // class datamembers
    public $connectionString;
    public $dataSet;
    private $sqlQuery;
    
    protected $databaseName;
    protected $hostName;
    protected $userName;
    protected $passCode;
    // default constructor
    function __construct() {
        $this -> connectionString = NULL;
        $this -> sqlQuery = NULL;
        $this -> dataSet = NULL;

        $dbPara = new Dbconfig();
        $this -> databaseName = $dbPara -> dbName;
        $this -> hostName = $dbPara -> serverName;
        $this -> userName = $dbPara -> userName;
        $this -> passCode = $dbPara ->passCode;
        $dbPara = NULL;
    }
    //  funcion to create dbconnection
    function dbConnect()    {
        
        $this -> connectionString = mysqli_connect($this -> serverName,$this -> userName,$this -> passCode);
        mysqli_select_db($this -> connectionString,$this -> databaseName);
        return $this -> connectionString;
    }
    //  function to close dbconnection
    function dbDisconnect() {
        $this -> connectionString = NULL;
        $this -> sqlQuery = NULL;
        $this -> dataSet = NULL;
        $this -> databaseName = NULL;
        $this -> hostName = NULL;
        $this -> userName = NULL;
        $this -> passCode = NULL;
    }
    //  function to select all data from datbase
    function selectAll($tableName)  {
        $this -> sqlQuery = 'SELECT * FROM '.$this -> databaseName.'.'.$tableName;
        $this -> dataSet = mysqli_query($this -> connectionString,$this -> sqlQuery);
        
        return $this -> dataSet;
    }
    //  query table with where clause
    function selectWhere($tableName,$rowName,$operator,$value,$valueType)   {
        $this -> sqlQuery = 'SELECT * FROM '.$tableName.' WHERE '.$rowName.' '.$operator.' ';
        if($valueType == 'int') {
            $this -> sqlQuery .= $value;
        }
        else if($valueType == 'char')   {
            $this -> sqlQuery .= "'".$value."'";
        }
        $this -> dataSet = mysql_query($this -> sqlQuery,$this -> connectionString);
        $this -> sqlQuery = NULL;
        return $this -> dataSet;
        #return $this -> sqlQuery;
    }

    //  insert class
    function insertInto($tableName,$values) {
        $i = NULL;

        $this -> sqlQuery = 'INSERT INTO '.$tableName.' VALUES (';
        $i = 0;
        while($values[$i]["val"] != NULL && $values[$i]["type"] != NULL) {
            if($values[$i]["type"] == "char") {
                $this -> sqlQuery .= "'";
                $this -> sqlQuery .= $values[$i]["val"];
                $this -> sqlQuery .= "'";
            }
            else if($values[$i]["type"] == 'int') {
                $this -> sqlQuery .= $values[$i]["val"];
            }
            $i++;
            if($values[$i]["val"] != NULL)  {
                $this -> sqlQuery .= ',';
            }
        }
        $this -> sqlQuery .= ')';
        #echo $this -> sqlQuery;
        mysql_query($this -> sqlQuery,$this ->connectionString);
        return $this -> sqlQuery;
        #$this -> sqlQuery = NULL;
    }
    // direct select exection query
    function selectFreeRun($query) {
        $this -> dataSet = mysql_query($query,$this -> connectionString);
        return $this -> dataSet;
    }
    // direct query
    function freeRun($query) {
        return mysql_query($query,$this -> connectionString);
    }
}
