<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\StateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"},
 *     normalizationContext={"groups"={"state:read"}, "swagger_definition_name"="Read"},
 *     denormalizationContext={"groups"={"state:write"}, "swagger_definition_name"="Write"}
 * )
 * @ORM\Entity(repositoryClass=StateRepository::class)
 * @ORM\Table(name="wp_42DFD72C_subscription_states")
 */
class State
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"state:read", "location:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     * @Groups({"state:read", "location:read"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     * @Groups({"state:read", "location:read"})
     */
    private $short;

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

    public function getShort(): ?string
    {
        return $this->short;
    }

    public function setShort(?string $short): self
    {
        $this->short = $short;

        return $this;
    }
}
