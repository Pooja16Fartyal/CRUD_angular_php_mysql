<?php
define('db_host', 'localhost');
define('db_user', 'root');
define('db_pass', '');
define('db_name', 'pooja');
	
try{
	$conn = new mysqli(db_host,db_user,db_pass,db_name);
}catch(Exception $e){
	echo $e->getMessage();
}
// class DB{
// 	private $dbHost = 'localhost';
// 	private $dbUsername = 'root';
// 	private $dbPassword = '';
// 	private $dbName = 'db_angular';
// 	public $db;
// 	public function __construct(){
// 			if(!isset($db)){
// 				try{
// 					$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName)
// 					$this->db = $conn;
// 				}catch(Exception $e){
// 					$error = $e->getMessage();
// 					echo $error;	
// 				}
// 			}
// 	}
// }	

	// class DB {
 //    // Database credentials
 //    private $dbHost     = 'localhost';
 //    private $dbUsername = 'root';
 //    private $dbPassword = '';
 //    private $dbName     = 'db_angular';
 //    public $db;
    
 //    /*
 //     * Connect to the database and return db connecction
 //     */
 //    public function __construct(){
 //        if(!isset($this->db)){
            
 //        }
 //    }
 //  }

?>