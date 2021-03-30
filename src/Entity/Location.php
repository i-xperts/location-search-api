<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use App\ApiPlatform\LocationSearchFilter;
use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"},
 *     normalizationContext={"groups"={"location:read"}, "swagger_definition_name"="Read"},
 *     denormalizationContext={"groups"={"location:write"}, "swagger_definition_name"="Write"},
 *     shortName="locations",
 *     attributes={
 *         "pagination_items_per_page"=10
 *     }
 * )
 * @ApiFilter(LocationSearchFilter::class)
 * @ApiFilter(SearchFilter::class, properties={"zipcode": "partial", "location": "partial"})
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 * @ORM\Table(name="wp_42DFD72C_subscription_locations")
 */
class Location
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="smallint", length=4, options={"unsigned"=true})
     * @Groups({"location:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="smallint", length=4, options={"unsigned"=true})
     * @Groups({"location:read"})
     */
    private $zipcode;

    /**
     * @ORM\Column(type="string", length=32)
     * @Groups({"location:read"})
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity=State::class)
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"location:read"})
     */
    private $state;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(int $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getState(): ?State
    {
        return $this->state;
    }

    /**
     * Get the id of the state
     * 
     * @Groups({"location:read"})
     * @SerializedName("stateId")
     */
    public function getStateId(): ?int
    {
        return $this->state->getId();
    }

    public function setState(?State $state): self
    {
        $this->state = $state;

        return $this;
    }

}
