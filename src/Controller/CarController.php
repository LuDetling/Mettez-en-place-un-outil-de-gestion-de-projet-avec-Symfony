<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    #[Route('/addcar', name: 'addcar')]
    public function addCar(Request $request): Response
    {
        return $this->render('car/addcar.html.twig');
    }

    #[Route('/showcar/{id}', name: 'showcar')]
    public function showCar(Request $request, CarRepository $repository, int $id): Response
    {
        $car = $repository->find($id);
        return $this->render('car/showcar.html.twig', [
            'car' => $car
        ]);
    }
}
