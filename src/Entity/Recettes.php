<?php

namespace App\Entity;

use App\Repository\RecettesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecettesRepository::class)]
class Recettes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column]
    private ?int $temps_de_repos = null;

    #[ORM\Column]
    private ?int $temps_de_cuisson = null;

    #[ORM\Column(length: 255)]
    private ?string $ingredients = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $etapes_de_preparation = null;

    #[ORM\Column(length: 255)]
    private ?string $allergene = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $temps_de_preparation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getTempsDeRepos(): ?int
    {
        return $this->temps_de_repos;
    }

    public function setTempsDeRepos(int $temps_de_repos): self
    {
        $this->temps_de_repos = $temps_de_repos;

        return $this;
    }

    public function getTempsDeCuisson(): ?int
    {
        return $this->temps_de_cuisson;
    }

    public function setTempsDeCuisson(int $temps_de_cuisson): self
    {
        $this->temps_de_cuisson = $temps_de_cuisson;

        return $this;
    }

    public function getIngredients(): ?string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function getEtapesDePreparation(): ?string
    {
        return $this->etapes_de_preparation;
    }

    public function setEtapesDePreparation(string $etapes_de_preparation): self
    {
        $this->etapes_de_preparation = $etapes_de_preparation;

        return $this;
    }

    public function getAllergene(): ?string
    {
        return $this->allergene;
    }

    public function setAllergene(string $allergene): self
    {
        $this->allergene = $allergene;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTempsDePreparation(): ?string
    {
        return $this->temps_de_preparation;
    }

    public function setTempsDePreparation(string $temps_de_preparation): self
    {
        $this->temps_de_preparation = $temps_de_preparation;

        return $this;
    }
}
