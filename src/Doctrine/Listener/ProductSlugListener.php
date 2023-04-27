<?php

 namespace App\Doctrine\Listener;

use App\Entity\Product;
use Cocur\Slugify\Slugify;
use Doctrine\Persistence\Event\LifecycleEventArgs;

 class ProductSlugListener {


    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify ;
    }

   public function prePersist(Product $entity , LifecycleEventArgs $event){


    
    if(empty($entity->getSlug())){

        $entity->setSlug(strtolower($this->slugify->slugify($entity->getName())));

    }

    
    // au cas ou tu fais l'appel à tous les entity
    //je recupère tout les entities (tous qui existe dans le dossies Entity)
      $entityx = $event->getObject();

      // pour eviter d'exécuter tout les  persists, alors   on utilise le filtre  par cette fonction instanceof (Product , Article , Wallet)
      if(!($entityx instanceof Product)){
              return; 
      }



   }

 }