<?php

namespace App\Controller;

use App\Entity\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ServiceController.php',
        ]);
    }
    #[Route('/service/create', name: 'create_action')]
    public function createAction(EntityManagerInterface $em): JsonResponse
    {
        $user = new UserService();
        $user->setNom("Bogdan");
        $user->setAge("26");

        $em->persist($user);
        $em->flush();

        return $this->json([
            'message' => 'New user',
            'value' => $user->getNom()
        ]);
    }
}
