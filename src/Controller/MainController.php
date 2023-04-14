<?php

namespace App\Controller ;

use App\Tax\Calculateur;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController {

  

    #[Route('/',name:"app_main")]

    public function index (Calculateur $calculator,LoggerInterface $logger){
    
            dd($calculator->calculTTC(150));

        $logger->info('une demande de prix TTC vient d\'çetre effectué, !');
       return  $this->render('main.html.twig');

    }

    #[Route('/contact',name:'app_contact',priority:5 )]
    public function contact(){
    
 
        return $this->render('contact.html.twig');

    }

}