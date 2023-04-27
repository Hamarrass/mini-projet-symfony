<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Course::class, inversedBy: 'students')]
    private Collection $relatio;

    public function __construct()
    {
        $this->relatio = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Course>
     */
    public function getRelatio(): Collection
    {
        return $this->relatio;
    }

    public function addRelatio(Course $relatio): self
    {
        if (!$this->relatio->contains($relatio)) {
            $this->relatio->add($relatio);
        }

        return $this;
    }

    public function removeRelatio(Course $relatio): self
    {
        $this->relatio->removeElement($relatio);

        return $this;
    }
}
