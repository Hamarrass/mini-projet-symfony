<?php

namespace App\Controller\Admin ;

use Symfony\Component\Routing\Annotation\Route;

class AdminController {


    #[Route('/admin ')]
    public function test(){
         
        
        dd($this->calc(5,4));

    }


    private function calc($a,$b){
             return $a + $b ;
    }

}