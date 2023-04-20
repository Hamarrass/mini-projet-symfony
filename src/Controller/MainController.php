<?php

namespace App\Controller ;

use App\Tax\Calculateur;
use Cocur\Slugify\Slugify;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController {

  

    #[Route('/',name:"app_main")]

    public function index (Calculateur $calculator,LoggerInterface $logger , Slugify $slugify){
        $logger->info('une demande de prix TTC vient d\'çetre effectué, !');
       return  $this->render('main.html.twig');

    }

    #[Route('/contact',name:'app_contact',priority:5 )]
    public function contact(){
    
 
        return $this->render('test.html.twig',[
            "prenom"=>"Hassane",
            "age" => 15
        ]);
    } 

    #[Route('/layout',name:'app_layouts')]
    public function tutoLayout(){
        return $this->render('tuto-twig/home.html.twig');
    }

    #[Route('/layout-disc',name:'layout-disc')]
    public function discover(){
        return $this->render('tuto-twig/discover.html.twig');
    }

}