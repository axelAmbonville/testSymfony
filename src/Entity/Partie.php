<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartieRepository")
 */
class Partie
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
    private $carte_rejected;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    private $j1_id;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    private $j2_id;
    
    /**
     *
     * @ORM\Column(type="text", length=500)
     */
    private $main_j1;
    
    /**
     *
     * @ORM\Column(type="text", length=500)
     */
    private $main_j2;
    
    /**
     *
     * @ORM\Column(type="text", length=500)
     */
    private $carte_placed_j1;
    /**
     *
     * @ORM\Column(type="text", length=500)
     */
    private  $carte_placed_j2;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    private $score_j1;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    private $score_j2;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    private $tour;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    private $manche;
    /**
     *
     * @ORM\Column(type="text", length=500)
     */
    private $pioche;
    /**
     *
     * @ORM\Column(type="text", length=500)
     */
    private $objectifs;
    
    /**
     *
     * @ORM\Column(type="text", length=500)
     */
    private $actions_j1;
    
    /**
     *
     * @ORM\Column(type="text", length=500)
     */
    private $actions_j2;
    
}
