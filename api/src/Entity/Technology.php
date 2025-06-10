<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\TechnologyRepository;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TechnologyRepository::class)]
#[ApiResource(
  operations: [
    new GetCollection(
      paginationEnabled: false
    )
  ]
)]
class Technology
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  #[Groups(['project:read'])]
  private ?string $name = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getName(): ?string
  {
    return $this->name;
  }

  public function setName(string $Name): static
  {
    $this->name = $Name;

    return $this;
  }

  public function __toString(): string
  {
    return $this->name; // ou tout autre champ que tu veux afficher
  }
}
