<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class TaskControllerDEfController extends AbstractController
{
    #[Route('/task/controller/d/ef', name: 'app_task_controller_d_ef')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/TaskControllerDEfController.php',
        ]);
    }
}
