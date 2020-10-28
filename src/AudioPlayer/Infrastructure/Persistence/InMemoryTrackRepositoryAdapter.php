<?php

declare(strict_types=1);

namespace App\AudioPlayer\Infrastructure\Persistence;

use App\AudioPlayer\Domain\Track\Track;
use App\AudioPlayer\Domain\Track\TrackAlreadyAddedToPlaylist;
use App\AudioPlayer\Domain\Track\TrackRepository;

class InMemoryTrackRepositoryAdapter implements TrackRepository
{
    public static array $tracks = [];

    public function __construct(array $tracks = [])
    {
        self::$tracks = $tracks;
    }

    /**
     * @inheritDoc
     */
    public function addTrack(Track $track): void
    {
        if (in_array($track, self::$tracks)) {
            throw new TrackAlreadyAddedToPlaylist();
        }

        self::$tracks[] = $track;
    }

    public function getTrack(string $name): void
    {
        // TODO: Implement getTrack() method.
    }
}
