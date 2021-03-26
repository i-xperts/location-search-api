<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\ApiPlatform\LocationSearchFilter;
use App\Repository\LocationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"},
 *     shortName="locations"
 * )
 * @ApiFilter(LocationSearchFilter::class)
 * @ORM\Entity(repositoryClass=LocationsRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"zipcode": "partial", "location": "partial"})
 */
class Locations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="smallint", length=4, options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(type="smallint", length=4, options={"unsigned"=true})
     */
    private $zipcode;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $canton;

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

    public function getCanton(): ?string
    {
        return $this->canton;
    }

    public function setCanton(string $canton): self
    {
        $this->canton = $canton;

        return $this;
    }
}
