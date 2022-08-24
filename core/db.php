<?php
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
    die(header('HTTP/1.1 403 Forbidden', true, 403));
}

require(dirname(__FILE__)."/config.php");

class DB{

    /*
        'type' => "none",
        'host' => '',
        'port' => '',
        'user' => '',
        'dbname' => '',
        'password' => '',
        'path' => '',
        'addargs' => ''
    */

    private static $_dbtype;
    private static $_dbhost;
    private static $_dbport;
    private static $_dbuser;
    private static $_dbname;
    private static $_dbpass;
    private static $_dbpath; //for sqlite
    private static $_dbargs; //for psql
    
    private $_db;

    private function __construct(){

        $this->_dbtype = Config::$db['type'];
        $this->_dbhost = Config::$db['host'];
        $this->_dbport = Config::$db['port'];
        $this->_dbuser = Config::$db['user'];
        $this->_dbname = Config::$db['dbname'];
        $this->_dbpass = Config::$db['password'];
        $this->_dbpath = Config::$db['path'];
        $this->_dbargs = Config::$db['addargs'];
        $this->_connect();
    }

    private function _connect(){
        switch($this->_dbtype){
            case "mysqli":
                $this->_db = mysqli_connect($this->_dbhost,
                                            $this->_dbuser,
                                            $this->_dbpass,
                                            $this->_dbname);
                break;
            case "sql3":
                $this->_db = new SQLite3($this->_dbpath);
                break;
            case "psql":

                $_cstr = '';
                if($this->_dbhost != '') $_cstr = "host=$this->_dbhost";
                if($this->_dbport != '') $_cstr .= " port=$this->_dbport";
                if($this->_dbname != '') $_cstr .= " dbname=$this->_dbname";
                if($this->_dbuser != '') $_cstr .= " user=$this->_dbuser";
                if($this->_dbpass != '') $_cstr .= " password=$this->_dbpass";
                if($this->_dbargs != '') $_cstr .= " options='$this->_dbargs'";
                $_cstr .= " dbname=$this->_dbname";

                $this->_db = pg_connect($_cstr);
                break;
            default:
                throw new Exception('Incorrect Database type');
        }
    }

    private function _query($qstr){
    }

}
