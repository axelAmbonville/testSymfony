<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarteRepository")
 */
class Carte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @ORM\Column(type="integer")
     */
    private $valeur;
    
    /**
     *
     * @ORM\Column(type="text", length=100)
     */
    private $image;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    private $objectif_id;
}
