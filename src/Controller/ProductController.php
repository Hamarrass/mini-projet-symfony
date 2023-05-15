<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Cocur\Slugify\Slugify;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends  abstractController
{
#[Route('/product',name:"app_product")]
public  function index(EntityManagerInterface $entityManager){
      
     $products = $entityManager->getrepository(Product::class)->findBy(['valid'=>true]);

  
    return $this->render('products/index.html.twig',[
        'products'=>$products
    ]);
}

#[Route('/product/new',name:'app_product_new')]
public function new (Request $request, EntityManagerInterface $manager,Slugify $slug,MailerInterface $mailer){
    
    $product = new Product();
    $form =  $this->createForm(ProductType::class,$product);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
        
     
    $email = (new Email())
    ->from('from@example.com')
    ->to('to@example.com')
    //->cc('cc@example.com')
    //->bcc('bcc@example.com')
    //->replyTo('fabien@example.com')
    //->priority(Email::PRIORITY_HIGH)
    ->subject('Time for Symfony Mailer!')
    ->text('Sending emails is fun again!')
    ->html('<p>See Twig integration for better HTML integration!</p>');
    
    $mailer->send($email);

return new Response('Email sent ');
        $product->setValid(true);

        // on a replacer ça avec un listner
        // $product->setSlug($slug->slugify($product->getName()));


        $manager->persist($product);

        $manager->flush();

        $this->addFlash('success',"Félicitation vous avez crée le produit :".$product->getName()) ;

        $email = (new Email())
            ->from('hello@example.com')
            ->to('you@example.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');
    
        $mailer->send($email);

     


        

        return $this->redirectToRoute('app_product');
    }

    
    return $this->render('products/new.html.twig',['form'=>$form->createView()]);
} 



#[Route('product/{slug}', name:"app_product_show")]

public function show($slug, EntityManagerInterface  $entityManager){

       $product = $entityManager->getRepository(Product::class)->findOneBy(['slug'=>$slug]);
       if(is_null($product)){
          return $this->redirectToRoute('app_product');
       }

     return $this->render('products/show.html.twig',['product'=>$product]);

}

}