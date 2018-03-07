<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @ORM\Column(type="text", length=100)
     */
    private $mail;
    
    /**
     *
     * @ORM\Column(type="text", length=25)
     */
    private $pseudo;
    
    /**
     *
     * @ORM\Column(type="text", length=100)
     */
    private $mdp;
    
    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $parties_played;
    
    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $parties_win;
    
    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $parties_loose;
    
    /**
     *
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $score;
    
    /**
     *
     * @ORM\Column(type="text", length=500)
     */
    private $friends;
    
    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ban_statut;
    
    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chat_ban_tenta;
    
    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chat_ban_statut;
    
    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $admin;
    
    function getId() {
        return $this->id;
    }

    function getMail() {
        return $this->mail;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getParties_played() {
        return $this->parties_played;
    }

    function getParties_win() {
        return $this->parties_win;
    }

    function getParties_loose() {
        return $this->parties_loose;
    }

    function getScore() {
        return $this->score;
    }

    function getFriends() {
        return $this->friends;
    }

    function getBan_statut() {
        return $this->ban_statut;
    }

    function getChat_ban_tenta() {
        return $this->chat_ban_tenta;
    }

    function getChat_ban_statut() {
        return $this->chat_ban_statut;
    }

    function getAdmin() {
        return $this->admin;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    function setParties_played($parties_played) {
        $this->parties_played = $parties_played;
    }

    function setParties_win($parties_win) {
        $this->parties_win = $parties_win;
    }

    function setParties_loose($parties_loose) {
        $this->parties_loose = $parties_loose;
    }

    function setScore($score) {
        $this->score = $score;
    }

    function setFriends($friends) {
        $this->friends = $friends;
    }

    function setBan_statut($ban_statut) {
        $this->ban_statut = $ban_statut;
    }

    function setChat_ban_tenta($chat_ban_tenta) {
        $this->chat_ban_tenta = $chat_ban_tenta;
    }

    function setChat_ban_statut($chat_ban_statut) {
        $this->chat_ban_statut = $chat_ban_statut;
    }

    function setAdmin($admin) {
        $this->admin = $admin;
    }


}
