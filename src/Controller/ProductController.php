<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Cocur\Slugify\Slugify;
use Container0t4vzXX\EntityManagerGhost51e8656;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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
public function new (Request $request, EntityManagerInterface $manager,Slugify $slug){
    
    
    $product = new Product();
    $form =  $this->createForm(ProductType::class,$product);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
       
        $product->setValid(true);

        // on a replacer ça avec un listner
        // $product->setSlug($slug->slugify($product->getName()));


        $manager->persist($product);

        $manager->flush();

        $this->addFlash('success',"Félicitation vous avez crée le produit :".$product->getName()) ;
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