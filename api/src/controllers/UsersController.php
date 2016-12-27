<?php
namespace Controllers;

use PDO;

class UsersController 
{
    protected $main;

    public function __construct($main)
    {
        $this->main = $main;
    }

    public function create($request, $response, $args) 
    {
        $this->main->dbconnect();

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
            $this->main->db->commit();
            return $response->withStatus(200);
        } catch (\PDOException $e) {
            $this->main->db->rollback();
            return $response->withStatus(404);
        };
         
    }

    public function delete($request, $response, $args) 
    {
        return $response->withStatus(405)->write('The DELETE method has not been defined for individual resources');
    }

    public function fetch($request, $response, $args) 
    {
        return $response->withStatus(405)->write('The GET method has not been defined for individual resources');
    }

    public function fetchAll($request, $response, $args) 
    {
        $this->main->dbconnect();

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

    public function update($request, $response, $args) 
    {
        return $response->withStatus(405)->write('The PUT method has not been defined for individual resources');
    }

    public function patch($request, $response, $args) 
    {
        return $response->withStatus(405)->write('The PATCH method has not been defined for individual resources');
    }

    public function deleteList($data)
    {
        return $response->withStatus(405)->write('The DELETE method has not been defined for collections');
    }

    public function patchList($request, $response, $args) 
    {
        return $response->withStatus(405)->write('The PATCH method has not been defined for collections');
    }

    public function replaceList($request, $response, $args) 
    {
        return $response->withStatus(405)->write('The PUT method has not been defined for collections');
    }

}