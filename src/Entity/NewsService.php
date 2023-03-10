<?php

namespace App\Entity;

use App\Repository\NewsServiceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewsServiceRepository::class)]
class NewsService
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $news_date = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $download_status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNewsDate(): ?\DateTimeInterface
    {
        return $this->news_date;
    }

    public function setNewsDate(\DateTimeInterface $news_date): self
    {
        $this->news_date = $news_date;

        return $this;
    }

    public function getDownloadStatus(): ?string
    {
        return $this->download_status;
    }

    public function setDownloadStatus(string $download_status): self
    {
        $this->download_status = $download_status;

        return $this;
    }
}
