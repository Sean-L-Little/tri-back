<?php

namespace App\Entity;

use App\Repository\ListeTrieeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListeTrieeRepository::class)
 */
class ListeTriee
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $liste = [];

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $ordre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getListe(): ?array
    {
        return $this->liste;
    }

    public function setListe(array $liste): self
    {
        $this->liste = $liste;

        return $this;
    }

    public function getOrdre(): ?string
    {
        return $this->ordre;
    }

    public function setOrdre(string $ordre): self
    {
        $this->ordre = $ordre;

        return $this;
    }
}
