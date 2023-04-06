<?php

namespace App\Controller ;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MainController extends AbstractController {


    #[Route('/',name:"app_main")]

    public function index (){

       return  $this->render('main.html.twig');

    }

    #[Route('/contact',name:'app_contact',priority:5 )]
    public function contact(){
    
 
        return $this->render('contact.html.twig');

    }

}