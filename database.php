<?php
class Database {
    private static $serverName  = "localhost";
    private static $userName    = "root";
    private static $password    = "root";
    private static $db          = "nakedfiles";

    private static $conn = null;

    public function _construct() {
        die('Init function is not allowed');
    }

    public static function connect() {
        if ( null == self::$conn )
        {     
            try
            {
                self::$conn = new mysqli(self::$serverName, self::$userName, self::$password, self::$db);
                //self::$conn =  new PDO( "mysql:host=".self::$serverName.";"."dbname=".self::$db, self::$userName, self::$password); 
            }
            catch(Exception $e)
            {
                die($e->getMessage()); 
            }
        }
        return self::$conn;
    }

    public static function disconnect(){
        self::$conn = null;
    }
}
?>