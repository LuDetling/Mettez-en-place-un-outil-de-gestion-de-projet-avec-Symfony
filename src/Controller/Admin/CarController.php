<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Car;
use App\Form\CarType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

#[Route('/admin/car')]
class CarController extends AbstractController
{
    #[Route('/create', name: 'createCar', methods: ["GET", "POST"])]
    public function new(Request $request, EntityManagerInterface $em)
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($car);
            $em->flush();
            $this->addFlash("success", "Vous avez ajouté une nouvelle voiture");
            return $this->redirectToRoute("home");
        }

        return $this->render('admin/car/createCar.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/{id}/delete', name: "deleteCar", methods: ["DELETE"])]
    public function delete(Car $car, EntityManagerInterface $em)
    {
        $em->remove($car);
        $em->flush();
        $this->addFlash("success", "La voiture a bien été supprimée");
        return $this->redirectToRoute("home");
    }
}
