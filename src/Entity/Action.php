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
    
    
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getEtat() {
        return $this->etat;
    }

    function getUser_id() {
        return $this->user_id;
    }

    function getPartie_id() {
        return $this->partie_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    function setPartie_id($partie_id) {
        $this->partie_id = $partie_id;
    }


}
