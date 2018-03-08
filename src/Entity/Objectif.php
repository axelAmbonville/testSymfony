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

    
    function getId() {
        return $this->id;
    }

    function getValeur() {
        return $this->valeur;
    }

    function getImage() {
        return $this->image;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setValeur($valeur) {
        $this->valeur = $valeur;
    }

    function setImage($image) {
        $this->image = $image;
    }


    
}

