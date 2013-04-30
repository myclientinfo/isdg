<?php

class Database {
   
	const DB_DSN = 'mysql:host=localhost;port=3306;dbname=isdg_content';
	const DB_USER = 'isdg_content';
	const DB_PASS = 'isdg_content';

   private static $objInstance;
   
    /*
     * Class Constructor - Create a new database connection if one doesn't exist
     * Set to private so no-one can create a new instance via ' = new DB();'
     */
   private function __construct() {}
   
    /*
     * Like the constructor, we make __clone private so nobody can clone the instance
     */
   private function __clone() {}
   
    /*
     * Returns DB instance or create initial connection
     * @param
     * @return $objInstance;
     */
   public static function getInstance(  ) {
        
        
        if(!self::$objInstance){
        
        	if($_SERVER['HTTP_HOST'] == 'isdg'){
            	$dsn = Database::DB_DSN;
	        	$user = Database::DB_USER;
	        	$pass = Database::DB_PASS;
        	} else {
	        	$dsn = 'mysql:host=isdg.mysql.eu1.frbit.com;port=3306;dbname=isdg';
	        	$user = 'isdg';
	        	$pass = 'siMyN8R6ap7EDby9';
        	}
        
            self::$objInstance = new PDO($dsn, $user, $pass);
            self::$objInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$objInstance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            //self::$objInstance->setFetchMode(PDO::FETCH_ASSOC);
        }
       
        return self::$objInstance;
   
    } # end method
   
    /*
     * Passes on any static calls to this class onto the singleton PDO instance
     * @param $chrMethod, $arrArguments
     * @return $mix
     */
    final public static function __callStatic( $chrMethod, $arrArguments ) {
           
        $objInstance = self::getInstance();
       
        return call_user_func_array(array($objInstance, $chrMethod), $arrArguments);
       
    } # end method
   
}
?>