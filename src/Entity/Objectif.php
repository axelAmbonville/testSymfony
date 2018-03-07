<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ObjectifRepository")
 */
class Objectif
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $valeur;
    
    /**
     *
     * @ORM\Column(type="text", length=150)
     */
    private $image;
}
