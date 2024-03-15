<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Film;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[Groups(['json_category'])]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['json_film'])]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    #[Groups(['json_film'])]
    private ?string $name = null;


    #[ORM\ManyToMany(targetEntity: Film::class, mappedBy: 'category')]
    private Collection $films;

    public function __construct()
    {
        $this->films = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Film>
     */
    public function getFilms(): Collection
    {
        return $this->films;
    }

    public function addFilm(Film $film): static
    {
        if (!$this->films->contains($film)) {
            $this->films->add($film);
            $film->addCategory($this);
        }

        return $this;
    }

    public function removeFilm(Film $film): static
    {
        if ($this->films->removeElement($film)) {
            $film->removeCategory($this);
        }

        return $this;
    }
}
