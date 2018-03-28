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
        $joueur = $this->getDoctrine()->getRepository(User::class)->find($this->getUser()->getId());
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
        $partie->setJ1_id($this->getUser()->getId());
        $partie->setJ2_id($idAdversaire);
        $partie->setCarte_rejected($carteecarte);
        
                
        $partie->setCarte_placed_j1(json_encode(array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0)));
        $partie->setCarte_placed_j2(json_encode(array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0)));
        $partie->setManche(0);
        
        $random_tour = rand(1, 2);
        if ($random_tour==1) {
            $partie->setTour($joueur);
            $tabMainJ1[] = array_pop($tabPioche);
        }else{
         $partie->setTour($adversaire);
         $tabMainJ2[] = array_pop($tabPioche);
        }
        
        
        sort($tabMainJ1);
        sort($tabMainJ2);
        
        $partie->setMain_j1(json_encode($tabMainJ1));
        $partie->setMain_j2(json_encode($tabMainJ2));
        $partie->setPioche(json_encode($tabPioche));
        $partie->setScore_j1(0);
        $partie->setScore_j2(0);
        
        $secret = ['etat'=>0,'cartes'=>0];
        $dissimulation = ['etat'=>0,'cartes'=>[]];
        $cadeau = ['etat'=>0,'cartes'=>[]];
        $concurrence = ['etat'=>0,'cartes'=>[]];
        $actions = array('secret'=>$secret, 'dissimulation'=>$dissimulation, 'cadeau'=>$cadeau, 'concurrence'=>$concurrence);
        $partie->setActions_j1(json_encode($actions));
        $partie->setActions_j2(json_encode($actions));
        
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
    
    /**
     * @Route("/passetour/{id}", name="passer_tour")
     */
    public function passerTour(Partie $partie){
        
        $tour_prec = $partie->getTour();
        if($tour_prec->getID() == $partie->getJ1_id()){
            $newTourJoueurId = $partie->getJ2_id();
            $partie->setTour($this->getDoctrine()->getRepository("App:User")->find($newTourJoueurId));
            
            $pioche = $partie->getPioche();
            $mainJTour = $partie->getMain_J2();
            $mainJTour[] = array_pop($pioche);
            sort($mainJTour);
            $partie->setPioche(json_encode($pioche));
            $partie->setMain_j2(json_encode($mainJTour));
            
        }elseif($tour_prec->getID() == $partie->getJ2_id()) {
            $newTourJoueurId = $partie->getJ1_id();
            $partie->setTour($this->getDoctrine()->getRepository("App:User")->find($newTourJoueurId));
            
            $pioche = $partie->getPioche();
            $mainJTour = $partie->getMain_J1();
            $mainJTour[] = array_pop($pioche);
            sort($mainJTour);
            $partie->setPioche(json_encode($pioche));
            $partie->setMain_j1(json_encode($mainJTour));
        }
        $em = $this->getDoctrine()->getManager();
        $em->persist($partie);
        $em->flush();
        
        return $this->redirectToRoute('afficher_partie', ['id' => $partie->getId()]);
    }
    
    /**
     * @Route("/action/secret/{id}", name="action_secret")
     */
    public function actionSecret(Partie $partie, Request $request) {
        $idcarte = $request->request->get('idCarte');
        $joueurId = $partie->getTour()->getId();
        
        if($joueurId == $partie->getJ1_id()){
            $main = $partie->getMain_j1();
            unset($main[array_search($idcarte, $main)]);
            $main = array_values($main);
            sort($main);
            
            $actions = $partie->getActions_j1();
            $actions->secret->etat = 1;
            $actions->secret->cartes = $idcarte;
            
            $partie->setMain_j1(json_encode($main));
            $partie->setActions_j1(json_encode($actions));
            
        }elseif ($joueurId == $partie->getJ2_id()) {
            $main = $partie->getMain_j2();
            unset($main[array_search($idcarte, $main)]);
            $main = array_values($main);
            sort($main);
            
            $actions = $partie->getActions_j2();
            $actions->secret->etat = 1;
            $actions->secret->cartes = $idcarte;
            
            $partie->setMain_j2(json_encode($main));
            $partie->setActions_j2(json_encode($actions));
        }
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($partie);
        $em->flush();
        return $this->redirectToRoute('passer_tour', ['id' => $partie->getId()]);
    }
}