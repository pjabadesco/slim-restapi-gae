<?php
namespace Controllers\Actions;

use PDO;

class logout
{
    protected $main;

    public function __construct($main)
    {
        $this->main = $main;
    }

    public function __invoke($request, $response, $args) 
    {
        $this->deleteCookies();
        return $response->withStatus(200)->withHeader('Location', '/');            
    }

    private function deleteCookies(){
                        
        @session_start();		
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-10000);
            }
        }	
    }

}