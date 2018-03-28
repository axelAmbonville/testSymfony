<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields="email", message="Email déjà pris")
 * @UniqueEntity(fields="username", message="Username déjà pris") 
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @ORM\Column(type="string", length=100, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;
    
    /**
     *
     * @ORM\Column(type="string", length=25, unique=true)
     * @Assert\NotBlank()
     */
    private $username;
    
    /**
     *
     * @ORM\Column(type="string")
     */
    private $password;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    private $parties_played=0;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    private $parties_win=0;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    private $parties_loose=0;
    
    /**
     *
     * @ORM\Column(type="decimal", scale=2)
     */
    private $score=0.00;
    
    /**
     *
     * @ORM\Column(type="text", length=500, nullable=true)
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
    
    /**
     * @var array
     *
     * @ORM\Column(type="string")
     */
    private $roles = [];
    
    //Getter & Setter des variables liées à la sécurité-----------------------------------
    public function getUsername()
    {
        return $this->username;
    }
 
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
 
    public function getEmail()
    {
        return $this->email;
    }
 
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
 
    public function getPassword()
    {
        return $this->password;
    }
 
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    
    
    
     /**
     * Retourne les rôles de l'user
     */
    public function getRoles(): array
    {
        $roles = json_decode($this->roles);
 
        // Afin d'être sûr qu'un user a toujours au moins 1 rôle
        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }
 
        return array_unique($roles);
    }
 
    public function setRoles(array $roles): void
    {
        $this->roles = json_encode($roles);
    }
    //FIN des variable liées a la sécurité---------------------------------------------
    
    
    
    
    //Getter et Setter des autres variables
    function getId() {
        return $this->id;
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


 /**
     * Retour le salt qui a servi à coder le mot de passe
     *
     * {@inheritdoc}
     */
    public function getSalt()
    {
        // See "Do you need to use a Salt?" at https://symfony.com/doc/current/cookbook/security/entity_provider.html
        // we're using bcrypt in security.yml to encode the password, so
        // the salt value is built-in and you don't have to generate one
 
        return null;
    }
 
    /**
     * Removes sensitive data from the user.
     *
     * {@inheritdoc}
     */
    public function eraseCredentials(): void
    {
        // Nous n'avons pas besoin de cette methode car nous n'utilions pas de plainPassword
        // Mais elle est obligatoire car comprise dans l'interface UserInterface
        // $this->plainPassword = null;
    }
 
    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return serialize([$this->id, $this->username, $this->password]);
    }
 
    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized): void
    {
        [$this->id, $this->username, $this->password] = unserialize($serialized, ['allowed_classes' => false]);
    }
}