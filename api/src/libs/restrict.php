<?php
namespace Libs;

use PDO;

class Restrict
{
    protected $main;

    public function __construct($main)
    {
        $this->main = $main;
    }

    public function AccessToken($request, $response, $next) 
    {
        $res = $this->updateTokenExpire($this->main->getBearerToken());
        if($res>0){
            return $next($request, $response);
        }else{
            return $response->withStatus(401)->withHeader('Location', '/api/logout');
        };
    }

	public function updateTokenExpire($access_token) {
        $this->main->dbconnect();
		$rs = $this->main->db->prepare("
			UPDATE `users` a
			SET a.expires = date_add(a.expires,INTERVAL 5 MINUTE)
			WHERE a.expires>=NOW() AND a.access_token=:access_token
		");
		$rs->execute(array(	
			':access_token' => $access_token
		));
        return $rs->rowCount();			
	}


}