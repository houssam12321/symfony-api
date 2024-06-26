<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    private $title;
    private $description;
    private $priority;
    private $status;
    private $updatedAt;
    private $CreatedAt;



    public function getId(): ?int
    {
        return $this->id;
    }
    public function getTitle(): ?string
    {
        return $this->title;
    }
    public function setTitle(string $title)
    {
        $this->title= $title;
        
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function setDescription(string $description)
    {
        $this->description= $description;
        
    }
    public function getPriority(): ?string
    {
        return $this->priority;
    }
    public function setPriority(string $priority)
    {
        $this->priority= $priority;
        
    }
    public function getStatus(): ?string
    {
        return $this->status;
    }
    public function setStatus(string $status)
    {
        $this->status= $status;
        
    }
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAt(): void
    {
        $this->updatedAt = new \DateTime();
    }
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(): void
    {
        $this->CreatedAt = new \DateTime();
    }


}
