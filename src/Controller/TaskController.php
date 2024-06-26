<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Foundation\JsonResponse;
class TaskController extends AbstractController
{
    private $entityManager;
    private $taskRepository;

    public function __construct(EntityManagerInterface $entityManager, TaskRepository $taskRepository)
    {
        $this->entityManager = $entityManager;
        $this->taskRepository = $taskRepository;
    }

    /**
     * @Route("/", name="task_list", methods={"GET"})
     */
   /** */
   
    public function index(): Response
    {
        $tasks = $this->taskRepository->findAll();
        return $this->json($tasks);
    }

    
    public function show(Task $task): Response
    {
        return $this->json($task);
    }

    /**
     * @Route("/", name="task_create", methods={"POST"})
     */
    
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $task = new Task();
        $task->setTitle($data['title']);
        $task->setDescription($data['description']);
        $task->setPriority($data['priority']);
        $task->setStatus($data['status']);
        $task->setCreatedAt(new \DateTime());
        $task->setUpdatedAt(new \DateTime());

        $this->entityManager->persist($task);
        $this->entityManager->flush();

        
        return new JsonResponse($task);   
    }

    
    public function update(Request $request, Task $task): Response
    {
        $data = json_decode($request->getContent(), true);

        $task->setTitle($data['title']);
        $task->setDescription($data['description']);
        $task->setPriority($data['priority']);
        $task->setStatus($data['status']);

        $this->entityManager->flush();

        return $this->json($task);
    }

    /**
     * @Route("/{id}", name="task_delete", methods={"DELETE"})
     */
    
    public function delete(Task $task): Response
    {
        $this->entityManager->remove($task);
        $this->entityManager->flush();

        return new Response(null, Response::HTTP_NO_CONTENT);
    } 
    
}
