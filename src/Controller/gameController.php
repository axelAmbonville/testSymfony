<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
use App\Entity\User;
use App\Entity\Carte;
use App\Entity\Partie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
/**
 * Class GameController
 * @package App\Controller
 * @Route("/partie")
 */
class gameController extends Controller
{
    /**
     * @Route("/nouvelle", name="nouvelle_partie")
     */
    public function nouvellePartie() {
        $joueurs = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->render('game/new.html.twig', ['joueurs' => $joueurs]);
    }
    /**
     * @Route("/creer", name="creer_partie")
     */
    public function creerPartie(Request $request) {
        $idAdversaire = $request->request->get('adversaire');
        $joueur = $this->getDoctrine()->getRepository(User::class)->find(1);
        $adversaire = $this->getDoctrine()->getRepository(User::class)->find($idAdversaire);
        //récupérer les cartes depuis la base de données
        $cartes = $this->getDoctrine()->getRepository(Carte::class)->findAll();
        $tCartes = array();
        //Affecter des valeurs pour les différentes propriétés de partie
        //mélanger les cartes
        foreach ($cartes as $carte) {
            $tabCartes[] = $carte->getId();
        }
        shuffle($tabCartes); //mélange le tableau contenant les id
        //retrait de la première carte
        $carteecarte = array_pop($tabCartes);
        //Distribution des cartes aux joueurs,
        $tabMainJ1 = array();
        for($i=0; $i<6; $i++) {
            $tabMainJ1[] = array_pop($tabCartes);
        }
        $tabMainJ2 = array();
        for($i=0; $i<6; $i++) {
            $tabMainJ2[] = array_pop($tabCartes);
        }
        //La création de la pioche
        $tabPioche = $tabCartes; //sauvegarde des dernières cartes dans la pioche
        //créer un objet de type Partie
        $partie = new Partie();
        $partie->setJ1_id(1);
        $partie->setJ2_id(2);
        $partie->setCarte_rejected($carteecarte);
        
        sort($tabMainJ1);
        sort($tabMainJ2);
        sort($tabPioche);
        
        $partie->setMain_j1(json_encode($tabMainJ1));
        $partie->setMain_j2(json_encode($tabMainJ2));
        $partie->setPioche(json_encode($tabPioche));
        
        $partie->setCarte_placed_j1("[1:0,2:0,3:0,4:0,5:0,6:0,7:0]");
        $partie->setCarte_placed_j2("[1:0,2:0,3:0,4:0,5:0,6:0,7:0]");
        $partie->setManche(0);
        $partie->setTour(0);
        $partie->setScore_j1(0);
        $partie->setScore_j2(0);
        $partie->setActions_j1("a definir");
        $partie->setActions_j2("a definir");
        
        $partie->setObjectifs(json_encode(array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0)));
        
        //Récupérer le manager de doctrine
        $em = $this->getDoctrine()->getManager();
        //Sauvegarde mon objet Partie dans la base de données
        $em->persist($partie);
        $em->flush();
        return $this->redirectToRoute('afficher_partie', ['id' => $partie->getId()]);
    }
    /**
     * @Route("/afficher/{id}", name="afficher_partie")
     */
    public function afficherPartie(Partie $partie) {
        //$partie
        $cartes = $this->getDoctrine()->getRepository("App:Carte")->findAll();
        $objectifs = $this->getDoctrine()->getRepository("App:Objectif")->findAll();
        
        $tabCartes = array();
        foreach ($cartes as $carte)
        {
            $tabCartes[$carte->getId()] = $carte;
        }
        
        return $this->render('game/afficher.html.twig', ['cartes'=>$tabCartes, 'objectifs'=>$objectifs ,'partie' => $partie]);
    }
}