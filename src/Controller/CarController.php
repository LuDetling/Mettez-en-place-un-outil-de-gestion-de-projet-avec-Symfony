<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
// use App\Entity\Car;

class CarController extends AbstractController
{
    #[Route('/addcar', name: 'addcar', methods: ['GET', 'POST'])]
    public function addCar(Request $request, CarRepository $carRepository): Response
    {
        // $car = new Car();
        // $car->setName();
        // $form = $this->createForm(CarType::class, $car);

        return $this->render('car/addcar.html.twig');
    }

    #[Route('/showcar/{id}', name: 'showcar')]
    public function showCar(Request $request, CarRepository $carRepository, int $id): Response
    {
        $car = $carRepository->find($id);

        return $this->render('car/showcar.html.twig', [
            'car' => $car
        ]);
    }
}
