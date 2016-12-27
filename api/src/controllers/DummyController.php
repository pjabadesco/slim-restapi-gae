<?php
namespace Controllers;

use Libs\Main;
use PDO;

class DummyController 
{

    public function create($request, $response, $args) 
    {
        return $response->withStatus(405)->write('The POST method has not been defined');
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
        return $response->withStatus(405)->write('The GET method has not been defined for collections');
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