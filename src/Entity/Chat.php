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
     *
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
}
