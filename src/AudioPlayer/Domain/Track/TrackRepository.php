<?php

declare(strict_types=1);

namespace App\AudioPlayer\Domain\Track;

interface TrackRepository
{
    /**
     * @throws TrackAlreadyAddedToPlaylist
     */
    public function addTrack(Track $track): void;

    /**
     * @throws TrackNotExist
     */
    public function getTrack(string $name): void;
}
