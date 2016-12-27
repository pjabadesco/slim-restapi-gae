<?php
namespace Libs;

use PDO;

class Main {

    public $db;
    public $db_rd;

	public function dbconnect(){        
		if(!$this->db){		
			try {
        		if(isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'],'Google App Engine') !== false) {
                    $dsn = getenv('PROD_DSN');
                    $user = getenv('PROD_USER');
                    $password = getenv('PROD_PASSWORD');
                    $dsn_rd = getenv('PRODRD_DSN');
                    $user_rd = getenv('PRODRD_USER');
                    $password_rd = getenv('PRODRD_PASSWORD');
                }else{
                    $dsn = getenv('DEV_DSN');
                    $user = getenv('DEV_USER');
                    $password = getenv('DEV_PASSWORD');
                    $dsn_rd = $dsn;
                    $user_rd = $user;
                    $password_rd = $password;
                }
				$this->db = new PDO($dsn, $user, $password);
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//$this->db_rd = new PDO($dsn_rd, $user_rd, $password_rd);
				//$this->db_rd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db_rd = $this->db;
			} catch (PDOException $e) {
				die('DB Connection Failure.');
				//die('Connection failed: '.$conn_env.' ' . $e->getMessage());
			}
		};
	}

   public function method1($request, $response, $args) {
        /*if (authorizedUser()) {
        echo '<p>Welcome authorized user</p>';
        syslog(LOG_INFO, 'Authorized access');
        } else {
        echo 'Go away unauthorized user<p />';
        syslog(LOG_WARNING, "Unauthorized access");
        }*/
        //your code
        //to access items in the container... $this->ci->get('');
        return 'method1';
   }
   
   public function method2($request, $response, $args) {
        //your code
        //to access items in the container... $this->ci->get('');
        return 'method2';
   }
      
   public function method3($request, $response, $args) {
        //your code
        //to access items in the container... $this->ci->get('');
        return 'method3';
   }
}
