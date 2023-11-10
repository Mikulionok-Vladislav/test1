<?php

namespace App\Model\Cabinet;

class CabinetResponse
{
    private int $id;
    private string $name;
    private ?\DateTimeInterface $createdAt;
    private ?\DateTimeInterface $updatedAt;


    public function __construct(
        int                 $id,
        string              $name,
        ?\DateTimeInterface $createdAt,
        ?\DateTimeInterface $updatedAt,
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): CabinetResponse
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): CabinetResponse
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): CabinetResponse
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): CabinetResponse
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}