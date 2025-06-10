<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProjectRepository;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
#[ApiResource(
  normalizationContext: ['groups' => ['project:read']],
  order: ['year' => 'ASC'],
  operations: [
    new GetCollection(
      paginationEnabled: false
    )
  ]
)]
class Project
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  #[Groups(['project:read'])]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  #[Groups(['project:read'])]
  private ?string $title = null;

  #[ORM\Column]
  #[Groups(['project:read'])]
  private ?int $year = null;

  #[ORM\Column(type: Types::TEXT, nullable: true)]
  #[Groups(['project:read'])]
  private ?string $shortDescription = null;

  #[ORM\Column(type: Types::TEXT, nullable: true)]
  #[Groups(['project:read'])]
  private ?string $longDescription = null;

  /**
   * @var Collection<int, Technology>
   */
  #[ORM\ManyToMany(targetEntity: Technology::class)]
  #[Groups(['project:read'])]
  private Collection $technologies;

  public function __construct()
  {
    $this->technologies = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getTitle(): ?string
  {
    return $this->title;
  }

  public function setTitle(string $title): static
  {
    $this->title = $title;

    return $this;
  }

  public function getYear(): ?int
  {
    return $this->year;
  }

  public function setYear(int $year): static
  {
    $this->year = $year;

    return $this;
  }

  public function getShortDescription(): ?string
  {
    return $this->shortDescription;
  }

  public function setShortDescription(?string $shortDescription): static
  {
    $this->shortDescription = $shortDescription;

    return $this;
  }

  public function getLongDescription(): ?string
  {
    return $this->longDescription;
  }

  public function setLongDescription(?string $longDescription): static
  {
    $this->longDescription = $longDescription;

    return $this;
  }

  /**
   * @return Collection<int, Technology>
   */
  public function getTechnologies(): Collection
  {
    return $this->technologies;
  }

  public function addTechnology(Technology $technology): static
  {
    if (!$this->technologies->contains($technology)) {
      $this->technologies->add($technology);
    }

    return $this;
  }

  public function removeTechnology(Technology $technology): static
  {
    $this->technologies->removeElement($technology);

    return $this;
  }
}
