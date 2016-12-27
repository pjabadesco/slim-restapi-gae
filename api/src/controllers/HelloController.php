<?php
namespace Controllers;

class HelloController {
   protected $ci;
   //Constructor
   /*public function __construct(ContainerInterface $ci) {
       $this->ci = $ci;
   }*/
   
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
