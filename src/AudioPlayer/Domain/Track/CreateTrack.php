<?php

declare(strict_types=1);

namespace App\AudioPlayer\Domain\Track;

final class CreateTrack
{
    private TrackRepository $trackRepository;

    public function __construct(TrackRepository $trackRepository)
    {
        $this->trackRepository = $trackRepository;
    }

    public function execute(CreateTrackRequest $request): Track
    {
        $track = new Track(
            $request->getName(),
            $request->getReleased(),
            $request->getGenre(),
            $request->getLength(),
            $request->getSongwriter()
        );

        $this->trackRepository->addTrack($track);

        return $track;
    }
}
