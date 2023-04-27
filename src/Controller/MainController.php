<?php

namespace App\Controller ;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Repository\WalletRepository;
use App\Tax\Calculateur;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController {

  

    #[Route('/',name:"app_main")]

    public function index (WalletRepository $walletRepository, EntityManagerInterface $entityManager){
          
      $wallet = $walletRepository->find(1);
      $wallet->removeCredit(300);
      $entityManager->flush();

      return $this->render('main.html.twig');
    

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