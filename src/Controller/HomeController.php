<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(CarRepository $respository): Response
    {
        $cars = $respository->findAll();
        return $this->render('home/index.html.twig', [
            "cars" => $cars
        ]);
    }
}
