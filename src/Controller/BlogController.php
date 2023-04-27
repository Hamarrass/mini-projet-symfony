<?php
   
   namespace App\Controller;

use DateTime;
use App\Entity\Article;
use App\Entity\Course;
use App\Entity\Student;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\EntityManager;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use SebastianBergmann\Complexity\Calculator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

   class BlogController extends AbstractController
    {
     #[Route('/blog', name:'app_blog')]
      public function  index (EntityManagerInterface $entityManager , Slugify $slugify)
      {


      //  $articleRepository = $entityManager->getRepository(Article::class);
      //  $article = $articleRepository->findAll(3);


      //     return $this->render('blog/index.html.twig',[
      //        'articles'=>$article
      //     ]);

     $course = $entityManager->getRepository(Course::class)->findBy(['courseName'=>"mathématique"]);
     $student = $entityManager->getRepository(Student::class)->findAll();

     dd($course,$student);

      }


    }
