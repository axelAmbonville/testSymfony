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


class privateController extends Controller
{
    /**
     * @Route("/profil", name="profil")
     */
    public function welcome()
    {
        return $this->render('private/profil.html.twig');
    }
}