<?php
namespace Controllers;

use Libs\Main;
use PDO;

class UsersController {

    public function create($request, $response, $args) 
    {
		$main = new Main();
        $main->dbconnect();

        $main->db->beginTransaction();
        try {
            $rs = $main->db->prepare("
                INSERT IGNORE INTO oauth_users(username,email,scope) VALUES(:username,:email,:scope);
            ");
            $rs->execute(array(
                ':username' => $fields['email']
                ,':email' => $fields['email']
                ,':scope' => 'openid profile email'
            ));
            $main->db->commit();
            return $response->withStatus(200);
        } catch (\PDOException $e) {
            $main->db->rollback();
            return $response->withStatus(404);
        };
         
    }
   
   public function fetch($request, $response, $args) 
   {
        $main = new Main();
        $main->dbconnect();

        try {        
            $rs = $main->db->prepare("
                SELECT * FROM oauth_users WHERE username LIKE :user_id
            ");
            $rs->execute(array(
                ':user_id' => '%'
            ));
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            return $response->write(json_encode($result));
        } catch (\PDOException $e) {
            return $response->withStatus(404);
        }

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
