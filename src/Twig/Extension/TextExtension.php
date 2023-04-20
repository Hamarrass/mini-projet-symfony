<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\TextExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class TextExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
            new TwigFilter('nbre_chaine_de_caractere', [$this, 'nbre_caractere']),
           
        ];
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('nbre_chaine_de_caractere', [$this, 'nbre_caractere']),
        ];
    }

    public function nbre_caractere($value){
        return strlen($value);
    }


}
