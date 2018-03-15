<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChatRepository")
 */
class Chat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $message_id;

    /**
     *@ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\Column(type="text", length=50)
     */
    private $user_pseudo;
    
    /**
     *
     * @ORM\Column(type="text", length=150)
     */
    private $message;
    
    /**
     *
     * @ORM\Column(type="datetime")
     */
    private $message_heure;
    
    
    
    function getMessage_id() {
        return $this->message_id;
    }

    function getUser_pseudo() {
        return $this->user_pseudo;
    }

    function getMessage() {
        return $this->message;
    }

    function getMessage_heure() {
        return $this->message_heure;
    }

    function setMessage_id($message_id) {
        $this->message_id = $message_id;
    }

    function setUser_pseudo($user_pseudo) {
        $this->user_pseudo = $user_pseudo;
    }

    function setMessage($message) {
        $this->message = $message;
    }

    function setMessage_heure($message_heure) {
        $this->message_heure = $message_heure;
    }


}
