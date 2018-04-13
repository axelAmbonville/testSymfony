<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class GameController
 * @package App\Controller
 * @Route("/connected")
 */
class privateController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        $joueur = $this->getUser();
        $statut = $joueur->getBan_statut();
        if ($statut ==0) {
            return $this->render('private/home.html.twig');
        }elseif ($statut==1){
            return $this->redirectToRoute('security_logout');
        }else{
            return $this->render('private/home.html.twig');
        }
    }
    
    /**
     * @Route("/profil", name="profil")
     */
    public function profil()
    {
        $joueur = $this->getUser();
        return $this->render('private/profil.html.twig', ['joueur'=>$joueur]);
    }

    /**
     * @Route("/profil/change_infos", name="change_infos")
     */
    public function changeInfos(Request $request, UserPasswordEncoderInterface $encoder){
        $newMail = $request->request->get('email');
        $newUsername = $request->request->get('pseudo');
        $newmdp = $request->request->get('mdp');
        $joueur = $this->getUser();

        if (empty($newmdp)==false){
            $joueur->setEmail($newMail);
            $joueur->setUsername($newUsername);
            $mdpcrypt = $encoder->encodePassword($joueur, $newmdp);
            $joueur->setPassword($mdpcrypt);

            $em = $this->getDoctrine()->getManager();
            $em->persist($joueur);
            $em->flush();
            return $this->redirectToRoute('profil');
        }else{
            $joueur->setEmail($newMail);
            $joueur->setUsername($newUsername);

            $em = $this->getDoctrine()->getManager();
            $em->persist($joueur);
            $em->flush();
            return $this->redirectToRoute('profil');
        }
    }
    
    /**
     * @Route("/rules", name="rules")
     */
    public function rules()
    {
        return $this->render('private/rules.html.twig');
    }
    
    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('private/contact.html.twig');
    }

    /**
     * @Route("/classement", name="classement")
     */
    public function classement()
    {
        $joueurs = $this->getDoctrine()->getRepository('App:User')->orderByScore();
        return $this->render('private/classement.html.twig', ['joueurs'=>$joueurs]);
    }

    /**
     * @Route("/ajouter_ami", name="ajouter_ami")
     */
    public function ajouterAmi( Request $request)
    {
        $pseudo = $request->request->get('pseudo');
        $newAmi = $this->getDoctrine()->getRepository('App:User')->findBy(['username' => $pseudo]);
        $joueur = $this->getUser();
        $amis = $joueur->getFriends();
        if (!empty($newAmi)){
            if (isset($amis->$pseudo)==false) {
                $newAmi = $newAmi[0];
                if(empty($amis)) {
                    $amis[$pseudo] = $newAmi->getId();
                }else{
                    $amis->$pseudo = $newAmi->getId();
                }
                $joueur->setFriends(json_encode($amis));

                $em = $this->getDoctrine()->getManager();
                $em->persist($joueur);
                $em->flush();
                $this->addFlash('notice_amis', 'Ami Ajouté!');
                return $this->redirectToRoute('profil', ['joueur' => $joueur]);
            }else{
                $this->addFlash('notice_amis', 'Déja amis!');
                return $this->redirectToRoute('profil', ['joueur' => $joueur]);
            }
        }else{
            $this->addFlash('notice_amis', 'Joueur inexistant!');
            return $this->redirectToRoute('profil', ['joueur' => $joueur]);
        }

    }
}