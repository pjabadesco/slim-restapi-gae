<?php
namespace Controllers;

class NeuralinkController {
   protected $ci;
   //Constructor
   /*public function __construct(ContainerInterface $ci) {
       $this->ci = $ci;
   }*/
   
   public function method1($request, $response, $args) {
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
