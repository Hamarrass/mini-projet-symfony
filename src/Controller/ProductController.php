<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
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
public function new (){
    return $this->render('products/new.html.twig');
} 



#[Route('product/{id}', name:"app_product_show")]

public function show($id, EntityManagerInterface  $entityManager){

       $product = $entityManager->getRepository(Product::class)->findOneBy(['id'=>$id]);
       if(is_null($product)){
          return $this->redirectToRoute('app_product');
       }

     return $this->render('products/show.html.twig',['product'=>$product]);

}

}