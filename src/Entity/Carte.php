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
     *@ORM\OneToMany(targetEntity="App\Entity\User")
     * @ORM\Column(type="integer")
     */
    private $objectif_id;
    
    
    
    function getId() {
        return $this->id;
    }

    function getValeur() {
        return $this->valeur;
    }

    function getImage() {
        return $this->image;
    }

    function getObjectif_id() {
        return $this->objectif_id;
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

    function setObjectif_id($objectif_id) {
        $this->objectif_id = $objectif_id;
    }


}
