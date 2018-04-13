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


class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        $joueurs = $this->getDoctrine()->getRepository('App:User')->findAll();
        return $this->render('admin/admin.html.twig', ['joueurs'=> $joueurs]);
    }

    /**
     * @Route("/delete_user/{id}", name="admin_delete_user")
     */
    public function admin_delete($id)
    {
       $joueur = $this->getDoctrine()->getRepository("App:User")->find($id);
       $statut = $joueur->getBan_statut();
       if ($statut == 0) {
           $joueur->setBan_statut(1);
           $em = $this->getDoctrine()->getManager();
           $em->persist($joueur);
           $em->flush();
           $this->addFlash('notice_admin', 'Joueur bloqué!');
       }else{
           $joueur->setBan_statut(0);
           $em = $this->getDoctrine()->getManager();
           $em->persist($joueur);
           $em->flush();
           $this->addFlash('notice_admin', 'Joueur débloqué!');
       }

        $joueurs = $this->getDoctrine()->getRepository('App:User')->findAll();
        return $this->redirectToRoute('admin', ['joueurs' => $joueurs]);
    }
}