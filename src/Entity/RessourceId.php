<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;

trait RessourceId
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"userRead", "userDetailsRead", "articleRead", "articleDetailsRead"})
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}