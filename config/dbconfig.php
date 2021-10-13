<?php
/**************************************
 * configuration class for the dabase
 **************************************/
class Dbconfig {
    protected $serverName;
    protected $userName;
    protected $passCode;
    protected $dbName;
    /*****************************************
     * constructor of the configuration class
     ****************************************/
    function __construct()  {
        $this -> serverName = 'localhost';
        $this -> userName = 'root';
        $this -> passCode = '';
        $this -> dbName = 'Test';
    }
}

?>