<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;

trait Timestampable
{
    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime")
     * @Groups({"userRead", "userDetailRead", "articleRead", "articleDetailsRead"})
     */
    private \DateTimeInterface $createdAt;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"userRead", "userDetailsRead", "articleRead", "articleDetailsRead"})
     */
    private ?\DateTimeInterface $updatedAt;


    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
    }

}