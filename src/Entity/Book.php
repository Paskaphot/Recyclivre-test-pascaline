<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Serializer\Attribute\Ignore;

final class Book
{
    #[Ignore]
    private string $imageName;

    private string $title;

    private string $author;

    private int $price;

    private \DateTime $warehousedAt;

    private string $imageUrl;

    public function getImageName(): string
    {
        return $this->imageName;
    }

    public function setImageName(string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getWarehousedAt(): \DateTime
    {
        return $this->warehousedAt;
    }

    public function setWarehousedAt(\DateTime $warehousedAt): self
    {
        $this->warehousedAt = $warehousedAt;

        return $this;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }
}
