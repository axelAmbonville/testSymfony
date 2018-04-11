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
     *@ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\Column(type="integer")
     */
    private $j1_id;
    
    /**
     *@ORM\ManyToOne(targetEntity="App\Entity\User")
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
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
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
    
    
    
    function getId() {
        return $this->id;
    }

    function getCarte_rejected() {
        return $this->carte_rejected;
    }

    function getJ1_id() {
        return $this->j1_id;
    }

    function getJ2_id() {
        return $this->j2_id;
    }

    function getMain_j1() {
        return json_decode($this->main_j1);
    }

    function getMain_j2() {
        return json_decode($this->main_j2);
    }

    function getCarte_placed_j1() {
        return (array) json_decode($this->carte_placed_j1);
    }

    function getCarte_placed_j2() {
        return (array) json_decode($this->carte_placed_j2);
    }

    function getScore_j1() {
        return $this->score_j1;
    }

    function getScore_j2() {
        return $this->score_j2;
    }

    function getTour() {
        return $this->tour;
    }

    function getManche() {
        return $this->manche;
    }

    function getPioche() {
        return json_decode($this->pioche);
    }

    function getObjectifs() {
        return (array)json_decode($this->objectifs);
    }

    function getActions_j1() {
        return json_decode($this->actions_j1);
    }

    function getActions_j2() {
        return json_decode($this->actions_j2);
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCarte_rejected($carte_rejected) {
        $this->carte_rejected = $carte_rejected;
    }

    function setJ1_id($j1_id) {
        $this->j1_id = $j1_id;
    }

    function setJ2_id($j2_id) {
        $this->j2_id = $j2_id;
    }

    function setMain_j1($main_j1) {
        $this->main_j1 = $main_j1;
    }

    function setMain_j2($main_j2) {
        $this->main_j2 = $main_j2;
    }

    function setCarte_placed_j1($carte_placed_j1) {
        $this->carte_placed_j1 = $carte_placed_j1;
    }

    function setCarte_placed_j2($carte_placed_j2) {
        $this->carte_placed_j2 = $carte_placed_j2;
    }

    function setScore_j1($score_j1) {
        $this->score_j1 = $score_j1;
    }

    function setScore_j2($score_j2) {
        $this->score_j2 = $score_j2;
    }

    function setTour($tour) {
        $this->tour = $tour;
    }

    function setManche($manche) {
        $this->manche = $manche;
    }

    function setPioche($pioche) {
        $this->pioche = $pioche;
    }

    function setObjectifs($objectifs) {
        $this->objectifs = $objectifs;
    }

    function setActions_j1($actions_j1) {
        $this->actions_j1 = $actions_j1;
    }

    function setActions_j2($actions_j2) {
        $this->actions_j2 = $actions_j2;
    }


}
