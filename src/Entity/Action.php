<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActionRepository")
 */
class Action
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     *
     * @ORM\Column(type="text", length=50)
     */
    private $nom;
    
    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $etat;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    private $user_id;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    private $partie_id;
}
