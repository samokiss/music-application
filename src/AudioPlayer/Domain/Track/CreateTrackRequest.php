<?php

declare(strict_types=1);

namespace App\AudioPlayer\Domain\Track;

final class CreateTrackRequest
{
    private string $name;

    private \DateTime $released;

    private string $genre;

    private int $length;

    private string $songwriter;

    public function __construct(string $name, \DateTime $released, string $genre, int $length, string $songwriter)
    {
        $this->name = $name;
        $this->released = $released;
        $this->genre = $genre;
        $this->length = $length;
        $this->songwriter = $songwriter;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getReleased(): \DateTime
    {
        return $this->released;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getSongwriter(): string
    {
        return $this->songwriter;
    }
}
