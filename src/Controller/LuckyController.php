<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// src/Controller/LuckyController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class LuckyController extends Controller
{
    /**
    * @Route("/lucky/number", name="app_lucky_number")
    */
    public function number()
    {
        $number = mt_rand(0, 10);
        if ($number==2) {
            $number="celui-ci je le cache :)";
        }
        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
    }
}