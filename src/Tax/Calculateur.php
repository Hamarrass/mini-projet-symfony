<?php

namespace App\Tax ;

use Psr\Log\LoggerInterface;

class Calculateur
{
    private $logger ;
    private $marge ;
    public function __construct(LoggerInterface $logger, float $marge)
    {
          $this->logger = $logger ;
          $this->marge = $marge ;
    }

    public function calculTTC(float $prixht) : float{
        return $prixht * 1.2 ;
    }
}